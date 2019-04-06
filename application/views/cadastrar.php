<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive admin dashboard and web application ui kit. ">
    <meta name="keywords" content="register, signup">

    <title>Cadastrar - Mural Univasf</title>

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
      <h5 class="text-uppercase">Cadastrar</h5>
      <br>

      <form class="form-type-material"  action="<?= base_url();?>cadastrar/salvar" method="post">
        <div class="form-group">
          <input type="text" class="form-control" name="nome_usuario" value="<?=set_value('nome_usuario')?>">
          <label for="username">Nome</label> <?php echo form_error('nome_usuario', '<div class="text-danger">', '</div>'); ?>
        </div>

        <div class="form-group">
          <input type="text" class="form-control"  name="cpf" value="<?=set_value('cpf')?>">
          <label for="cpf">CPF</label><?php echo form_error('cpf', '<div class="text-danger">', '</div>'); ?>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" name="email" value="<?=set_value('email')?>">
          <label for="email">E-mail</label> <?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
        </div>

        <div class="form-group">
          <select class="form-control" name="colegiado">
            <? foreach ($colegiado as $c) {?>
              <option value="<?= $c->id; ?>"><?= $c->nome_colegiado;?></option>
              <?}?>
          </select>
          <label for="colegiado">Colegiado</label> <?php echo form_error('colegiado', '<div class="text-danger">', '</div>'); ?>
        </div>

        <div class="form-group">
          <select class="form-control" name="tipo">
            <? foreach ($tipo_usuario as $u) {?>
              <option value="<?= $u->id; ?>"><?= $u->tipo;?></option>
              <?}?>
          </select>
          <label for="email">Usuário</label>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="login" value="<?=set_value('login')?>">
          <label for="email">Login</label><?php echo form_error('login', '<div class="text-danger">', '</div>'); ?>
        </div>

        <div class="form-group">
          <input type="password" class="form-control" id="password" name="senha">
          <label for="password">Senha</label><?php echo form_error('senha', '<div class="text-danger">', '</div>'); ?>
        </div>

        <button class="btn btn-bold btn-block btn-primary" type="submit">Cadastrar</button>
        <button class="btn btn-bold btn-block btn-default" type="reset">Cancelar</button>
      </form>

      <hr class="w-10px">

      <p class="text-center text-muted fs-13 mt-20">Já tem uma conta? <a class="text-primary fw-500" href="<?= base_url();?>login">Login</a></p>
    </div>




    <!-- Scripts -->
    <script src="<?= base_url();?>assets/js/core.min.js"></script>
    <script src="<?= base_url();?>assets/js/app.min.js"></script>
    <script src="<?= base_url();?>assets/js/script.min.js"></script>

  </body>
</html>
