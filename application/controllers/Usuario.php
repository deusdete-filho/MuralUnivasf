<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
	public function index()
	{
		$this->load->view('menu');
		$this->load->view('login');
	}

	public function perfil()

	{
		$dados['menu'] = '';

		$iduser= $this->session->userdata('iduser');

		$this->db->where('iduser',$iduser);
		$dados['aviso'] = $this->db->get('aviso')->result();

		$this->db->where('id_usuario',$iduser);
		$dados['mural'] = $this->db->get('mural')->result();


		$this->load->view('perfil',$dados);


	}

				 public function logout(){
						 $this->load->driver('cache');
							 $this->session->sess_destroy();
							 $this->cache->clean();
							 redirect('dasboard');
							 ob_clean();
					 }
	}
