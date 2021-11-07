<?php
defined("BASEPATH") or die("No direct scripts allowed");

class Livro extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->library("session");
		$this->load->model("M_Livro");
	}

	public function index(){
		$this->load->view("workspace");
	}

	public function add(){
		$M_livro = new M_Livro;
		$M_livro->add();
		header("Content-Type: application/json");
		echo json_encode(array("adicionado" => true));
	}

	public function get(){
		$M_livro = new M_Livro;
		$con = $M_livro->get();
		echo json_encode($con);
	}

	public function existe(){
		$M_livro = new M_Livro;
		echo json_encode($M_livro->existeLivro());
	}

	public function remove(){
		$M_livro = new M_Livro;
		echo json_encode($M_livro->rm());
	}

	public function update(){
		$M_livro = new M_Livro;
		echo json_encode($M_livro->altera());
	}
			
		
}
