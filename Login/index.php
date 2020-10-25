<?php session_start();  ?>
<!DOCTYPE html>
<html>
<style class="stylesheet" type="text/css">
#img1{
  width: 100px;
  height: 100px;
  border-radius: 50%;
  position: relative;
  margin-top: -60px;
  background-color:white;
}
#senha{
  margin-left:20%;
  float: right;
  background: none;
  border: none;
  opacity: 0.3;
}
#senha:hover{
  opacity: 1.0;
}
#senhaBack{
  margin-left: 90%;
  width: 10%;
  height: 50px;
  background-color: none;
  position: absolute;
}
section{
  background-image: url("imgs/background.png");
  background-repeat: no-repeat;
  background-size: 100% 100%;
}
a{
  text-decoration: none;
  color: black;
}
</style>
<head>
  <link rel="icon" href="imgs/logo.png" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Login - BRIDGE</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="css/bulma.min.css" />
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="js/functions.js"></script>
</head>

<body >
  <section class="hero is-fullheight">
    <div class="hero-body" >
      <div class="container has-text-centered">
        <div class="column is-4 is-offset-4">
          <div class="box">
            <form action="backend/login.php" method="POST">
              <img id="img1" src="imgs/logo.png">
              <div class="field">
                <div class="control">
                  <input autocomplete="off" required name="email"  class="input is-large" type="email" placeholder="Seu email" autofocus >
                </div>
              </div>

              <div class="field">
                <div class="control">
                  <input autocomplete="off" required name="senha" id="pass" style="float: left; " class="input is-large" type="password" placeholder="Sua senha" >
                  <div id="senhaBack"><p id="senha" onmousedown="showPass()" class="button is-block is-large" ><?php include('imgs/icon.svg') ;?></p></div>
                </div>
              </div>
              <br><br><br>
              <div class="field"><a style="color: black;" href="backend/cadastro.php"><i><u>Cadastrar</u></i></a></div>
              <button style=" background-color: #044087;" type="submit" class="button is-block is-link is-large is-fullwidth">Entrar</button>

            </form>
          </div>

          <?php
          if(isset($_SESSION['nao_autenticado'])):
            ?>
            <div class="notification is-danger">
              <p>ERRO: Email ou senha inválidos.</p>
            </div>
            <?php
          endif;
          unset($_SESSION['nao_autenticado']);
          ?>
        </div>
      </div>
    </div>

  </section>
</body>

</html>
