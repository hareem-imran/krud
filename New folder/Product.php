<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('product_model','product_model');
		$this->load->library('session');
	}

	function index(){
		$data['category'] = $this->product_model->get_category();
		$this->load->view('recipe_list_view',$data);
	}
		
		// add new product
		function add_new(){
			$data['category'] = $this->product_model->get_category()->result();
			$this->load->view('add_product_view', $data);
		}

		// // get product by category_id
		// function get_product(){
		// 	$category_id = $this->input->post('id',TRUE);
		// 	$data = $this->recipe_model->get_product($category_id)->result();
		// 	echo json_encode($data);
		// }
	//save product to database
	function save_product(){
		$product_name 	= $this->input->post('product_name',TRUE);
		$category_id 	= $this->input->post('category',TRUE);
		// $product_id = $this->input->post('product',TRUE);
		// $recipe_serves 	= $this->input->post('recipe_serves',TRUE);
        // $recipe_preparation 	= $this->input->post('recipe_preparation',TRUE);
        // $recipe_cooking	= $this->input->post('recipe_cooking',TRUE);
        // $recipe_ing 	= $this->input->post('recipe_ing',TRUE);
        // $recipe_method 	= $this->input->post('recipe_method',TRUE);
        // $recipe_youtube 	= $this->input->post('recipe_youtube',TRUE);
        $product_image	= $this->input->post('product_image',TRUE);
		$this->product_model->save_product($product_name,$category_id,$product_image);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Product Saved</div>');
		redirect('product');
	}

	// function get_edit(){
	// 	$recipe_id = $this->uri->segment(3);
	// 	$data['recipe_id'] = $recipe_id;
	// 	$data['category'] = $this->recipe_model->get_category()->result();
	// 	$get_data = $this->recipe_model->get_recipe_by_id($recipe_id);
	// 	if($get_data->num_rows() > 0){
	// 		$row = $get_data->row_array();
	// 		$data['product_id'] = $row['recipe_product_id'];
	// 	}
	// 	$this->load->view('edit_recipe_view',$data);
	// }

	// function get_data_edit(){
	// 	$recipe_id = $this->input->post('recipe_id',TRUE);
	// 	$data = $this->recipe_model->get_recipe_by_id($recipe_id)->result();
	// 	echo json_encode($data);
	// }

	// //update recipe to database
	// function update_recipe(){
	// 	$recipe_id 	= $this->input->post('recipe_id',TRUE);
	// 	$recipe_title 	= $this->input->post('recipe_title',TRUE);
	// 	$category_id 	= $this->input->post('category',TRUE);
	// 	$product_id = $this->input->post('product',TRUE);
	// 	$recipe_serves 	= $this->input->post('recipe_serves',TRUE);
    //     $recipe_preparation 	= $this->input->post('recipe_preparation',TRUE);
    //     $recipe_cooking 	= $this->input->post('recipe_cooking',TRUE);
    //     $recipe_ing 	= $this->input->post('recipe_ing',TRUE);
    //     $recipe_method 	= $this->input->post('recipe_method',TRUE);
    //     $recipe_youtube 	= $this->input->post('recipe_youtube',TRUE);
    //     $recipe_image 	= $this->input->post('recipe_image',TRUE);
	// 	$this->recipe_model->update_recipe($recipe_id,$recipe_title,$category_id,$product_id,$recipe_serves,$recipe_preparation,$recipe_cooking,$recipe_ing,$recipe_method,$recipe_youtube,$recipe_image);
	// 	$this->session->set_flashdata('msg','<div class="alert alert-success">Recipe Updated</div>');
	// 	redirect('recipe');
	// }

	// //Delete recipe from Database
	// function delete(){
	// 	$recipe_id = $this->uri->segment(3);
	// 	$this->recipe_model->delete_recipe($recipe_id);
	// 	$this->session->set_flashdata('msg','<div class="alert alert-success">Recipe Deleted</div>');
	// 	redirect('recipe');
	// }
}