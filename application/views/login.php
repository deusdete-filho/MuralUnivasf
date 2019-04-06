<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive admin dashboard and web application ui kit. ">
    <meta name="keywords" content="register, signup">

    <title>Mural Univasf</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i" rel="stylesheet">

    <!-- Styles -->
    <link href="<?= base_url();?>assets/css/core.min.css" rel="stylesheet">
    <link href="<?= base_url();?>assets/css/app.min.css" rel="stylesheet">
    <link href="<?= base_url();?>assets/css/style.min.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="../assets/img/apple-touch-icon.png">
    <link rel="icon" href="../assets/img/favicon.png">
  </head>

  <body class="min-h-fullscreen bg-img center-vh p-20" style="background-image: url(<?= base_url();?>univasf.jpg);" data-overlay="8">
    <div class="card card-round card-shadowed px-50 py-30 w-400px mb-0" style="max-width: 100%;">
      <h5 class="text-uppercase">Login</h5>
      <br>
      <h5><div class="text-danger"><?=$msg;?></div></h5>
      <form class="form-type-material"  action="<?= base_url();?>login/logar" method="post">
        <div class="form-group">
          <input type="text" class="form-control" id="email" name="email" value="<?=set_value('email')?>">
          <label for="username">E-mail</label> <?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
        </div>

        <div class="form-group">
          <input type="password" class="form-control" id="senha" name="senha">
          <label for="senha">Senha</label> <?php echo form_error('senha', '<div class="text-danger">', '</div>'); ?>
        </div>


        <button class="btn btn-bold btn-block btn-primary" type="submit">Login</button>
        <button class="btn btn-bold btn-block btn-default" type="reset">Cancelar</button>
      </form>

      <hr class="w-10px">

      <p class="text-center text-muted fs-13 mt-20">Não tem uma conta? <a class="text-primary fw-500" href="<?= base_url();?>cadastrar">Cadastre-se</a></p>
    </div>




    <!-- Scripts -->
    <script src="<?= base_url();?>assets/js/core.min.js"></script>
    <script src="<?= base_url();?>assets/js/app.min.js"></script>
    <script src="<?= base_url();?>assets/js/script.min.js"></script>

  </body>
</html>
