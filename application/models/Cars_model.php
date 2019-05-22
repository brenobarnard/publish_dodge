<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cars_model extends CI_Model
{

  public function __construct() {

    // Mantendo a herança do CI_Model
    parent::__construct();

    // Carregando dependencias
    $this->load->database();
  }

  public function get_cars() {

    // Construindo query
    $this->db->select('cars.ID, MODEL, YEAR, COLOR, CATEGORY, IMG_PATH');
    $this->db->join('colors', 'colors.ID = cars.FK_COLOR', 'LEFT');
    $this->db->join('categories', 'categories.ID = cars.FK_CATEGORY', 'LEFT');

    // Executando query e retornando resultados
    $result = $this->db->get('cars')->result_array();

    return $result;
  }

  public function get_car_by_id($id) {

    // Construindo query
    $this->db->where('ID', $id);
    $this->db->limit(1);

    // Executando query e retonando resultado
    $result = $this->db->get('cars')->result_array();
    $bdCar = $result;

    // Verificando resultado, construindo objeto e retornando
    if(isset($bdCar[0])) {
      $car = array(
        'id'=>$bdCar[0]['ID'],
        'model'=>$bdCar[0]['MODEL'],
        'year'=>$bdCar[0]['YEAR'],
        'color'=>$bdCar[0]['FK_COLOR'],
        'category'=>$bdCar[0]['FK_CATEGORY'],
        'img'=>$bdCar[0]['IMG_PATH']
      );
    } else {
      $car = NULL;
    }

    return $car;
  }

  public function insert_or_update_car($car) {

    // Verificando se vai inserir ou atualizar
    $insert = (int)$car['id'] == 0;

    if ($insert) { 
      // Inserindo

      $result = $this->db->insert('cars', array(
        'MODEL' => $car['model'],
        'YEAR' => $car['year'],
        'FK_CATEGORY' => $car['category'],
        'FK_COLOR' => $car['color'],
        'IMG_PATH' => $car['img']
      ));

      return $result;
    } else {
      // Atualizando

      // Consultando imagem anterior para comparar
      $imgAtual = $this->get_car_img($car['id']);

      // Comparando a imagem anterior com a atual
      if ($imgAtual != $car['img']) {
        // Imagem diferente

        // Deletando a imagem atual, ja que a nova foi inserida
        $imgDeleted = $this->delete_car_img($car['id']);
      }

      // Verificando se a imagem foi excluida ou é a mesma da anterior
      if ($imgDeleted || $imgAtual == $car['img']) {

        // Construindo query
        $this->db->where('ID', $car['id']);

        // Executando query e retornando resultado
        $result = $this->db->update('cars', array(
          'MODEL' => $car['model'],
          'YEAR' => $car['year'],
          'FK_CATEGORY' => $car['category'],
          'FK_COLOR' => $car['color'],
          'IMG_PATH' => $car['img']
        ));

        return $result;
      }
    }
  }

  public function delete_car($id) {

    // Buscando link da imagem a ser deletada
    $img = $this->get_car_img($id);

    // Executando query e retornando resultado
    $result = $this->db->delete('cars', array('id' => $id));
    
    // Verificando se o carro foi excluido do Banco
    if($result) {
      // Sucesso na Exclusão

      // Excluindo imagem relacionada ao carro
      unlink('upload/'.$img);
    }

    return $result;
  }

  public function delete_car_img($id) {

    // Construindo query
    $this->db->select('IMG_PATH');
    $this->db->where('id', $id);

    // Buscando link da imagem a ser deletada
    $bdCar = $this->db->get('cars')->result_array();
    
    // Excluindo imagem relacionada ao ID e retornando resultado
    $result = unlink('upload/'.$bdCar[0]['IMG_PATH']);

    return $result;
  }

  public function get_car_img($car_id) {

    // Construindo query
    $this->db->select('IMG_PATH');
    $this->db->where('ID', $car_id);
    $this->db->limit(1);

    // 
    $result = $this->db->get('cars')->result_array();

    $img = $result[0]['IMG_PATH'];

    return $img;
  }
}
