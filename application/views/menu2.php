<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="TheAdmin - Responsive admin and web application ui kit">
    <meta name="keywords" content="admin, dashboard, web app, sass, ui kit, ui framework, bootstrap">

    <title>Mural Univasf</title>

    <!-- Styles -->
    <link href="<?= base_url();?>assets/css/core.min.css" rel="stylesheet">
    <link href="<?= base_url();?>assets/css/app.min.css" rel="stylesheet">
    <link href="<?= base_url();?>assets/css/style.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="<?= base_url();?>assets/img/apple-touch-icon.png">
    <link rel="icon" href="<?= base_url();?>assets/img/favicon.png">
  </head>

  <body class="topbar-unfix">


    <!-- Topbar -->
    <header class="topbar topbar-expand-lg topbar-secondary topbar-inverse">
      <div class="container">
        <div class="topbar-left">
          <span class="topbar-btn topbar-menu-toggler"><i>&#9776;</i></span>

          <div class="topbar-brand">
            <a href="<?= base_url();?>"><img src="<?= base_url();?>assets/img/logo.png" alt="..."></a>
          </div>

          <div class="topbar-divider d-none d-md-block"></div>

          <nav class="topbar-navigation">
            <ul class="menu">
              <li class="menu-item">
                <a class="menu-link">
                  <span class="title">Murais ></span>
                </a>
              </li>

              <?
              if ($menu=='ativo1'){?>
                <li class="menu-item active">
                  <a class="menu-link" href="<?= base_url();?>dasboard/todos">
                    <span class="title">Todos</span>
                  </a>
                </li>
              <? }
              else {
                ?>
                <li class="menu-item">
                  <a class="menu-link" href="<?= base_url();?>dasboard/todos">
                    <span class="title">Todos</span>
                  </a>
                </li>
              <?}?>


              <? if ($menu=='ativo2'){?>

                <li class="menu-item active">
                  <a class="menu-link" href="<?= base_url();?>dasboard/colegiado">
                    <span class="title">Colegiados</span>
                  </a>
                </li>

              <? }
              else {
                ?>
                <li class="menu-item">
                  <a class="menu-link" href="<?= base_url();?>dasboard/colegiado">
                    <span class="title">Colegiados</span>
                  </a>
                </li>

              <?}?>


              <? if ($menu=='ativo3'){?>

                <li class="menu-item active">
                  <a class="menu-link" href="<?= base_url();?>dasboard/seguindo">
                    <span class="title">Seguindo</span>
                  </a>
                </li>
              <? }
              else {
                ?>
                <li class="menu-item">
                  <a class="menu-link" href="<?= base_url();?>dasboard/seguindo">
                    <span class="title">Seguindo</span>
                  </a>
                </li>

              <?}?>







            </ul>
          </nav>
        </div>


        <div class="topbar-right">

          <ul class="topbar-btns">
            <li class="dropdown">
              <span class="topbar-btn" data-toggle="dropdown"><?php echo $this->session->userdata('nomedousuario');?></span>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="<?= base_url();?>usuario/perfil"><i class="ti-user"></i> Perfil</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url();?>usuario/logout"><i class="ti-power-off"></i> Sair</a>
              </div>
            </li>


            <li>
              <?
              $iduser = $this->session->userdata('iduser');
              $query = $this->db->query("select * from notificacao where id_usuario = $iduser");
              $con_not= $query->num_rows();?>
              <?if ($con_not==0){?>
              <span class="topbar-btn" data-toggle="quickview" data-target="#qv-notifications"><i class="ti-bell"></i></span>
              <?}else{?>
              <span class="topbar-btn has-new" data-toggle="quickview" data-target="#qv-notifications"><i class="ti-bell"></i></span>
              <?}?>
            </li>

          </ul>

        </div>
      </div>
    </header>
    <!-- END Topbar -->



    <!-- Main container -->
    <main>
