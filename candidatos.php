<?php 
	session_start();

	$dbHostname = "localhost";
    $dbDatabase = "dbcaronauffs";
    $dbUsername = "root"; 
    $dbPassword = "";
    $timezone   = new DateTimeZone('America/Sao_Paulo');
    $agora		= new DateTime(date("Y-m-d"), $timezone);
    $agora		= $agora->format("Y-m-d");

    $conexao = mysql_connect($dbHostname, $dbUsername, $dbPassword);
    
    if(!$conexao) { 
    	die("nao deu, contate o adm.". mysql_error()); 
    }
      
    //selecionar a base de dados
    mysql_select_db($dbDatabase ) or die("nao foi possivel seleciona a base de dados");

    $sql = 'SELECT id, vagas, data, saida, origem, destino
    		FROM carona
    		WHERE motorista = "'.$_SESSION['user_id'].'"
    		ORDER BY id';
    
    $query = mysql_query($sql, $conexao);
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
		<?php if (isset($_SESSION['message']) && !empty($_SESSION['message'])) { ?>
			<p class="notification notification-confirm"><?php echo $_SESSION['message'] ?></p>
		<?php unset($_SESSION['message']); } ?>
		<main>
	   		<div class="container">
				<?php 
				if ($query) {
					while($carona = mysql_fetch_assoc($query)) { ?>
						<div>
							<p class="caronas-title"><?php echo $carona['data'].'  /  '.$carona['saida']; ?></p>
							<?php 
							$sql = 'SELECT u.id AS id, u.nome AS nome 
    								FROM carona AS c 
    								JOIN (vagas AS v JOIN usuario AS u) 
    								WHERE c.id = "'.$carona['id'].'"';
    						$query2 = mysql_query($sql, $conexao);
    						while($users = mysql_fetch_assoc($query2)) { ?>
    							<a class='caronas-table' href='/gestao-de-projetos/perfil.php?id=<?php echo $users['id'];?>'><?php echo $users['nome']; ?></a>
    						<?php }	?>
						</div>
					<?php } 
				} else { ?>
		      		<p>Você não disponibilizou nenhuma carona!</p>	
		      	<?php } ?>
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
    