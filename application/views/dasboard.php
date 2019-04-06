<? 	$this->load->view('menu');?>
      <div class="main-content">
        <div class="container">
          <?php $tipo= $this->session->userdata('tipo');
            if ($tipo==2){?>
              <a href="<?= base_url();?>mural/novo" class="btn btn-success">Criar um novo Mural</a>
              <br><br>
              <?}?>

          <div class="row">

          <? foreach ($mural as $m) {
                      $idmural =  $m->id?>

            <div class="col-12 col-lg-4">
              <div class="card shadow-1">
                <div class="card-body">
                  <div class="flexbox">
                    <h5><a href="<?= base_url();?>mural/ver_mural/<? echo $m->id;?>"><? echo $m->nome_mural;?></a></h5>
                  </div>

                  <div class="text-center my-2">
                      <span class="fw-400 text-muted">Último quadro </span>
                      <div class="fs-20 fw-400 text-info">
                        <?
                      $query = $this->db->query("select * from aviso where idmural = $idmural order by id desc limit 1");
                          foreach ($query->result() as $row)
                          {
                            echo $row->descricao;
                            echo " - ";
                            echo $row->data;

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
                <div class="card-body bg-lighter fw-400 py-12">
                  <span class="text-muted mr-1">Autor: </span>
                  <span class="text-dark"><? echo $m->nome_usuario;?> <span class="badge badge-secondary"><? if ($m->tipo==2) echo 'Professor'; elseif ($m->tipo==3) echo 'Secretária'; ?></span>
                </div>
                <div class="card-body bg-lighter fw-400 py-12">
                  <span class="text-muted mr-1">Colegiado: </span>
                  <span class="text-dark"><? $idc = $m->colegiado;?> <?
                  $query = $this->db->query("select * from colegiado where id = $idc");
                    foreach ($query->result() as $row)
                    {
                            echo $row->nome_colegiado;
                    }
                  ?></span>
                </div>
              </div>
            </div>
<?}?>


</div>

</div></div>


<? 	$this->load->view('footer');?>
