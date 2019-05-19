<?php
class Cars extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
  }

  public function index() {

    $data['title'] = 'Car Showroom';
    
    /* Esses dados virão do banco de dados */
    $data['cars'] = array(
      ['id' => '1',
      'img' => 'car_img_1',
      'model' => 'Dodge Charger R/T',
      'year' => '2019',
      'color' => 'Red',
      'category' => 'Sedan'],
      ['id' => '1',
      'img' => 'car_img_1',
      'model' => 'Dodge Charger R/T',
      'year' => '2019',
      'color' => 'Red',
      'category' => 'Sedan'],
      ['id' => '1',
      'img' => 'car_img_1',
      'model' => 'Dodge Charger R/T',
      'year' => '2019',
      'color' => 'Red',
      'category' => 'Sedan'],
      ['id' => '1',
      'img' => 'car_img_1',
      'model' => 'Dodge Charger R/T',
      'year' => '2019',
      'color' => 'Red',
      'category' => 'Sedan'],
      ['id' => '1',
      'img' => 'car_img_1',
      'model' => 'Dodge Charger R/T',
      'year' => '2019',
      'color' => 'Red',
      'category' => 'Sedan'],
      ['id' => '1',
      'img' => 'car_img_1',
      'model' => 'Dodge Charger R/T',
      'year' => '2019',
      'color' => 'Red',
      'category' => 'Sedan'],
      ['id' => '1',
      'img' => 'car_img_1',
      'model' => 'Dodge Charger R/T',
      'year' => '2019',
      'color' => 'Red',
      'category' => 'Sedan'],
    );

    $this->load->view('templates/main_header', $data);
    $this->load->view('templates/header', $data);
    $this->load->view('pages/cars', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('templates/main_footer', $data);
  }
}