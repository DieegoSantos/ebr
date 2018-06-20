<?php
class Admin extends CI_Controller {

    protected function verificaSessao() {
        $strLogado = $this->session->userdata("usuarioLogado");
        if (!$strLogado) {
            redirect(base_url('Login'));
            return false;
        } else
            return true;
    }
    public function index() {
        if($this->verificaSessao())
            redirect(base_url('admin/listarJogador'));
    }

    /** PAGINAS JOGADORES */

    public function listarJogador() {
        if(!$this->verificaSessao())
            redirect(base_url('Login'));
        $this->load->library('pagination');
        $config['base_url'] = base_url('Admin/listarJogador');
        $config['total_rows'] = $this->db->count_all_results('jogadores');
        $config['per_page'] = 5;

        $this->pagination->initialize($config);

        echo $this->pagination->create_links();
        $this->load->model('GetJogadores_Model');
        $arrDados['objDados'] = $this->GetJogadores_Model->getListJogadores();
        $arrDados['objPagination'] = $this->pagination->create_links();
        $this->load->view('admin/header');
        $this->load->view('admin/jogador/exibir', $arrDados);
    }

    public function addJogador() {
        if(!$this->verificaSessao())
            redirect(base_url('Login'));
        $this->load->view('admin/header');
        $this->load->view('admin/jogador/merge');
    }

    public function editarJogador() {
        if(!$this->verificaSessao())
            redirect(base_url('Login'));

        $this->load->model('GetJogadores_Model');
        $idjogador = $this->input->get('id');
        $arrWhere = array();
        if($idjogador)
            $arrWhere['id'] = $idjogador;

        $objJogador = $this->GetJogadores_Model->getListJogadores($arrWhere);
        $arrDados = array();
        foreach ($objJogador as $objResult) {
            $arrDados['id'] = $objResult->id;
            $arrDados['nome'] = $objResult->nome;
            $arrDados['psn'] = $objResult->psn;
            $arrDados['image'] = $objResult->image;
            $arrDados['status'] = $objResult->status;

        }

        $this->load->view('admin/header');
        $this->load->view('admin/jogador/merge', $arrDados);
    }

    public function saveJogador() {
        if(!$this->verificaSessao())
            redirect(base_url('Login'));

        $strNome = $this->input->post('nome');
        $strPSN = $this->input->post('psn');
        $intStatus = $this->input->post('status');
        $id = $this->input->post('id');


        $arrDados = array();
        $arrDados['nome'] = $strNome;
        $arrDados['psn'] = $strPSN;
        $arrDados['status'] = $intStatus;
        if($id > 0) {
            $this->db->where("id", $id);
            $this->db->update('jogadores', $arrDados);
            $this->session->set_flashdata('sucesso','Jogador atualizado com sucesso.');

        } else {
            $this->db->insert('jogadores', $arrDados);
            $this->session->set_flashdata('sucesso','Jogador cadastrado com sucesso.');
        }

        redirect(base_url('Admin/listarJogador'));
    }

    public function deletaJogador() {

        if(!$this->verificaSessao())
            redirect(base_url('Login'));

        $id = $this->input->get("id");

        if($this->db->delete('jogadores', array('id' => $id))) {
            $this->session->set_flashdata('sucesso','Jogador removido com sucesso.');
            redirect(base_url('Admin/listarJogador'));
        }

    }

    /** PAGINAS PLANOS */
    public function listarPlanos() {
        if(!$this->verificaSessao())
            redirect(base_url('Login'));
        $this->load->model('GetPlanos_Model');
        $arrDados['objDados'] = $this->GetPlanos_Model->getListPlanos();
        $this->load->view('admin/header');
        $this->load->view('admin/planos/exibir', $arrDados);
    }

    public function addPlanos() {
        if(!$this->verificaSessao())
            redirect(base_url('Login'));
        $this->load->view('admin/header');
        $this->load->view('admin/planos/merge');
    }

    public function editarPlanos() {
        if(!$this->verificaSessao())
            redirect(base_url('Login'));

        $this->load->model('GetPlanos_Model');
        $idjogador = $this->input->get('id');
        $arrWhere = array();
        if($idjogador)
            $arrWhere['id'] = $idjogador;

        $objJogador = $this->GetPlanos_Model->getListPlanos($arrWhere);
        $arrDados = array();
        foreach ($objJogador as $objResult) {
            $arrDados['id'] = $objResult->id;
            $arrDados['nome'] = $objResult->nome;
            $arrDados['valor'] = $objResult->valor;
            $arrDados['bonus'] = $objResult->bonus;
            $arrDados['link'] = $objResult->link;
            $arrDados['status'] = $objResult->status;

        }

        $this->load->view('admin/header');
        $this->load->view('admin/planos/merge', $arrDados);
    }

    public function savePlanos() {
        if(!$this->verificaSessao())
            redirect(base_url('Login'));

        $strNome = $this->input->post('nome');
        $strValor = $this->input->post('valor');
        $strBonus = $this->input->post('bonus');
        $strLink = $this->input->post('link');
        $intStatus = $this->input->post('status');
        $id = $this->input->post('id');


        $arrDados = array();
        $arrDados['nome'] = $strNome;
        $arrDados['valor'] = $strValor;
        $arrDados['bonus'] = $strBonus;
        $arrDados['link'] = $strLink;
        $arrDados['status'] = $intStatus;
        if($id > 0) {
            $this->db->where("id", $id);
            $this->db->update('planos', $arrDados);
            $this->session->set_flashdata('sucesso','Plano atualizado com sucesso.');

        } else {
            $this->db->insert('planos', $arrDados);
            $this->session->set_flashdata('sucesso','Plano cadastrado com sucesso.');
        }

        redirect(base_url('Admin/listarPlanos'));
    }

    public function deletaPlanos() {

        if(!$this->verificaSessao())
            redirect(base_url('Login'));

        $id = $this->input->get("id");

        if($this->db->delete('planos', array('id' => $id))) {
            $this->session->set_flashdata('sucesso','Plano removido com sucesso.');
            redirect(base_url('Admin/listarPlanos'));
        }

    }

    /** PAGINAS CADASTRO DE CAMPEOES */
    public function listarCampeoes() {
        if(!$this->verificaSessao())
            redirect(base_url('Login'));
        $this->load->model('GetCampeoes_Model');
        $arrDados['objDados'] = $this->GetCampeoes_Model->getListCampeoes();
        $this->load->view('admin/header');
        $this->load->view('admin/campeoes/exibir', $arrDados);
    }

    public function cadastrarCampeao() {
        if(!$this->verificaSessao())
            redirect(base_url('Login'));

        $this->load->model('GetJogadores_Model');
        $arrWhere['status'] = 1;
        $arrDados['jogador'] = $this->GetJogadores_Model->getListJogadores($arrWhere);
        $this->load->view('admin/header');
        $this->load->view('admin/campeoes/merge', $arrDados);
    }

    public function saveCampeao() {
        if(!$this->verificaSessao())
            redirect(base_url('Login'));

        $strNome = $this->input->post('nome_jogador');
        $strTorneio = $this->input->post('torneio');
        $strTemporada = $this->input->post('temporada');
        $id = $this->input->post('id');


        $arrDados = array();
        $arrDados['nome_jogador'] = $strNome;
        $arrDados['torneio'] = $strTorneio;
        $arrDados['temporada'] = $strTemporada;
        if($id > 0) {
            $this->db->where("id", $id);
            $this->db->update('campeoes', $arrDados);
            $this->session->set_flashdata('sucesso','Plano atualizado com sucesso.');

        } else {
            $this->db->insert('campeoes', $arrDados);
            $this->session->set_flashdata('sucesso','Plano cadastrado com sucesso.');
        }

        redirect(base_url('Admin/listarCampeoes'));
    }

    /** PAGINAS DE CONTEUDOS */
    public function addCronograma() {
        if(!$this->verificaSessao())
            redirect(base_url('Login'));

        $arrWhere['id'] = 1;

        $this->load->model('GetConteudos_Model');
        $objConteudo = $this->GetConteudos_Model->getListConteudos($arrWhere);
        $arrDados = array();
        foreach ($objConteudo as $objResult) {
            $arrDados['titulo'] = $objResult->titulo;
            $arrDados['texto'] = $objResult->texto;
            $arrDados['id'] = $objResult->id;
        }


        $this->load->view('admin/header');
        $this->load->view('admin/conteudos', $arrDados);
    }

    public function addInscricoes() {
        if(!$this->verificaSessao())
            redirect(base_url('Login'));

        $arrWhere['id'] = 2;

        $this->load->model('GetConteudos_Model');
        $objConteudo = $this->GetConteudos_Model->getListConteudos($arrWhere);
        $arrDados = array();
        foreach ($objConteudo as $objResult) {
            $arrDados['titulo'] = $objResult->titulo;
            $arrDados['texto'] = $objResult->texto;
            $arrDados['id'] = $objResult->id;
        }


        $this->load->view('admin/header');
        $this->load->view('admin/conteudos', $arrDados);
    }

    public function addCampeoes() {
        if(!$this->verificaSessao())
            redirect(base_url('Login'));

        $arrWhere['id'] = 3;

        $this->load->model('GetConteudos_Model');
        $objConteudo = $this->GetConteudos_Model->getListConteudos($arrWhere);
        $arrDados = array();
        foreach ($objConteudo as $objResult) {
            $arrDados['titulo'] = $objResult->titulo;
            $arrDados['texto'] = $objResult->texto;
            $arrDados['id'] = $objResult->id;
        }


        $this->load->view('admin/header');
        $this->load->view('admin/conteudos', $arrDados);
    }

    public function addEstatutos() {
        if(!$this->verificaSessao())
            redirect(base_url('Login'));

        $arrWhere['id'] = 4;

        $this->load->model('GetConteudos_Model');
        $objConteudo = $this->GetConteudos_Model->getListConteudos($arrWhere);
        $arrDados = array();
        foreach ($objConteudo as $objResult) {
            $arrDados['titulo'] = $objResult->titulo;
            $arrDados['texto'] = $objResult->texto;
            $arrDados['id'] = $objResult->id;
        }


        $this->load->view('admin/header');
        $this->load->view('admin/conteudos', $arrDados);
    }

    public function saveConteudo() {
        if(!$this->verificaSessao())
            redirect(base_url('Login'));

        $strTitulo = $this->input->post('titulo');
        $strTexto = $this->input->post('texto');
        $id = $this->input->post('id');


        $arrDados = array();
        $arrDados['titulo'] = $strTitulo;
        $arrDados['texto'] = $strTexto;
        if($id > 0) {
            $this->db->where("id", $id);
            $this->db->update('conteudos', $arrDados);
            $this->session->set_flashdata('sucesso','Conteudo atualizado com sucesso.');

        }
        if($id == 1)
            redirect(base_url('Admin/addCronograma'));
        if($id == 2)
            redirect(base_url('Admin/addInscricoes'));
        if($id == 3)
            redirect(base_url('Admin/addCampeoes'));
        if($id == 4)
            redirect(base_url('Admin/addEstatutos'));
    }
}