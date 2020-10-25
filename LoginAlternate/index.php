<!DOCTYPE html>
<?php session_start();  ?>
<html>
<head>
	<title>Login - Sistema Bridge</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/bridge.png"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/background.png'); background-repeat: no-repeat;  background-size: 100% 100%;" >
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						<img src="images/bridge.png" width="100px;">
						<P class="login100-form-title-1">LOGIN</P>
					</span>
				</div>

				<form class="login100-form validate-form" method="POST" action="backend/login.php">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Preencha esse Campo">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Preencha esse Campo">
						<span class="label-input100">Senha</span>
						<input class="input100" onkeypress="passChars()" type="password" name="senha" id="pass"  placeholder="Senha">
						<img src="images/eye.png" width="30px;" style="position: absolute; margin-top: -8%; margin-left: 92%; cursor: pointer;" onmousedown="showPass()">
					</div>


					<div class="container-login100-form-btn" >
						<a href="singup.php" style="float: left; ">Cadastrar</a>
						<button style="float: right; margin-left: 40%;" type="submit" class="login100-form-btn">
							Login
						</button>

					</div>
				</form>

			</div>
			<?php
			if(isset($_SESSION['nao_autenticado'])):
				?>
				<div style="position: absolute;">
					<p>ERRO: Email ou senha inválidos.</p>
				</div>
				<?php
			endif;
			unset($_SESSION['nao_autenticado']);
			?>
		</div>
	</div>


	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="js/showPass.js"></script>
</body>
</html>
