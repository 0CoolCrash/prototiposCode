<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Momlogin extends CI_Model {
	
	function __construct(){
		parent::__construct();
	}
	
	public function Accesofull($user, $key){
		
		$this->db->select('id_za, usuario_za, key_za');
		$this->db->from('ta_user');
		$this->db->where('usuario_za', $user);
		$this->db->where('key_za', $key);
		
		$resulta = $this->db->get();
		
		if($resulta->num_rows() == 1){
			$r = $resulta->row();
			
			$s_usuario = array (
				's_id' =>$r->id_za,
				's_usuario' =>$r->usuario_za
			);
			
			$this->session->set_userdata('$s_usuario');
			return 1;
		} else {
			return 0;
		}
	}	
}
