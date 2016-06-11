
<?php 
	session_start();

	$dbHostname = "localhost";
    $dbDatabase = "dbcaronauffs";
    $dbUsername = "root"; 
    $dbPassword = "";

    $conexao = mysql_connect($dbHostname, $dbUsername, $dbPassword);
    
    if(!$conexao) { 
    	die("nao deu, contate o adm.". mysql_error()); 
    }
      
    //selecionar a base de dados
    mysql_select_db($dbDatabase ) or die("nao foi possivel seleciona a base de dados");

    $user_id = $_SESSION['user_id'];
    $user_other = 0;

    if(isset($_GET['id'])) {
    	$user_id = $_GET['id'];
    	$user_other++;
    }

    $sql = 'SELECT nome, endereco, email, idade, sexo, telefone FROM usuario WHERE id = "'.$user_id.'"';
      
    $query = mysql_query($sql, $conexao);
    $user = mysql_fetch_assoc($query);
?>	
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
					<form id="form-perfil" method="post" action="/gestao-de-projetos/save-perfil.php">
						<div class="input-field col s12 m6 l6">
							<input id="nome" name="nome" type="text" class="validate" value="<?php echo $user['nome']; ?>" <?php echo ($user_other == 1) ? 'readonly' : ''; ?>>
							<label for="nome" class="active">Nome</label>
					    </div>

  						<div class="input-field col s12 m6 l6">
							<input id="endereco" name="endereco" type="text" class="validate" value="<?php echo $user['endereco']; ?>" <?php echo ($user_other == 1) ? 'readonly' : ''; ?>>
							<label for="endereco" class="active">Endereço</label>
					    </div>

						<div class="input-field col s12 m6 l6">
							<input id="email" name="email" type="text" class="validate" value="<?php echo $user['email']; ?>" <?php echo ($user_other == 1) ? 'readonly' : ''; ?>>
							<label for="email" class="active">Email</label>
					    </div>
				            
				        <div class="input-field col s12 m6 l6">
				            <input id="idade" type="text" name="idade" class="validate" value="<?php echo $user['idade']; ?>" <?php echo ($user_other == 1) ? 'readonly' : ''; ?>>
				            <label for="idade" class="active">Idade</label>
				        </div>
				         <div class="input-field col s12 m6 l6">
				            <input id="telefone" type="text" name="telefone" class="validate"  value="<?php echo $user['telefone']; ?>" <?php echo ($user_other == 1) ? 'readonly' : ''; ?>>
				            <label for="telefone" class="active">Telefone</label>
				        </div>                  
				      	<div class="gender-space">
			              <p class="fade-input">Gênero:</p>
			              <p class="fade-input input-field col s6 m6 l6">
			                <input type="radio" name="sexo" id="masc" value="0" <?php echo ($user['sexo'] == 0) ? 'checked' : ''; ?> <?php echo ($user_other == 1) ? 'readonly' : ''; ?>>
			                <label for="masc">Masc.</label>
			              </p>

			              <p class="fade-input input-field col s6 m6 l6">
			                 <input type="radio" name="sexo" id="fem" value="1" <?php echo ($user['sexo'] == 1) ? 'checked' : ''; ?> <?php echo ($user_other == 1) ? 'readonly' : ''; ?>>
			                 <label for="fem">Fem.</label>
			              </p>
			            </div>

			           	<div id="align-button">
							<input type="submit" name="submit" id="form-submit" class="fade-input waves-effect waves-light btn">
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
			$('#nome').change(function() {
				$('#form-submit').fadeIn();
			});

			$('#endereco').change(function() {
				$('#form-submit').fadeIn();
			});

			$('#email').change(function() {
				$('#form-submit').fadeIn();
			});

			$('#idade').change(function() {
				$('#form-submit').fadeIn();
			});

			$('#telefone').change(function() {
				$('#form-submit').fadeIn();
			});

			$('#masc').change(function() {
				$('#form-submit').fadeIn();
			});

			$('#fem').change(function() {
				$('#form-submit').fadeIn();
			});
		});
  	</script>
</body>
    
