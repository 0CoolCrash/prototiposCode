	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lista extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('zapateriamodel');
	}
	
	public function index(){
		
		$this->load->view('panel');
	}
	
	public function guardarZa(){
		echo "<script>alert('Registro Exitoso');</script>";
		
		$param['nombre_za'] = $this->input->post('nombre');
		$param['numero_za'] = $this->input->post('numero');
		$param['color_za'] = $this->input->post('color');
		
		$this->zapateriamodel->guardar($param);	
		
		$this->load->view('panel');
	}

	public function Consultar(){		
		echo json_encode($this->zapateriamodel->ObtenerDatos());
	}
	
	public function Eliminar(){
		$id = $this->input->post('idzapa');
		$this->zapateriamodel->Eliminalo($id);
		
	}
	
	public function Editar(){
		$idE = $this->input->post('idzapa');
		$this->zapateriamodel->Eliminalo($idE);
		
	}
	
	
	
	
	
	
}

