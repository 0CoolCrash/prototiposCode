<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editar extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('zapateriamodel');
	}
	
	public function index(){
		
		$this->load->view('editar');
	}
	
	public function Consulit(){
		$idAE = $this->input->post('iden');
		echo json_encode($this->zapateriamodel->Obdat($idAE));
	}
	
	public function updateZa(){
		
		$param['id_za'] = $this->input->post('ident');
		$param['nombre_za'] = $this->input->post('nombre');
		$param['numero_za'] = $this->input->post('numero');
		$param['color_za'] = $this->input->post('color');
		
		$this->zapateriamodel->UpdateZ($param);	
		
		echo "<script>alert('Actualización Exitosa');</script>";
		
		$this->load->view('panel');
	}
	
	
}

