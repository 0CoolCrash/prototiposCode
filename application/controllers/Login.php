<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('momlogin');
	}

	public function index(){
		$this->load->view('login');
	}
	
	public function Access(){
		
		$user = $this->input->post('usuario');
		$key = $this->input->post('clave');
		
		$res = $this->momlogin->Accesofull($user, $key);	
		
		if($res == 1){
			$this->load->view('panel');
		} else {
			$this->load->view('login');
		}		
	}
	
	
	
	
	public function anadirUser(){
		
		
		$param['usuario_za'] = $this->input->post('nombreu');
		$param['key_za'] = $this->input->post('passwordD');
		
		$this->zapateriamodel->guardarUser($param);	
		
		echo "<script>alert('Registro Exitoso');</script>";
		
		$this->load->view('Login');
	}
	
}
