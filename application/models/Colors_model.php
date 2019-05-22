<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Colors_model extends CI_Model {
  
  public function __construct() {
    // Mantendo herança de CI_Model
    parent::__construct();
    
    // Carregando dependencias
    $this->load->database();
  }
  
  public function get_colors() {

    // Executando query e retornando resultados
    $result = $this->db->get('colors')->result_array();

    return $result;
  }

  public function insert_color($color){

    // Executando query e retornando resultados
    $result = $this->db->insert('colors', array(
      'COLOR'=>$color['name']
    ));

    return $result;
  }

  public function delete_color($id)
  {
    $result = $this->db->delete('colors', array('id' => $id));

    return $result;
  }

}

/* End of file Colors_model.php */
  