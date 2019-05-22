<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  
  public function __construct() {

    // Mantendo herança do CI_Controller
    parent::__construct();

    // Carregando dependencias
    $this->load->model('cars_model');
    $this->load->model('categories_model');
    $this->load->model('colors_model');    
    $this->load->helper(array('form', 'file'));
    $this->load->library(array('upload', 'form_validation'));

    // Configurar tag de erros do formulário
    $this->form_validation->set_error_delimiters('<span>', '</span>');
  }

  public function index() {

    // Variáveis CORE
    $data['title'] = 'Showroom Admin Page';
    $data['styles'] = ['main.css', 'pages/admin.css', 'templates/footer.css'];

    // Carregamento da View
    $this->load->view('templates/main_header', $data);
    $this->load->view('templates/admin_header', $data);
    $this->load->view('pages/admin', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('templates/main_footer', $data);
  }

  public function add_car() {

    // Variáveis CORE
    $data['title'] = 'Add a Car';
    $data['styles'] = ['main.css', 'templates/forms.css', 'templates/footer.css'];

    /* Setando a variável $form_config da 
       view com isset pra evitar multiplos sets */
    if (!isset($data['form_config'])) {
      $configs = array (
        'title' => 'add car to showroom',
        'method' => '',
        'back_page' => '/index.php/admin',
        'submit_text' => 'add car',
        'attributes' => 'class="form" id="formCrud"',
      );

      $data['form_config'] = $configs;
    }

    // Carregamento da View
    $this->load->view('templates/main_header', $data);
    $this->load->view('templates/cars_form', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('templates/main_footer', $data);
  }

  public function edit_car($id) {

    // Variáveis CORE
    $data['title'] = 'Edit a Car';
    $data['styles'] = ['main.css', 'templates/forms.css', 'templates/footer.css'];

    /* Setando a variável $form_config da 
       view com isset pra evitar multiplos sets */
    if (!isset($data['form_config'])) {
      $configs = array (
        'title' => 'edit showroom\'s car',
        'method' => '',
        'back_page' => '/index.php/admin',
        'submit_text' => 'update car',
        'attributes' => 'class="form" id="formCrud"',
      );

      $data['form_config'] = $configs;
    }

    // Carregamento de view
    $this->load->view('templates/main_header', $data);
    $this->load->view('templates/cars_form', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('templates/main_footer', $data);
  }

  public function delete_car($id) {

    // Variáveis CORE
    $data['title'] = 'Delete a Car';
    $data['styles'] = ['main.css', 'templates/forms.css', 'templates/footer.css'];

    /* Setando a variável $form_config da 
       view com isset pra evitar multiplos sets */
    if (!isset($data['form_config'])) {
      $configs = array (
        'method' => '',
        'submit_text' => 'delete car',
        'back_page' => '/index.php/admin',
        'attributes' => 'class="form" id="formCrud"',
      );

      $data['form_config'] = $configs;
    }

    // Carregamento da view
    $this->load->view('templates/main_header', $data);
    $this->load->view('templates/delete_message', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('templates/main_footer', $data);
  }
}