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

		$this->db->order_by('id', 'DESC');
		$strSQL = $this->db->get($this->getTable());

		return $strSQL->result(); 
	}
	
}