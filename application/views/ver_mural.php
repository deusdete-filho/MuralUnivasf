<? 	$this->load->view('menu2');?>


     <section class="jumbotron text-center">
       <div class="container">
         <p>

       <div class="text-center">
           <? foreach ($mural as $m) {?>
             <?
              $autordomural  = $m->id_usuario;
                echo "<h1>";
                echo $m->nome_mural;
                echo "</h1>";
             ?>
             <?
             $colegiado = $m->colegiado;
             $query = $this->db->query("select * from colegiado where id = $colegiado");
                 foreach ($query->result() as $row)
                 {       echo "<h3>";
                         echo $row->nome_colegiado;
                         echo "</h3>";

                 }
             ?>
               <h6>Autor: <? echo $m->nome_usuario;?> <span class="badge badge-secondary"><? if ($m->tipo==2) echo 'Professor'; elseif ($m->tipo==3) echo 'Colegiado'; ?></span></h6>
               <h7>Criado em: <? echo $m->data;}?></h7>
               <p>
                 <?
                 $id_mural = $this->uri->segment(3);
                 $id_user= $this->session->userdata('iduser');

                 $query = $this->db->query("SELECT *FROM seguir where id_user = $id_user and id_mural = $id_mural");

                 $contador_seguir= $query->num_rows();?>

                 <? if($contador_seguir==0){?>
                 <a href="<?= base_url();?>mural/seguir/<? echo $this->uri->segment(3); ?>"><button type="button" class="btn btn-sm btn-danger">Seguir</button></a>
                 <?} else{?>
                 <a href="<?= base_url();?>mural/deixar_de_seguir/<? echo $this->uri->segment(3); ?>"><button type="button" class="btn btn-sm btn-success">Deixar de Seguir (Cancelar)</button></a>
                  <?}?>
                </p>
                <a href="<?= base_url();?>mural/excluir_mural/<? echo $m->id;?>" onclick="return confirm('Confirmar?')">[deletar mural]</a>


       </div>
       </section>
       <div class="container">

         <?
         $id_user= $this->session->userdata('iduser');

         if($contador_seguir==0){?>

       <div class="alert alert-warning alert-dismissible fade show" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
         <strong>Bem vindo!</strong> Para adicionar um quadro a esse mural basta seguir o mural ou ser autor do mural.
       </div>
       <?
       if ($autordomural == $id_user){?>
         <a href="<?= base_url();?>quadro/adicionar_aviso/<? echo $this->uri->segment(3); ?>"><button type="button" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-edit"></span>  Criar Quadro</button></a>
         <?}?>

       <?}
        else if ($contador_seguir==1){?>
           <a href="<?= base_url();?>quadro/adicionar_aviso/<? echo $this->uri->segment(3); ?>"><button type="button" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-edit"></span> Criar Quadro</button></a>
           <?}
           else if ($autordomural == $id_user){?>
             <a href="<?= base_url();?>quadro/adicionar_aviso/<? echo $this->uri->segment(3); ?>"><button type="button" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-edit"></span>  Criar Quadro</button></a>
             <?}
             else {

             }?>

<br><br>
     <div class="row">
           <? foreach ($aviso as $a) {?>
             <div class="col-12">
             <div class="card shadow-1">
               <div class="card-body">
                 <p class="card-text"><h4><? echo $a->descricao;?></h4></p>
                 <h6>Autor: <? echo $a->nome_usuario;?> <span class="badge badge-secondary"><? if ($a->tipo==2) echo 'Professor'; elseif ($a->tipo==3) echo 'Secretária'; elseif ($a->tipo==1) echo 'Aluno'; ?></span></h6>
               </div>
               <div class="card-footer text-muted">
Criado em: <? echo $a->data;?> <a href="<?= base_url();?>quadro/excluir_aviso/<? echo $a->id;?>" onclick="return confirm('Confirmar?')">[deletar quadro]</a>
</div>

             </div>
 <br></div>
 <?}?>
</div>
</div>
 <? 	$this->load->view('footer');?>
