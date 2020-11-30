<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recipe extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('recipe_model','recipe_model');
		$this->load->library('session');
	}

	function index(){
		$data['recipes'] = $this->recipe_model->get_recipes();
		$this->load->view('recipe_list_view',$data);
	}
		
		// add new recipe
		function add_new(){
			$data['category'] = $this->recipe_model->get_category()->result();
			$this->load->view('add_recipe_view', $data);
		}

		// get product by category_id
		function get_product(){
			$category_id = $this->input->post('id',TRUE);
			$data = $this->recipe_model->get_product($category_id)->result();
			echo json_encode($data);
		}
	//save recipe to database
	function save_recipe(){
		$recipe_title 	= $this->input->post('recipe_title',TRUE);
		$category_id 	= $this->input->post('category',TRUE);
		$product_id = $this->input->post('product',TRUE);
		$recipe_serves 	= $this->input->post('recipe_serves',TRUE);
        $recipe_preparation 	= $this->input->post('recipe_preparation',TRUE);
        $recipe_cooking	= $this->input->post('recipe_cooking',TRUE);
        $recipe_ing 	= $this->input->post('recipe_ing',TRUE);
        $recipe_method 	= $this->input->post('recipe_method',TRUE);
        $recipe_youtube 	= $this->input->post('recipe_youtube',TRUE);
        $recipe_image	= $this->input->post('recipe_image',TRUE);
		$this->recipe_model->save_recipe($recipe_title,$category_id,$product_id,$recipe_serves,$recipe_preparation,$recipe_cooking,$recipe_ing,$recipe_method,$recipe_youtube,$recipe_image);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Recipe Saved</div>');
		redirect('recipe');
	}

	function get_edit(){
		$recipe_id = $this->uri->segment(3);
		$data['recipe_id'] = $recipe_id;
		$data['category'] = $this->recipe_model->get_category()->result();
		$get_data = $this->recipe_model->get_recipe_by_id($recipe_id);
		if($get_data->num_rows() > 0){
			$row = $get_data->row_array();
			$data['product_id'] = $row['recipe_product_id'];
		}
		$this->load->view('edit_recipe_view',$data);
	}

	function get_data_edit(){
		$recipe_id = $this->input->post('recipe_id',TRUE);
		$data = $this->recipe_model->get_recipe_by_id($recipe_id)->result();
		echo json_encode($data);
	}

	//update recipe to database
	function update_recipe(){
		$recipe_id 	= $this->input->post('recipe_id',TRUE);
		$recipe_title 	= $this->input->post('recipe_title',TRUE);
		$category_id 	= $this->input->post('category',TRUE);
		$product_id = $this->input->post('product',TRUE);
		$recipe_serves 	= $this->input->post('recipe_serves',TRUE);
        $recipe_preparation 	= $this->input->post('recipe_preparation',TRUE);
        $recipe_cooking 	= $this->input->post('recipe_cooking',TRUE);
        $recipe_ing 	= $this->input->post('recipe_ing',TRUE);
        $recipe_method 	= $this->input->post('recipe_method',TRUE);
        $recipe_youtube 	= $this->input->post('recipe_youtube',TRUE);
        $recipe_image 	= $this->input->post('recipe_image',TRUE);
		$this->recipe_model->update_recipe($recipe_id,$recipe_title,$category_id,$product_id,$recipe_serves,$recipe_preparation,$recipe_cooking,$recipe_ing,$recipe_method,$recipe_youtube,$recipe_image);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Recipe Updated</div>');
		redirect('recipe');
	}

	//Delete recipe from Database
	function delete(){
		$recipe_id = $this->uri->segment(3);
		$this->recipe_model->delete_recipe($recipe_id);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Recipe Deleted</div>');
		redirect('recipe');
	}
	public function export_csv(){ 
		// file name 
		$filename = 'recipe_'.date('Ymd').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");
	   // get data 
		$recipeData = $this->recipe_model->getRecipeDetails();
		// file creation 
		$file = fopen('php://output','w');
		$header = array("Recipe","Serves","Preparation","Cooking","Youtube","Image"); 
		fputcsv($file, $header);
		foreach ($recipeData as $key=>$line){ 
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	}
}