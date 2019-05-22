<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_colors extends CI_Controller {

  public function __construct() {

    // Mantendo herança do CI_Controller
    parent::__construct();

    // Carregamento de dependencias
    $this->load->model('colors_model');    
    $this->load->helper(array('form', 'file'));
    $this->load->library(array('upload', 'form_validation'));

    // Configurando tag de erros do formulário
    $this->form_validation->set_error_delimiters('<span>', '</span>');
  }

  public function index() {

    // Variáveis CORE
    $data['title'] = 'Showroom Admin Page';
    $data['styles'] = ['main.css', 'pages/admin.css', 'templates/footer.css'];

    // Buscando cores no Banco de dados
    $data['colors'] = $this->colors_model->get_colors();

    // Carregamento da view
    $this->load->view('templates/main_header', $data);
    $this->load->view('templates/admin_header', $data);
    $this->load->view('pages/admin_colors', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('templates/main_footer', $data);
  }

  public function add_color() {

    // Variáveis CORE
    $data['title'] = 'Add a Color';
    $data['styles'] = ['main.css', 'templates/forms.css', 'templates/footer.css'];
    $data['error'] = '';

    /* Setando a variável $form_config da 
       view com isset pra evitar multiplos sets */
    if (!isset($data['form_config'])) {
      $configs = array (
        'title' => 'add new color',
        'method' => 'admin_colors/send',
        'submit_text' => 'add color',
        'back_page' => '/index.php/admin_colors',
        'input' => array(
          'id'=>'color_name',
          'label'=>'Color Name:',
          'name'=>'color',
          'placeholder'=>'Color Name',
          'maxlength'=>'40'
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

  public function delete_color($id) {

    // Variáveis CORE
    $data['title'] = 'Delete a Color';
    $data['styles'] = ['main.css', 'templates/forms.css', 'templates/footer.css'];

    /* Setando a variável $form_config da 
       view com isset pra evitar multiplos sets */
    if (!isset($data['form_config'])) {
      $configs = array (
        'method' => 'admin_colors/delete/'.$id,
        'submit_text' => 'delete color',
        'back_page' => '/index.php/admin_colors',
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

  public function send() {

    // Validação do formulário
    $form_valid = $this->form_validation->run('colors');

    // Checando validação
    if (!$form_valid) {
      // Formulário Invalido
      $this->add_color();
    } else {
      // Formulário Valido

      // Trazendo valor do input
      $color = array(
        'name'=>$this->input->post('color')
      );
  
      // Inserindo no Banco, retornando e conferindo resultado
      $result = $this->colors_model->insert_color($color);
  
      if (!$result) {
        // Falha na inserção
        show_error('Color not added', '', 'Database Error');
      }
      else {
        // Sucesso na inserção
        redirect('admin_colors');
      }
    }
  }

  public function delete($id) {
    
    // Executando delete no Banco, retornando e conferindo resultado
    $result = $this->colors_model->delete_color($id);

    if(!$result) {
      // Falha na exclusão
      show_error('Color not deleted', '', 'Database Error');
    } else {
      // Sucesso na exclusão
      redirect('admin_colors');
    }
  }

}

/* End of file Admin_colors.php */
