<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zapateriamodel extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function guardar($param){
		$campos = array(
			'nombre_za' => $param['nombre_za'],
			'numero_za' => $param['numero_za'],
			'color_za' => $param['color_za']
		);
		$this->db->insert('ta_zapateria', $campos);
	}
	
	public function guardarUser($param){
		$campos = array(
			'usuario_za' => $param['usuario_za'],
			'key_za' => $param['key_za']
		);
		$this->db->insert('ta_user', $campos);
	}
	
	public function ObtenerDatos(){
		$this->db->select('id_za, nombre_za, numero_za, color_za', false);
		$this->db->from('ta_zapateria');
		
		$r = $this->db->get();
		return $r->result();
	}
	
	public function Eliminalo($id){
		/*$campos  = array (
			'id_za' => $id
		);
			
		$this->db->delete('ta_zapateria', $campos);
		*/
		$this->db->where('id_za', $id);
		$this->db->delete('ta_zapateria');
	}
	
	public function Obdat($idAE){
		$this->db->select('id_za, nombre_za, numero_za, color_za', false);
		$this->db->from('ta_zapateria');
		$this->db->where('id_za', $idAE);
		$r = $this->db->get();
		return $r->result();
		
	}
	
	public function UpdateZ($param){
				
		$campos = array (
			'nombre_za' => $param['nombre_za'],
			'numero_za' => $param['numero_za'],
			'color_za' => $param['color_za']		
		);
		
		$this->db->update('ta_zapateria', $campos);
		$this->db->where('id_za', $idMoto);
		
		return 1;
	}
	
	
	
	
	
	
	
	
	
	
}
