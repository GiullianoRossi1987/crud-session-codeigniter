<?php
defined("BASEPATH") or die("No direct scripts allowed");

class M_Usuario extends CI_Model{

	public function add(){
		$data = array(
			'nm_usuario' => $this->input->post("nome"),
			'vl_password' => md5($this->input->post("senha")) // codificando
		);
		return $this->db->insert("tb_usuario", $data);
	}

	public function login(){
		$nome = $this->input->post("nome");
		$senha = md5($this->input->post("senha")); // codificado

		$this->db->where("nm_usuario", $nome);
		$this->db->where("vl_password", $senha);

		$usr = $this->db->get("tb_usuario")->row_array();

		if($usr){
			// set session data
			$this->load->library("session");
			$this->session->user_data = $data;
			$this->session->logged_usr = true;

			redirect("http://codeigniter-wrk.sol/workspace");
		}
		else
			redirect()->route("default_controller"); // login
	}

	public function logoff(){
		$this->load->library("session");
		$this->session->logged_usr = false;
		$this->session->user_data = null;
	}

}

?>
