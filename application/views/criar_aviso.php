<? 	$this->load->view('menu2');?>


     <section class="jumbotron text-center">
       <div class="container">
         <p>

           <div class="text-center">
               <? foreach ($mural as $m) {?>
                 <?
                    echo "<h3>";
                    echo $m->nome_mural;
                    echo "<h3>";
                 ?>
                   <h6>Autor: <? echo $m->nome_usuario;?> <span class="badge badge-secondary"><? if ($m->tipo==2) echo 'Professor'; elseif ($m->tipo==3) echo 'Colegiado'; ?></span></h6>
                   <h7>Criado em: <? echo $m->data;}?></h7>
                   <p>
                     <?
                     $id_mural = $this->uri->segment(3);
                     $id_user= $this->session->userdata('iduser');

                     $query = $this->db->query("SELECT *FROM seguir where id_user = $id_user and id_mural = $id_mural");

                     $contador_seguir= $query->num_rows();?>

                    </p>



           </div>
       </section>
       <div class="text-center">

         <div class="row">
           <div class="col-sm-3">
       </div>

      <div class="col-sm-6">
        <form class="form-signin" action="<?= base_url();?>quadro/salvar_aviso/<? echo $id_mural;?>" method="post" onSubmit="if(!confirm('Confirmar ou Cancelar?')){return false;}">

        <label>Descrição do quadro</label>
        <textarea class="form-control" name="descricao" required></textarea>

          <br>
        <input type="submit" class="btn btn-success" value="Criar Quadro no mural">

      </div>
      <div class="col-sm-3">
  </div>

     </div>
   </div>
   <? 	$this->load->view('footer');?>
