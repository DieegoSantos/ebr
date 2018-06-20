<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscricoes extends MY_Controller {

    public function index() {
        $arrWhere['id'] = 2;

        $this->load->model('GetConteudos_Model');
        $objConteudo = $this->GetConteudos_Model->getListConteudos($arrWhere);
        $arrDados = array();
        foreach ($objConteudo as $objResult) {
            $arrDados['titulo'] = $objResult->titulo;
            $arrDados['texto'] = $objResult->texto;
            $arrDados['id'] = $objResult->id;
        }
        $this->load->view('inscricoes', $arrDados);
        $this->load->view('footer');
    }
}