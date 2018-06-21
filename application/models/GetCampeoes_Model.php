<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GetCampeoes_Model extends CI_Model {

	public function getTable() {
		return 'campeoes';
	}

	public function getListCampeoes(array $arrWhere = array()) {

		if($arrWhere) {
			$arrWhereAux = array();
			foreach($arrWhere as $intKey => $strValue) {
				$arrWhereAux[$intKey] = array($intKey => $strValue);
				$this->db->where($arrWhereAux[$intKey]);
			}
		}

		$this->db->order_by('cp.id', 'DESC');

        $sql = $this->db->select("jg.nome, jg.psn, jg.image, cp.torneio, cp.temporada")
            ->join("jogadores jg", "cp.id_jogador = jg.id")
            ->get("campeoes cp")->result();

		return $sql;
	}
	
}