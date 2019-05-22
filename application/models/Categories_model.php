<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_model extends CI_Model {

  
  public function __construct()
  {
    // Mantendo a herança do CI_Model
    parent::__construct();
    
    // Carregando dependencias
    $this->load->database();
  }

  public function get_categories()
  {
    // Executando query e retornando resultados
    $result = $this->db->get('categories');

    return $result->result_array();
  }

  public function insert_category($category){
    // Executando query e retornando resultados
    $result = $this->db->insert('categories', array(
      'CATEGORY'=>$category['name']
    ));

    return $result;
  }

  public function delete_category($id)
  {
    // Executando query e retornando resultados
    $result = $this->db->delete('categories', array('id' => $id));

    return $result;
  }
  
}
