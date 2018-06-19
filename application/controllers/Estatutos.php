<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscricoes extends MY_Controller {

    public function index() {
        $this->load->view('estatutos');
        $this->load->view('footer');
    }
}