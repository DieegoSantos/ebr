<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cronograma extends MY_Controller {

    public function index() {
        $arrWhere['id'] = 1;

        $this->load->model('GetConteudos_Model');
        $objConteudo = $this->GetConteudos_Model->getListConteudos($arrWhere);
        $arrDados = array();
        foreach ($objConteudo as $objResult) {
            $arrDados['titulo'] = $objResult->titulo;
            $arrDados['texto'] = $objResult->texto;
            $arrDados['id'] = $objResult->id;
        }

        $this->load->view('cronograma', $arrDados);
        $this->load->view('footer');
    }
}