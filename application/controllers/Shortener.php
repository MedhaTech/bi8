<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shortener extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Shortener_model');
    }

    public function index() {
        $this->load->view('shorten_url_form');
    }

    public function shorten() {
        $original_url = $this->input->post('original_url');
        $short_code = $this->Shortener_model->insert_url($original_url);
        $data['short_code'] = $short_code;
        $data['shortened_url'] = base_url($short_code);
        $this->load->view('shorten_url_result', $data);
    }

    public function redirect($short_code) {
        $url_data = $this->Shortener_model->get_url($short_code);
        if (!empty($url_data)) {
            redirect($url_data['original_url']);
        } else {
            show_404();
        }
    }
}
