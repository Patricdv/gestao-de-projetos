<?php 
	session_start();

	$dbHostname="localhost";
    $dbDatabase="dbcaronauffs";
    $dbUsername="root"; 
    $dbPassword="";
    
    $conexao = mysql_connect($dbHostname, $dbUsername, $dbPassword);
    
    if(!$conexao) { 
    	die("nao deu, contate o adm.". mysql_error()); 
    }
      
    //selecionar a base de dados
    mysql_select_db($dbDatabase ) or die("nao foi possivel seleciona a base de dados");

    $sql = 'SELECT * FROM carona';
      
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
				<div class="rows">
					<?php 
					while($carona =  mysql_fetch_assoc($query)) {
						echo $carona['origem'];
						echo $carona['destino'];
					}
					?>
				</div>
			</div>
		</main>

		<?php include 'footer.php';?>
	</div>
	<script type="application/javascript" src="/gestao-de-projetos/js/jquery-2.2.2.min.js"></script>
	<script type="application/javascript" src="/gestao-de-projetos/js/materialize.min.js"></script>
</body>
    