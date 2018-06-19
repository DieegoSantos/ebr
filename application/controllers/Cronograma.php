<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cronograma extends MY_Controller {

    public function index() {
        $this->load->view('cronograma');
        $this->load->view('footer');
    }
}