<? 	$this->load->view('menu');?>
    <div class="container">

      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Bem vindo!</strong> Aqui estão todos os avisos que você esta seguindo.
      </div>

      <div class="row">

      <? foreach ($mural as $m) {
                  $idmural =  $m->id?>

        <div class="col-6 col-lg-4">
          <div class="card shadow-1">
            <div class="card-body">
              <div class="flexbox">
                <h5><a href="<?= base_url();?>mural/ver_mural/<? echo $m->id;?>"><? echo $m->nome_mural;?></a></h5>
              </div>

              <div class="text-center my-2">
                  <span class="fw-400 text-muted">Último quadro</span>
                  <div class="fs-20 fw-400 text-info">
                    <?
                  $query = $this->db->query("select * from aviso where idmural = $idmural order by id desc limit 1");
                      foreach ($query->result() as $row)
                      {
                              echo $row->descricao;

                      }
                  ?>

                </div>

              </div>
            </div>

            <div class="card-body bg-lighter fw-400 py-12">
              <span class="text-muted mr-1">Quantidade de quadro:</span>
              <span class="text-dark"><? $query = $this->db->query("select * from aviso where idmural = $idmural");
              echo $query->num_rows();?></span>
            </div>
          </div>
        </div>
<?}?>


</div></div></div>
<? 	$this->load->view('footer');?>
