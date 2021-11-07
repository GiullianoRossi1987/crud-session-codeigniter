<?php
defined("BASEPATH") or die("No direct scripts allowed");

class Login extends CI_Controller{

	public function index(){
		$this->load->library("session");
		if(!$this->session->logged_usr)
			$this->load->view("login");
		else $this->load->view("workspace");
	}
}

