<!DOCTYPE html>
<html>
<head>
	<title>Recipes</title>
	<link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url().'assets/css/datatables.css'?>" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container">

	  <div class="row justify-content-md-center">
	    <div class="col col-lg-12">
	    	<h3>Recipe</h3>
	    	<?php echo $this->session->flashdata('msg');?>
	    	<a href="<?php echo site_url('recipe/add_new');?>" class="btn btn-success btn-sm">Add New Recipe</a>
			<a href='<?php echo site_url('recipe/export_csv');?>' class="btn btn-success btn-sm" >Export</a><br><br>
			<!-- <a href="<?php echo site_url('product/add_new');?>" class="btn btn-success btn-sm">Add New Product</a><hr/> -->
	      	<hr/>
			  <table class="table table-striped" id="mytable" style="font-size: 14px;">
	      		<thead>
	      			<tr>
	      				<th>No</th>
	      				<th>Recipe</th>
	      				<th>Category</th>
	      				<th>Product</th>
	      				<th>Image</th>
	      				<th>Action</th>
	      			</tr>
	      		</thead>
	      		<tbody>
	      			 <?php
	      				$no = 0;
	      				foreach ($recipes->result() as $row):
	      					$no++;
	      			?>
	      			<tr>
	      				<td><?php echo $no;?></td>
	      				<td><?php echo $row->recipe_title;?></td>
	      				<td><?php echo $row->category_name;?></td>
	      				<td><?php echo $row->product_name;?></td>
	      				<td><?php echo $row->recipe_image;?></td>




						  <!-- <img src="<?php echo $row->recipe_image;?>"> -->
	      				<td>
	      					<a href="<?php echo site_url('recipe/get_edit/'.$row->recipe_id);?>" class="btn btn-sm btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
	      					<a href="<?php echo site_url('recipe/delete/'.$row->recipe_id);?>" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
	      				</td>
	      			</tr>
	      			<?php endforeach;?>
	      		</tbody>
	      	</table>
	

	    </div>
	  </div>

	</div>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/datatables.js'?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#mytable').DataTable();
		});
	</script>
</body>
</html>