<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastrar extends CI_Controller {
	public function index()
	{
	$this->db->select('*');
	$dados['colegiado'] = $this->db->get('colegiado')->result();

	$this->db->select('*');
	$dados['tipo_usuario'] = $this->db->get('tipo_usuario')->result();


	$this->load->view('cadastrar',$dados);

	}
	public function sucesso(){
		$this->load->view('cadastrar_sucesso');


}

	public function salvar(){

		$this->db->select('*');
		$dados['colegiado'] = $this->db->get('colegiado')->result();

		$this->db->select('*');
		$dados['tipo_usuario'] = $this->db->get('tipo_usuario')->result();

		$this->form_validation->set_rules('nome_usuario', 'Nome', 'required');
		$this->form_validation->set_rules('cpf', 'CPF', 'required');
		$this->form_validation->set_rules('email', 'E-mail', 'required|is_unique[usuario.email]');
		$this->form_validation->set_rules('colegiado', 'Colegiado', 'required');
		$this->form_validation->set_rules('login', 'Login', 'required|is_unique[usuario.login]');
		$this->form_validation->set_rules('senha', 'Senha', 'required');

		$data['nome_usuario'] = $this->input->post('nome_usuario');
		$data['cpf'] = $this->input->post('cpf');
		$data['email'] = $this->input->post('email');
		$data['colegiado'] = $this->input->post('colegiado');
		$data['tipo'] = $this->input->post('tipo');
		$data['login'] = $this->input->post('login');
		$data['senha'] = $this->input->post('senha');
		$data['status'] = 0;

			if ($this->form_validation->run() == FALSE)
								 {
									 $this->load->view('cadastrar',$dados);
								 }
								 	else
									{
																 		$data['nome_usuario'] = $this->input->post('nome_usuario');
																		$data['cpf'] = $this->input->post('cpf');
																		$data['email'] = $this->input->post('email');
																		$data['colegiado'] = $this->input->post('colegiado');
																		$data['tipo'] = $this->input->post('tipo');
																		$data['login'] = $this->input->post('login');
																		$data['senha'] = $this->input->post('senha');
																		$data['status'] = 0;

																		if($this->db->insert('usuario',$data))
																		{
																			redirect('cadastrar/sucesso');
																		}else{
																			redirect('cadastrar/erro');}
																		}


								 }






}
