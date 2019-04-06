<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasboard extends CI_Controller {

	public function verificar_sessao(){
	if($this->session->userdata('logado')==false){
		redirect('login');
	}
}

	public function index()
	{
		$this->verificar_sessao();


		$this->db->select('*');
		$this->db->join('usuario','iduser=id_usuario', 'inner');
		$this->db->order_by('id', 'desc');
		$dados['mural'] = $this->db->get('mural')->result();
		$dados['menu'] = 'ativo1';
		$this->load->view('dasboard',$dados);
	}

		public function todos(){
							$this->verificar_sessao();

							$this->db->select('*');
							$this->db->join('usuario','iduser=id_usuario', 'inner');
							$this->db->order_by('id', 'desc');
							$dados['mural'] = $this->db->get('mural')->result();
							$dados['menu'] = 'ativo1';

							$this->load->view('dasboard',$dados);

		}

				public function colegiado(){
					$this->verificar_sessao();

												$this->db->select('*');
												$dados['mural'] = $this->db->get('colegiado')->result();
												$dados['menu'] = 'ativo2';
												$this->load->view('dasboard_colegiado',$dados);
					}
					public function colegiado_ver($id=null){
						$this->verificar_sessao();

						$this->db->select('*');
						$this->db->join('usuario','iduser=id_usuario', 'inner');
						$this->db->where('colegiado',$id);
						$this->db->order_by('id', 'desc');

						$dados['mural'] = $this->db->get('mural')->result();
						$dados['menu'] = 'ativo2';

						$this->load->view('colegiado_ver',$dados);


						}

					public function seguindo(){
						$this->verificar_sessao();

						$iduser= $this->session->userdata('iduser');


													$this->db->where('id_user',$iduser);
													$this->db->join('mural','mural.id=seguir.id_mural', 'inner');

													$dados['mural'] = $this->db->get('seguir')->result();
													$dados['menu'] = 'ativo3';

													$this->load->view('dasboard_seguindo',$dados);
						}


						public function pesquisar(){
							{
								$dados['menu'] = '';

								$termo = $this->input->post('pesquisar');
								$this->db->select('*');
								$this->db->like('nome_mural',$termo);
								$this->db->join('usuario','iduser=id_usuario', 'inner');

								$dados['mural'] = $this->db->get('mural')->result();

								$this->load->view('pesquisar',$dados);

							}

						}



}
