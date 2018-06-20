<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GetConteudos_Model extends CI_Model {

	public function getTable() {
		return 'conteudos';
	}

	public function getListConteudos(array $arrWhere = array()) {

		if($arrWhere) {
			$arrWhereAux = array();
			foreach($arrWhere as $intKey => $strValue) {
				$arrWhereAux[$intKey] = array($intKey => $strValue);
				$this->db->where($arrWhereAux[$intKey]);
			}
		}

		$strSQL = $this->db->get($this->getTable());

		return $strSQL->result(); 
	}
	
}