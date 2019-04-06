<? 	$this->load->view('menu');?>

    <div class="container">
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Bem vindo!</strong> Aqui estão todos os colegiado relacionados a Univasf.
      </div>

    <div class="row">

          <? foreach ($mural as $m) {
          $idmural =  $m->id?>
            <div class="col-sm-12">

            <div class="card shadow-1">
              <h4 class="card-header"> <a href="<?= base_url();?>dasboard/colegiado_ver/<? echo $m->id;?>"><? echo $m->nome_colegiado;?></a>
</h4>


            </div></div>
<?}?>
</div>
</div>
<? 	$this->load->view('footer');?>
