<?php
session_start(); ?>
<!DOCTYPE html>
<html>
<style class="stylesheet" type="text/css">
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
  background-image: url("../imgs/background.png");
  background-repeat: no-repeat;
  background-size: 100% 100%;
}

</style>
<head>
    <link rel="icon" href="../imgs/logo.png" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Cadastro - BRIDGE  </title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <script type="text/javascript" src="../js/functions.js"></script>
</head>
<body >
    <section class="hero  is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                  <img src="../imgs/logo.png" width="120">
                    <h3 class="title has-text-black">Sistema de Cadastro</h3>
                    <div class="box">
                        <form action="cadastrar.php"  method="POST">
                            <div class="field">
                                <div class="control">
                                    <input onpaste="return false;" autocomplete="off" onkeypress="letterOnly()" name="nome" required type="text" class="input is-large" placeholder="Nome" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                  <label>Selecione o Sexo:</label>
                                    <select name="sexo" required class="input is-large">
                                        <option value="Masc">Masculino</option>
                                        <option value="Fem">Feminino</option>
                                        <option value="Ocult">Prefiro não dizer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input autocomplete="off" name="email" required class="input is-large" type="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input autocomplete="off" onkeypress="passChars()" required name="senha" id="pass" style="float: left; " class="input is-large" type="password" placeholder="Sua senha" >
                                    <div id="senhaBack"><p id="senha" onclick="showPass()" class="button is-block is-large" ><?php include('../imgs/icon.svg') ;?></p></div>

                                </div>
                            </div>
                            <div class="field"><a style="color:black;" href="../index.php"><i><u>Logar</u></i></a></div>
                            <button style="background-color: #044087;" type="submit" class="button is-block is-link is-large is-fullwidth">Cadastrar</button>
                        </form>
                    </div>
                     <?php
                        if(isset($_SESSION['status_cadastro'])):
                    ?>
                    <div class="notification is-success">
                      <p>Cadastro efetuado!</p>
                      <p>Faça login informando o seu email e senha <a href="../index.php">aqui</a></p>
                    </div>
                     <?php
                     endif;
                     unset($_SESSION['status_cadastro']);
                      ?>
                      <?php
                        if(isset($_SESSION['email_existe'])):
                      ?>
                    <div class="notification is-info">
                        <p>O Email escolhido já está cadastrado. Informe outro e tente novamente.</p>
                    </div>
                    <?php
                     endif;
                     unset($_SESSION['email_existe']);
                      ?>
                       <?php
                        if(isset($_SESSION['nome_invalido'])):
                      ?>
                    <div class="notification is-info">
                        <p>Informe um nome válido</p>
                    </div>
                    <?php
                     endif;
                     unset($_SESSION['nome_invalido']);
                      ?>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
