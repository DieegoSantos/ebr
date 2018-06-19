<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alunos extends MY_Controller {

    public function view() {

        $this->load->model('GetAlunos_Model');
        $arrDados['objDados'] = $this->GetAlunos_Model->getListAlunos();
        $this->load->view('alunos/alunos_exibir', $arrDados);
    }

	
	public function add() {
        $this->load->view('alunos/alunos_merge');
	}

    public function edit() {
        $this->load->model('GetAlunos_Model');

        $idAluno = $this->input->get('idAluno');
        $arrWhere = array();
        if($idAluno)
                $arrWhere['id_aluno'] = $idAluno;

        $objAlunos = $this->GetAlunos_Model->getListAlunos($arrWhere);
        $arrDados = array();
        foreach ($objAlunos as $objResult) {
            $arrDados['idAluno'] = $objResult->id_aluno;
            $arrDados['nome'] = $objResult->nome;
            $arrDados['data_nascimento'] = $objResult->data_nascimento;
            $arrDados['telefone'] = $objResult->telefone;
            $arrDados['cpf'] = $objResult->cpf;
            $arrDados['rg'] = $objResult->rg;

        }

        $this->load->view('alunos/alunos_merge', $arrDados);
    }

	public function save() {
        $this->load->helper('date');

        $strNome = $this->input->post('nome');
        $strData = $this->input->post('data_nascimento');
        $strTel = $this->input->post('tel');
        $strCPF = $this->input->post('cpf');
        $strRG = $this->input->post('rg');
        $idAluno = $this->input->post('id_aluno');


        $arrDados = array();
        $arrDados['nome'] = $strNome;
        $arrDados['data_nascimento'] = nice_date($strData, 'Y-m-d');;
        $arrDados['telefone'] = $strTel;
        $arrDados['cpf'] = $strCPF;
        $arrDados['rg'] = $strRG;

        if($idAluno > 0) {
           $this->db->where("id_aluno", $idAluno);
           $this->db->update('alunos', $arrDados);
           $this->session->set_flashdata('sucesso','Aluno atualizado com sucesso.');

        } else {
            $this->db->insert('alunos', $arrDados);
            $this->session->set_flashdata('sucesso','Aluno cadastrado com sucesso.');
        }
         redirect(base_url('index.php/Alunos/listarAlunos'));

	}

    public function delete() {

            $idAluno = $this->input->get("idAluno");

            if($this->db->delete('alunos', array('id_aluno' => $idAluno))) {
                 $this->session->set_flashdata('sucesso','Aluno removido com sucesso.');
                 redirect(base_url('index.php/Alunos/listarAlunos'));
            }

    }
}
