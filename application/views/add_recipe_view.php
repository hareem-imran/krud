<!DOCTYPE html>
<html>
<head>
	<title>Add New</title>
	<link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
</head>
<body>
	<div class="container">

	  <div class="row justify-content-md-center">
	    <div class="col col-lg-12">
	    	<h3>Add New Recipe:</h3>
            <a href="<?php echo site_url('recipe');?>" class ="btn btn-success btn-sm"><i class="fa fa-chevron-left"></i> Back</a><hr/>
	      	<form action="<?php echo site_url('recipe/save_recipe');?>" method="post">

	      		<div class="form-group">
				    <label>Recipe Name</label>
				    <input type="text" class="form-control" name="recipe_title" placeholder="Recipe Name" required>
				</div>

				<div class="form-group">
				    <label>Category</label>
				    <select class="form-control" name="category" id="category" required>
				    	<option value="">No Selected</option>
				    	<?php foreach($category as $row):?>
				    	<option value="<?php echo $row->category_id;?>"><?php echo $row->category_name;?></option>
				    	<?php endforeach;?>
				    </select>
				</div>

				<div class="form-group">
				    <label>Product</label>
				    <select class="form-control" id="product" name="product" required>
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
                    <input type="text" class="form-control" name="recipe_youtube" placeholder="Youtube" required>
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
                    <textarea type="text" class="form-control" name="recipe_method" ></textarea>
                </div>

                
                <fieldset>
                    <legend>Other Recipe</legend>
                    <input type="checkbox" name="businessType" value="1">Yes<br>
                    <input type="checkbox" name="businessType" value="2">No
                    </fieldset>
                    <br>







				<button class="btn btn-success" type="submit">Save Recipe</button>
                <a href="<?php echo site_url('recipe');?>" class ="btn btn-success">Cancel</a><hr/>

			</form>
	    </div>
	  </div>

	</div>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            $('#category').change(function(){
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('recipe/get_product');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){

                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].product_id+'>'+data[i].product_name+'</option>';
                        }
                        $('#product').html(html);

                    }
                });
                return false;
            });

        });
    </script>
    <script>
        CKEDITOR.replace('recipe_ing',{
            width:"1110px",
            height:"200px"
        });
    </script>
    <script>
  
        CKEDITOR.replace('recipe_method',{
            width:"1110px",
            height:"200px"
        });
    </script>
    <!-- <script>
        CKEDITOR.replace('recipe_ing_2',{
            width:"1110px",
            height:"200px"
        });
    </script>
    <script>
        CKEDITOR.replace('recipe_method_2',{
            width:"1110px",
            height:"200px"
        });
    </script> -->
    <!-- <script>
        $(function(){
            $("#idchk").change(function(){
                var st = this.checked;
                if(st){
                    $("#recipe_title_2").prop("disabled", false);
                }
                else{
                    $("#recipe_title_2").prop("disabled", true);
                }

            });
        });


    </script> -->
</body>
</html>