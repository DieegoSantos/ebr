<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscricoes extends MY_Controller {

    public function index() {
        $this->load->view('inscricoes');
        $this->load->view('footer');
    }
}