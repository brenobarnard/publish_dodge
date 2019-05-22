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

    // Buscando carros no Banco
    $data['cars'] = $this->cars_model->get_cars();

    // Carregamento da View
    $this->load->view('templates/main_header', $data);
    $this->load->view('templates/admin_header', $data);
    $this->load->view('pages/admin', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('templates/main_footer', $data);
  }

  public function add_car() {

    // Carregamento de variáveis para autopreenchimento do formulário em caso de reload
    $data['car'] = array(
      'id'        =>$this->input->post('car_id') ? $this->input->post('car_id') : '',
      'model'     =>$this->input->post('model') ? $this->input->post('model') : '',
      'year'      =>$this->input->post('year') ? $this->input->post('year') : '',
      'color'     =>$this->input->post('color') ? $this->input->post('color') : '',
      'category'  =>$this->input->post('category') ? $this->input->post('category') : '',
    );

    // Variáveis CORE
    $data['title'] = 'Add a Car';
    $data['styles'] = ['main.css', 'templates/forms.css', 'templates/footer.css'];
    $data['error'] = $this->upload->display_errors() ? $this->upload->display_errors('<span>', '</span>') : '';

    // Buscando cores e categorias
    $data['colors'] = $this->colors_model->get_colors();
    $data['categories'] = $this->categories_model->get_categories();

    /* Setando a variável $form_config da 
       view com isset pra evitar multiplos sets */
    if (!isset($data['form_config'])) {
      $configs = array (
        'title' => 'add car to showroom',
        'method' => 'admin/send',
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

    // Buscando carro para editar
    $data['car'] = $this->cars_model->get_car_by_id($id);

    // Erro em caso de id inválido
    if (!isset($data['car'])) {
      show_error('This car id doesn\'t exists', '', 'Car not found!');
    }

    // Variáveis CORE
    $data['title'] = 'Edit a Car';
    $data['styles'] = ['main.css', 'templates/forms.css', 'templates/footer.css'];
    $data['error'] = $this->upload->display_errors() ? $this->upload->display_errors('<span>', '</span>') : '';

    // Buscando cores e categorias
    $data['colors'] = $this->colors_model->get_colors();
    $data['categories'] = $this->categories_model->get_categories();

    /* Setando a variável $form_config da 
       view com isset pra evitar multiplos sets */
    if (!isset($data['form_config'])) {
      $configs = array (
        'title' => 'edit showroom\'s car',
        'method' => 'admin/send',
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
        'method' => 'admin/delete/'.$id,
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

  public function send() {

    // Trazendo valor do input
    $car = array (
      'id'=>$this->input->post('car_id'),
      'model'=>$this->input->post('model'),
      'year'=>$this->input->post('year'),
      'category'=>$this->input->post('category'),
      'color'=>$this->input->post('color'),
      'img' =>''
    );

    // Validação do formulário
    $form_valid = $this->form_validation->run('cars');

    // Verificando se vai inserir ou editar
    $is_inserir = (int)$car['id'] == 0;

    // Checando validação
    if (!$form_valid) {
      // Formulário Inválido

      // Redirecionar
      if($is_inserir) {
        // Retornando ao form de inserir
        $this->add_car();
      } else {
        // Retornando ao form de editar
        $this->edit_car($car['id']);
      }
    } else {
      // Formulário Válido
  
      // Configurando Upload
      $config = array(
        'upload_path'   => './upload',
        'allowed_types' => 'jpg|png',
        'max_size'      => 1024,
        'min_width'     => 1024,
        'min_height'    => 768,
        'overwrite'     => true,
        'encrypt_name'  => true,
      );
  
      $this->upload->initialize($config);

      if (!$is_inserir) {
        $car_img = $this->cars_model->get_car_img((int)$car['id']);
      } else {
        $car_img = null;
      }

      // Fazendo o upload e retornando o resultado
      $upload = $this->upload->do_upload('img_upload');
  
      // Checando Upload
      if (!$upload && !$car_img) {
        // Upload inválido

        // Redirecionar
        if($is_inserir) {
          // Retornando ao form de inserir
          $this->add_car();
        } else {
          // Retornando ao form de editar
          $this->edit_car($car['id']);
        }
      } else {
        // Upload Válido

        // Trazendo informações de Upload
        if ($upload) {
          $data = $this->upload->data();
        }

        // Verificando se foi feito um novo upload
        $car['img'] = isset($data['file_name']) ? $data['file_name'] : $car_img;
  
        // Inserindo no Banco e retornando resultado
        $result = $this->cars_model->insert_or_update_car($car);
  
        // Checando resultado
        if (!$result) {
          // Falha na inserção

          // Deletando imagem e retornando resultado
          $img_deleted = unlink('upload/'.$car['img']);

          // Checando Resultado
          if (!$img_deleted) {
            // Falha na exclusão da Imagem
            show_error('Car not added but image still in server', '', 'Database Error');
          } else {
            // Sucesso na exclusão da Imagem
            show_error('Car not added and image deleted from server', '', 'Database Error');
          }
        }
        else {
          // Sucesso na inserção
          redirect('admin');
        }
      }
    }
  }

  public function delete($id) {

    // Executando delete no Banco, retornando e conferindo resultado
    $result = $this->cars_model->delete_car($id);

    if(!$result) {
      // Falha na exclusão
      show_error('Car not deleted', '', 'Database Error');
    } else {
      // Sucesso na exclusão
      redirect('admin');
    }
  }
}