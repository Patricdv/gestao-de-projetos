<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Base projeto de gestão">
  <title>App Carona UFFS</title>
  <link href="http://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="/gestao-de-projetos/css/materialize.min.css">
	<link rel="stylesheet" href="/gestao-de-projetos/css/style.css">
</head>

<body id="project">
	<div class="pattern-position">
		<?php include 'header.php'; ?>

		<main id="login-page">
			<div class="container">
        <div class="row">
          <p id="login-title">Use seu E-mail e Senha para se conectar ao sistema:</p>
					<form id="form-login" method="post" action="/gestao-de-projetos/save-user.php">
            <div class="input-field col s12">
               <input id="email" type="email" name="email" class="validate" required>
               <label for="email" class="active">E-mail</label>
            </div>

            <div class="input-field col s12">
               <input id="password" type="password" name="senha" minlength=6 class="validate" required>
               <label for="password" class="active">Senha</label>
            </div>

						<input type="submit" name="submit" id="user-sub" value="Logar" class="login-submit waves-effect waves-light btn">
            <a href="/gestao-de-projeto/signup.php" id="login-signup">Ainda não possui cadastro? Clique aqui e comece agora!</a>
					</form>				
				</div>
			</div>
		</main>

		<?php include 'footer.php';?>
	</div>
	
  <script type="application/javascript" src="/gestao-de-projetos/js/jquery-2.2.2.min.js"></script>
	<script type="application/javascript" src="/gestao-de-projetos/js/materialize.min.js"></script>
</body>