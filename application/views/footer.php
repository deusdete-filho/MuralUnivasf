
    </main>





    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <!-- Quickviews -->


    <!-- Notifications -->
    <div id="qv-notifications" class="quickview">
      <header class="quickview-header quickview-header-lg">
        <h5 class="quickview-title">Notificações</h5>
        <span class="close"><i class="ti-close"></i></span>
      </header>

      <div class="quickview-body">
        <div class="media-list media-list-hover media-list-divided media-sm">
<?php $iduser = $this->session->userdata('iduser');?>
          <?
        $query = $this->db->query("select * from notificacao where id_usuario = $iduser order by id_notificacao desc");
            foreach ($query->result() as $row)
            {
                    ?>

          <a class="media media-new" href="#">
            <span class="avatar bg-success"><i class="ti-user"></i></span>
            <div class="media-body">
              <p><? echo $row->notificacao;?></p>
              <time datetime="<? echo $row->data;?>"><? echo $row->data;?></time>
            </div>
          </a>

          <?}?>



        </div>
      </div>

      <footer class="quickview-footer flexbox">

      </footer>
    </div>


    <!-- END Quickviews -->
    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->


    <!-- Scripts -->
    <script src="<?= base_url();?>assets/js/core.min.js"></script>
    <script src="<?= base_url();?>assets/js/app.min.js"></script>
    <script src="<?= base_url();?>assets/js/script.js"></script>

  </body>
</html>
