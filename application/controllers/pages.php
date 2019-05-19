<?php
class Pages extends CI_Controller
{
    public function view($page = 'home')
    {
        /* Carregamento dinâmico de paginas com header e footer padrões */
        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            /* View padrão 404 */
            show_404();
        }

        $data = array(
            'title' => ucfirst($page)
        );

        $this->load->view('templates/main_header', $data);
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/main_footer');
    }
}
