<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cars extends CI_Controller {
  public function __construct()
  {
    // Mantendo herança do CI_Controller
    parent::__construct();

    // Carregamento de dependencias
    $this->load->model('cars_model');
  }

  public function index() {

    // Variáveis CORE
    $data['title'] = 'Car Showroom';
    $data['styles'] = ['main.css', 'pages/cars.css', 'templates/footer.css'];
        
    // Buscando carros no Banco
    $data['cars'] = $this->cars_model->get_cars();

    // Carregamento da view
    $this->load->view('templates/main_header', $data);
    $this->load->view('templates/header', $data);
    $this->load->view('pages/cars', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('templates/main_footer', $data);
  }
}