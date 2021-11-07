<?php
defined("BASEPATH") or die("No direct scripts allowed");

class Usuario extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model("M_Usuario");
		$this->load->library("session");
	}

	public function a_cadastro(){
		$model = new M_Usuario;
		$model->add();
		$this->load->helper("url");
		redirect("http://codeigniter-wrk.sol/", "refresh");
	}

	public function a_login(){
		$usr = new M_Usuario;
		$usr->login();
	}

	public function v_login(){ $this->load->view("login"); }

	public function v_cadastro(){ $this->load->view("cadastro"); }


}

?>
