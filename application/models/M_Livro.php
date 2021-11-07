<?php 
defined("BASEPATH") or die("No direct scripts allowed");

class M_Livro extends CI_Model{

	public function add(){
		$data = array(
			'nm_livro' => $this->input->post("livro"),
			'nm_editora' => $this->input->post("editora"),
			'dt_publicado' => $this->input->post("publicacao"),
			'nm_autor' => $this->input->post("autor")
		);
		return $this->db->insert("tb_livro", $data);
	}

	public function existeLivro(){
		$livro = $this->input->post("livro");
		$this->db->where("nm_livro", $livro);
		return array("exists" => count($this->db->get("tb_livro")->row_array) >= 1);
	}

	public function rm(){
		$livro = $this->input->post("livro");
		$this->db->where("nm_livro", $livro);
		$this->db->delete("tb_livro");
		return array("removido" => true);
	}

	public function altera(){
		$updateData = array(
			"nm_livro" => $this->input->post("n_livro"),
			"nm_editora" => $this->input->post("n_editora"),
			"nm_autor" => $this->input->post("n_autor"),
			"dt_publicado" => $this->input->post("n_publicado")
		);
		$this->db->where("nm_livro", $this->input->post("livro"));
		$this->db->update("tb_livro", $updateData);
		return array("alterado" => true);
	}

	public function get(){ return $this->db->get("tb_livro")->result_array(); }

}



