<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shortener_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_url($short_code) {
        $query = $this->db->get_where('shortened_urls', array('short_code' => $short_code));
        return $query->row_array();
    }

    public function insert_url($original_url) {
        $short_code = $this->generate_short_code();
        $data = array(
            'original_url' => $original_url,
            'short_code' => $short_code
        );
        $this->db->insert('shortened_urls', $data);
        return $short_code;
    }

    private function generate_short_code($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $short_code = '';
        for ($i = 0; $i < $length; $i++) {
            $short_code .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $short_code;
    }
}
