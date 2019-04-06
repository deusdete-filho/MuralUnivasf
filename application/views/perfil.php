<? 	$this->load->view('menu2');?>


     <section class="jumbotron text-center">
       <div class="container">
         <p>

       <div class="text-center">
         <h3>Meu perfil</h3>
       </div>
       </section>
       <div class="container">
         <h3>Quadro(s)</h3>

     <div class="row">
           <? foreach ($aviso as $a) {?>
             <div class="col-12">
             <div class="card shadow-1">
               <div class="card-body">
                 <p class="card-text"><h4><? echo $a->descricao;?></h4></p>
               </div>
               <div class="card-footer text-muted">
Criado em: <? echo $a->data;?> <a href="<?= base_url();?>quadro/excluir_aviso/<? echo $a->id;?>" onclick="return confirm('Confirmar?')">[deletar quadro]</a>
</div>

             </div>
 <br></div>
 <?}?>
</div>

<h3>Mural</h3>

<div class="row">
  <? foreach ($mural as $m) {?>
    <div class="col-12">
    <div class="card shadow-1">
      <div class="card-body">
        <p class="card-text"><h4><? echo $m->nome_mural;?></h4></p>
      </div>
      <div class="card-footer text-muted">
Criado em: <? echo $m->data;?> <a href="<?= base_url();?>mural/excluir_mural/<? echo $m->id;?>" onclick="return confirm('Confirmar?')">[deletar mural]</a>
</div>

    </div>
<br></div>
<?}?>
</div>


</div>
 <? 	$this->load->view('footer');?>
