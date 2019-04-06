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
                   <h5>Criado em: <? echo $m->data;}?></h5>




           </div>
       </section>
       <div class="text-center">

       <a href="<?= base_url();?>quadro/criar_aviso/<? echo $m->id;?>" class="btn btn-secondary">Criar um novo quadro</a>


     </div>
   </div>
   <? 	$this->load->view('footer');?>
