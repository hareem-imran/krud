<!DOCTYPE html>
<html>
<head>
	<title>Edit Recipe</title>
	<link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
</head>
<body>
	<div class="container">

	  <div class="row justify-content-md-center">
	    <div class="col col-lg-12">
	    	<h3>Edit Recipe:</h3>
            <a href="<?php echo site_url('recipe');?>" class ="btn btn-success btn-sm"><i class="fa fa-chevron-left"></i> Back</a><hr/>
	      	<form action="<?php echo site_url('recipe/update_recipe');?>" method="post">

	      		<div class="form-group">
				    <label>Recipe Name</label>
				    <input type="text" class="form-control" name="recipe_title" placeholder="Recipe Name" required>
				</div>

				<div class="form-group">
				    <label>Category</label>
				    <select class="form-control category" name="category" required>
				    	<option value="">No Selected</option>
				    	<?php foreach($category as $row):?>
				    	<option value="<?php echo $row->category_id;?>"><?php echo $row->category_name;?></option>
				    	<?php endforeach;?>
				    </select>
				</div>

				<div class="form-group">
				    <label>Product</label>
				    <select class="form-control product" name="product" required>
				    	<option value="">No Selected</option>

				    </select>
				</div>

				<div class="form-group">
				    <label>Serves</label>
				    <input type="text" class="form-control" name="recipe_serves" placeholder="Serves" required>
				</div>

                <div class="form-group">
                    <label>Preparation</label>
                    <input type="text" class="form-control" name="recipe_preparation" placeholder="Preparation" required>
                </div>

                <div class="form-group">
                    <label>Cooking</label>
                    <input type="text" class="form-control" name="recipe_cooking" placeholder="Cooking" required>
                </div>

                <div class="form-group">
                    <label>Youtube</label>
                    <input type="text" class="form-control" name="recipe_youtube" placeholder="Youtube" >
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="recipe_image" required>
                </div>


            


                <div class="form-group">
                    <label>Ingredient</label>
                    <textarea type="text" class="form-control" name="recipe_ing"></textarea>
                </div>

                <div class="form-group">
                    <label>Method</label>
                    <textarea type="text" class="form-control" name="recipe_method" >
                    <?php echo $recipe_method; ?>
                    </textarea>
                </div>

                <input type="hidden" name="recipe_id" value="<?php echo $recipe_id?>" required>
				<button class="btn btn-success" type="submit">Update Recipe</button>
                <a href="<?php echo site_url('recipe');?>" class ="btn btn-success">Cancel</a>
                <hr/>

			</form>
	    </div>
	  </div>

	</div>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			//call function get data edit
			get_data_edit();

			$('.category').change(function(){ 
                var id=$(this).val();
                var product_id = "<?php echo $product_id;?>";
                $.ajax({
                    url : "<?php echo site_url('recipe/get_product');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){

                        $('select[name="product"]').empty();

                        $.each(data, function(key, value) {
                            if(product_id==value.product_id){
                                $('select[name="product"]').append('<option value="'+ value.product_id +'" selected>'+ value.product_name +'</option>').trigger('change');
                            }else{
                                $('select[name="product"]').append('<option value="'+ value.product_id +'">'+ value.product_name +'</option>');
                            }
                        });

                    }
                });
                return false;
            }); 

			//load data for edit
            function get_data_edit(){
            	var recipe_id = $('[name="recipe_id"]').val();
                $.ajax({
            		url : "<?php echo site_url('recipe/get_data_edit');?>",
                    method : "POST",
                    data :{recipe_id :recipe_id},
                    async : true,
                    dataType : 'json',
                    success : function(data){
                        $.each(data, function(i, item){
                            $('[name="recipe_title"]').val(data[i].recipe_title);
                            $('[name="category"]').val(data[i].recipe_category_id).trigger('change');
                            $('[name="product"]').val(data[i].recipe_product_id).trigger('change');
                            $('[name="recipe_serves"]').val(data[i].recipe_serves);
                            $('[name="recipe_preparation"]').val(data[i].recipe_preparation).trigger('change');
                            $('[name="recipe_cooking"]').val(data[i].recipe_cooking).trigger('change');
                            $('[name="recipe_youtube"]').val(data[i].recipe_youtube).trigger('change');
                            $('[name="recipe_image"]').val(data[i].recipe_image).trigger('change');
                            $('[name="recipe_ing"]').val(data[i].recipe_ing).trigger('change');
                            $('[name="recipe_method"]').val(data[i].recipe_method).trigger('change');
                        });
                    }

            	});
            }
            
		});
	</script>
     <script>

      CKEDITOR.replace('recipe_ing');
      var field = CKEDITOR.instances.recipe_ing.getData();
      
      
    //   ,{
    //         width:"1110px",
    //         height:"200px"
    //          });
             
    </script>
    <script>
        CKEDITOR.replace('recipe_method',{
            width:"1110px",
            height:"200px"
        });
    </script>


</body>
</html>