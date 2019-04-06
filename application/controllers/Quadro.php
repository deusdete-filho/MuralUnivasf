<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quadro extends CI_Controller {
	public function verificar_sessao(){
	if($this->session->userdata('logado')==false){
		redirect('login');
	}
}

	public function index($id=null)
	{		$this->verificar_sessao();
		$dados['menu'] = '';


		$this->load->view('mural');
	}

	public function criar_aviso($id=null){
		$dados['menu'] = '';

		$this->verificar_sessao();
		$iduser= $this->session->userdata('iduser');

			$this->db->where('id',$id);
			$dados['mural'] = $this->db->get('mural')->result();

			$this->db->where('id_user',$iduser);
			$this->db->where('id_mural',$id);
			$dados['seguidor'] = $this->db->get('seguir')->result();

			$this->db->where('idmural',$id);
			$this->db->join('usuario','aviso.iduser=usuario.iduser', 'inner');
			$dados['aviso'] = $this->db->get('aviso')->result();

			$this->db->select_sum('status');
			$this->db->from('seguir');
			$this->db->where('id_user',$iduser);
			$this->db->where('id_mural',$id);
			$contador_seguir = $this->db->count_all_results();


			$this->db->where('id',$id);
			$this->db->join('usuario','iduser=id_usuario', 'inner');
			$dados['mural'] = $this->db->get('mural')->result();
		$this->load->view('criar_aviso',$dados);

	}

	public function adicionar_aviso($id=null){
		$dados['menu'] = '';

		$this->verificar_sessao();

		$iduser= $this->session->userdata('iduser');

			$this->db->where('id',$id);
			$dados['mural'] = $this->db->get('mural')->result();

			$this->db->where('id_user',$iduser);
			$this->db->where('id_mural',$id);
			$dados['seguidor'] = $this->db->get('seguir')->result();

			$this->db->select_sum('status');
			$this->db->from('seguir');
			$this->db->where('id_user',$iduser);
			$this->db->where('id_mural',$id);
			$contador_seguir = $this->db->count_all_results();


			$this->db->where('id',$id);
			$this->db->join('usuario','iduser=id_usuario', 'inner');
			$dados['mural'] = $this->db->get('mural')->result();
			$this->load->view('adicionar_aviso',$dados);
	}

		public function excluir_aviso($id=null)
				{
					$this->verificar_sessao();

					$iduser = $this->session->userdata('iduser');
					$query = $this->db->query("select * from aviso where id = $id");
					foreach ($query->result() as $row)
					{
						$iduseraviso = $row->iduser;
					}

					if($iduser == $iduseraviso)
						{
								$this->db->where('id',$id);
								if($this->db->delete('aviso'))
								{
									redirect("quadro/msg_excluido_aviso");
								}else{
									redirect("dasboard");
								}
				}
				else {
					redirect("quadro/msg_excluido_aviso_erro");

				}
}


			public function msg_excluido_aviso()
			{
				$this->verificar_sessao();
				$dados['menu'] = '';

				$this->load->view('menu2',$dados);
				$this->load->view('msg_excluido_aviso',$dados);
			}


			public function msg_excluido_aviso_erro()
			{
				$this->verificar_sessao();
				$dados['menu'] = '';

				$this->load->view('menu2',$dados);
				$this->load->view('msg_excluido_mural_aviso',$dados);
			}

	public function salvar_aviso($id=null){
		$this->verificar_sessao();

		$segue = $this->input->post('segue');
		$data['descricao'] = $this->input->post('descricao');
		$data['iduser'] = $this->session->userdata('iduser');
		$data['data'] =date('Y-m-d');
		$data['idmural'] = $this->uri->segment(3);

		$this->form_validation->set_rules('descricao', 'descricao', 'required');

				if ($this->form_validation->run() == FALSE)
								 {
									 $this->load->view('criar_aviso');
								 }
								 else
								 {		$data['iduser'] = $this->session->userdata('iduser');

									 $data['descricao'] = $this->input->post('descricao');
							 		$data['data'] =date('Y-m-d');
									$data['idmural'] =$this->uri->segment(3);

																		if($this->db->insert('aviso',$data)){
																			$data['iduser'] = $this->session->userdata('iduser');
																			$data['descricao'] = $this->input->post('descricao');
																			$data['data'] =date('Y-m-d');
																			$data['idmural'] =$this->uri->segment(3);


																						$this->session->set_userdata($data);


																										$id_mural = $this->uri->segment(3);

																										$query = $this->db->query("select * from mural where id = $id_mural");
																										foreach ($query->result() as $row)
																										{
																											$nome_do_mural = $row->nome_mural;
																										}
																											$query = $this->db->query("select * from seguir where id_mural = $id_mural");
																											foreach ($query->result() as $row)
																											{
																												$data = date('Y-m-d');
																												$id_mural = $this->uri->segment(3);
																												$id_usuario = $row->id_user;
																												$notificacao = "Há um novo quadro no mural! $nome_do_mural";
																												$this->db->set('id_mural', $id_mural);
																												$this->db->set('id_usuario', $id_usuario);
																												$this->db->set('notificacao', $notificacao);
																												$this->db->set('data', $data);
																												$this->db->insert('notificacao');

																											}






																						redirect("mural/ver_mural/$id");
																		}else{
																			redirect('mural/erro');}
																		}



}

}
