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
					
					<form id="form-rota" method="post" action="/gestao-de-projetos/save-rota.php">

						<div class="input-field col s12 m6 l6">
							<input id="origem" name="origem" type="text" class="validate" >
							<label for="origem" class="active">Origem</label>
					    </div>

  						<div class="input-field col s12 m6 l6">
							<input id="destino" name="destino" type="text" class="validate" >
							<label for="destino" class="active">Destino</label>
					    </div>

						<div class="input-field col s12 m6 l6">
							<input id="data" name="data" type="date" class="validate" >
							<label for="data" class="active">Data</label>
					    </div>
				            
				        <div class="input-field col s12 m6 l6">
				            <input id="hora_saida" type="time" name="hora_saida" class="validate">
				            <label for="hora_saida" class="active">Horário Saída</label>
				        </div>        
				        <div class="input-field col s12 m6 l6">
				            <input id="vagas" type="number" name="vagas" class="validate">
				            <label for="vagas" class="active">Vagas</label>
				        </div>                 

				        <div id="align-button">
							<input type="submit" name="submit" id="user-sub" class="fade-input waves-effect waves-light btn">
						</div>
					</form>		

				</div>
			</div>
		</main>

		<?php include 'footer.php';?>
	</div>
	<script type="application/javascript" src="/gestao-de-projetos/js/jquery-2.2.2.min.js"></script>
	<script type="application/javascript" src="/gestao-de-projetos/js/materialize.min.js"></script>
	<script type="application/javascript">
	    $(document).ready(function(){ 	 
		});
  	</script>
</body>
    