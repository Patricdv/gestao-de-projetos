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

		<main>
			<div class="container">
        <div class="row">
					<form id="form-usuario" method="post" action="/gestao-de-projetos/save-user.php">
            <p>Selecione uma das alternativas para criar o usuário:</p>
            <p>
               <input type="radio" name="tipo" class="caroneiro" id="caron" value="0">
               <label for="caron">Caroneiro</label>
            </p>
            
            <div class="fade-input input-field col s6 m6 l6">
			         <input id="first_name" name="nome" type="text" class="validate" required>
			         <label for="first_name" class="active">Nome</label>
		        </div>
            
            <div class="fade-input input-field col s6 m6 l6">
               <input id="second_name" type="text" name="sobrenome" class="validate">
               <label for="second_name" class="active">Sobrenome</label>
            </div>

            <div class="fade-input input-field col s6 m6 l6">
               <input id="address" type="text" name="endereco" class="validate" required>
               <label for="address" class="active">Endereço</label>
            </div>

            <div class="fade-input input-field col s6 m6 l6">
               <input id="phone" type="tel" name="telefone" class="validate" required>
               <label for="phone" class="active">Telefone</label>
            </div>
            
            <div class="fade-input input-field col s6 m6 l6">
               <input id="age" type="number" name="idade" class="validate" required="">
               <label for="idade" class="active">Idade</label>
            </div>
            
            <div class="fade-input input-field col s6 m6 l6">
               <input id="email" type="email" name="email" class="validate" required>
               <label for="email" class="active">E-mail</label>
            </div>

            <div class="fade-input input-field col s6 m6 l6">
               <input id="password" type="password" name="senha" minlength=6 class="validate" required>
               <label for="password" class="active">Senha (min 6 caracteres)</label>
            </div>

            <div class="gender-space">
              <p class="fade-input">Escolha seu gênero:</p>
              <p class="fade-input input-field col s6 m6 l6">
                <input type="radio" name="sexo" id="masc" value="0">
                <label for="masc">Masc.</label>
              </p>

              <p class="fade-input input-field col s6 m6 l6">
                 <input type="radio" name="sexo" id="fem" value="1">
                 <label for="fem">Fem.</label>
              </p>
            </div>
            
						<input type="submit" name="submit" id="user-sub" value="ENVIAR" class="fade-input waves-effect waves-light btn">
					</form>				
				</div>
			</div>
		</main>

		<?php include 'footer.php';?>
	</div>
	
  <script type="application/javascript" src="/gestao-de-projetos/js/jquery-2.2.2.min.js"></script>
	<script type="application/javascript" src="/gestao-de-projetos/js/materialize.min.js"></script>
  <script type="application/javascript" src="/gestao-de-projetos/js/jquery.mask.min.js"></script>
  <script type="application/javascript">
    $(document).ready(function(){
      $("#caron").click(function() {
        if($("#caron").is(":checked")) {
          $(".fade-input").fadeIn();
        } else {
          $(".fade-input").fadeOut();
        }
      $("#phone").mask("(99) 9999-9999");
      });
   });
  </script>
</body>