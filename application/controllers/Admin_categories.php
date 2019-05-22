<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_categories extends CI_Controller {

  public function __construct() {

    // Mantendo herança do CI_Controller
    parent::__construct();

    // Carregamento de dependencias
    $this->load->model('categories_model');
    $this->load->helper(array('form', 'file'));
    $this->load->library(array('upload', 'form_validation'));

    // Configurar tag de erros do formulário
    $this->form_validation->set_error_delimiters('<span>', '</span>');
  }

  public function index() {

    // Variáveis CORE
    $data['title'] = 'Showroom Admin Page';
    $data['styles'] = ['main.css', 'pages/admin.css', 'templates/footer.css'];

    // Buscando categorias no Banco
    $data['categories'] = $this->categories_model->get_categories();

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
        'method' => 'admin_categories/send',
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
        'method' => 'admin_categories/delete/'.$id,
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

  public function send() {

    // Validação do formulário
    $form_valid = $this->form_validation->run('categories');

    // Checando validação
    if (!$form_valid) {
      // Formulário Invalido
      $this->add_category();
    } else {
      // Formulário Valido

      // Trazendo valor do input
      $category = array(
        'name'=>$this->input->post('category')
      );
  
      // Inserindo no Banco e retornando e conferindo resultado
      $result = $this->categories_model->insert_category($category);
  
      if (!$result) {
        // Falha na inserção
        show_error('Category not added', '', 'Database Error');
      }
      else {
        // Sucesso na inserção
        redirect('admin_categories');
      }
    }
  }

  public function delete($id) {
    
    // Executando delete no Banco, retornando e conferindo resultado
    $result = $this->categories_model->delete_category($id);

    if(!$result) {
      // Falha na exclusão
      show_error('Categorie not deleted', '', 'Database Error');
    } else {
      // Sucesso na exclusão
      redirect('admin_categories');
    }
  }

}

/* End of file Admin_categories.php */
