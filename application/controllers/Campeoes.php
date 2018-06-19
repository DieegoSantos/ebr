<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campeoes extends MY_Controller {

    public function index() {
        $this->load->view('campeoes');
        $this->load->view('footer');
    }
}