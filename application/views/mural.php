<? 	$this->load->view('menu2');?>


  <?php $tipo= $this->session->userdata('tipo');
   if ($tipo==2){?>
     <section class="jumbotron text-center">
       <div class="container">
         <p>

       <div class="text-center">
         <h3>Adicionar um novo mural</h3>
       </div>
       </section>

         <div class="row">
           <div class="col-sm-3">
       </div>

      <div class="col-sm-6">
        <form class="form-signin" action="<?= base_url();?>mural/salvar_mural" method="post" onSubmit="if(!confirm('Confirmar ou Cancelar?')){return false;}">
        <label>Nome do mural</label>
        <input type="text" class="form-control" name="nome_mural" required>
        <br>
        <input type="submit" class="btn btn-success" value="Criar  Mural">

      </div>
      <div class="col-sm-3">
  </div>


     <?}
     else{?>
       <div class="alert alert-warning alert-dismissible fade show" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
         <strong>Atenção!</strong> Somente professor pode criar um mural.
       </div>

       <?}?>

</div>
<? 	$this->load->view('footer');?>
