<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_categories extends CI_Controller {

  public function __construct() {

    // Mantendo herança do CI_Controller
    parent::__construct();

    // Carregamento de dependencias
    $this->load->helper(array('form', 'file'));
    $this->load->library(array('upload'));
  }

  public function index() {

    // Variáveis CORE
    $data['title'] = 'Showroom Admin Page';
    $data['styles'] = ['main.css', 'pages/admin.css', 'templates/footer.css'];

    // Carregamento da view
    $this->load->view('templates/main_header', $data);
    $this->load->view('templates/admin_header', $data);
    $this->load->view('pages/admin_categories', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('templates/main_footer', $data);
  }

  public function add_category() {

    // Variáveis CORE
    $data['title'] = 'Add a Category';
    $data['styles'] = ['main.css', 'templates/forms.css', 'templates/footer.css'];
    $data['error'] = '';

    /* Setando a variável $form_config da 
       view com isset pra evitar multiplos sets */
    if (!isset($data['form_config'])) {
      $configs = array (
        'title' => 'add new category',
        'method' => '',
        'submit_text' => 'add category',
        'back_page' => '/index.php/admin_categories',
        'input' => array(
          'id'=>'category_name',
          'label'=>'Category Name:',
          'name'=>'category',
          'placeholder'=>'Category Name',
          'maxlength'=>'25'
        ),
        'attributes' => 'class="form" id="formCrud"',
      );

      $data['form_config'] = $configs;
    }

    // Carregamento da view
    $this->load->view('templates/main_header', $data);
    $this->load->view('templates/cc_form', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('templates/main_footer', $data);
  }

  public function delete_category($id) {

    // Variáveis CORE
    $data['title'] = 'Delete a Category';
    $data['styles'] = ['main.css', 'templates/forms.css', 'templates/footer.css'];

    /* Setando a variável $form_config da 
       view com isset pra evitar multiplos sets */
    if (!isset($data['form_config'])) {
      $configs = array (
        'method' => '',
        'submit_text' => 'delete category',
        'back_page' => '/index.php/admin_categories',
        'attributes' => 'class="form" id="formCrud"',
      );

      $data['form_config'] = $configs;
    }

    // Carregamento de view
    $this->load->view('templates/main_header', $data);
    $this->load->view('templates/delete_message', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('templates/main_footer', $data);
  }
}

/* End of file Admin_categories.php */
