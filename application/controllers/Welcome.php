<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	    $arrDados = array();
	    $arrDados['planos'] = $this->getPlanos();
	    $arrDados['campeoes'] = $this->getCampeoes();

		$this->load->view('welcome_message', $arrDados);
		$this->load->view('footer');
	}

	public function getPlanos() {
        $this->load->model('GetPlanos_Model');
        return $this->GetPlanos_Model->getListPlanos();
    }

    public function getCampeoes() {
	    $this->load->model('GetCampeoes_Model');
	    return $this->GetCampeoes_Model->getListCampeoes();
    }
}
