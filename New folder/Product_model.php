<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model{

	function get_category(){
		$query = $this->db->get('category');
		return $query;	
	}

	// function get_product($category_id){
	// 	$query = $this->db->get_where('product', array('product_category_id' => $category_id));
	// 	return $query;
	// }
	
	function save_product($product_name,$category_id,$product_image){
		$data = array(
			'product_name' => $product_name,
			// 'recipe_serves' => $recipe_serves,
            // 'recipe_preparation' => $recipe_preparation,
            // 'recipe_cooking' => $recipe_cooking,
            // 'recipe_ing' => $recipe_ing,
            // 'recipe_method' => $recipe_method,
            // 'recipe_youtube' => $recipe_youtube,
            'product_image' => $product_image,
			'product_category_id' => $category_id,
			// 'recipe_product_id' => $product_id
		);
		$this->db->insert('product',$data);
	}

	// function get_recipes(){
	// 	$this->db->select('recipe_id,recipe_title,recipe_serves,recipe_preparation,recipe_cooking,recipe_ing
	// 	,recipe_method,recipe_youtube,recipe_image,category_name,product_name');
	// 	$this->db->from('recipe');
	// 	$this->db->join('category','recipe_category_id = category_id','left');
	// 	$this->db->join('product','recipe_product_id = product_id','left');
	// 	$query = $this->db->get();
	// 	return $query;
	// }

	// function get_recipe_by_id($recipe_id){
	// 	$query = $this->db->get_where('recipe', array('recipe_id' =>  $recipe_id));
	// 	return $query;
	// }

	// function update_recipe($recipe_id,$recipe_title,$category_id,$product_id,$recipe_serves,$recipe_preparation,$recipe_cooking,$recipe_ing,$recipe_method,$recipe_youtube,$recipe_image){
	// 	$this->db->set('recipe_title', $recipe_title);
	// 	$this->db->set('recipe_serves', $recipe_serves);
    //     $this->db->set('recipe_preparation', $recipe_preparation);
    //     $this->db->set('recipe_cooking', $recipe_cooking);
    //     $this->db->set('recipe_ing', $recipe_ing);
    //     $this->db->set('recipe_method', $recipe_method);
    //     $this->db->set('recipe_youtube', $recipe_youtube);
    //     $this->db->set('recipe_image', $recipe_image);
	// 	$this->db->set('recipe_category_id', $category_id);
	// 	$this->db->set('recipe_product_id', $product_id);
	// 	$this->db->where('recipe_id', $recipe_id);
	// 	$this->db->update('recipe');
	// }

	// //Delete Recipe
	// function delete_recipe($recipe_id){
	// 	$this->db->delete('recipe', array('recipe_id' => $recipe_id));
	// }

	
}