<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

	public function index($id=null){
			if ($id==1)
			{
				$data['msg'] = "Erro! Senha incorreta ";
				$this->load->view('login',$data);
			}
			else if ($id==2)
			{
				$data['msg'] = "Erro! Campo não preenchido";
				$this->load->view('login',$data);
			}
			else if ($id==3)
			{
				$data['msg'] = "Erro! Usuário não existe ";
				$this->load->view('login',$data);
			}
			else if ($id==4)
			{
				$data['msg'] = "Erro! Usuário ainda não ativado no sistema ";
				$this->load->view('login',$data);
			}
			else{
			$data['msg'] = "";
			$this->load->view('login',$data);
		}
		}
		public function logar(){
			$this->form_validation->set_rules('email', 'E-mail', 'required');
			$this->form_validation->set_rules('senha', 'Senha', 'required');


			if ($this->form_validation->run() == FALSE)
				{
					$data['msg'] = "";
					$this->load->view('login',$data);					}
						else
										{

									$email = $this->input->post('email');
									$senha = $this->input->post('senha');

									$this->db->where('senha', $senha);
									$this->db->where('email', $email);
									// $this->db->where('status',1);
									$data['usuario'] = $this->db->get('usuario')->result();

									if(count($data['usuario'])==1)
									{
										$dados['nomedousuario'] = $data['usuario'][0]->nome_usuario;
										$dados['iduser'] = $data['usuario'][0]->iduser;
										$dados['tipo'] = $data['usuario'][0]->tipo;
										$dados['logado'] = true;
										$status = $data['usuario'][0]->status;

													if($status==1){
													$this->session->set_userdata($dados);
													redirect('dasboard');
														}
														else
														{
														redirect('login/4'); // mensagem de erro
														}
									}
									else
									{
									redirect('login/3'); // mensagem de erro
									}
								}
	}
}
