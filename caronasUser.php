<?php 
	session_start();

	$dbHostname = "localhost";
    $dbDatabase = "dbcaronauffs";
    $dbUsername = "root"; 
    $dbPassword = "";
    $timezone   = new DateTimeZone('America/Sao_Paulo');
    $agora		= new DateTime(date("Y-m-d"), $timezone);
    $agora		= $agora->format("Y-m-d");
    $usuario    = $_SESSION['user-id'];

    $conexao = mysql_connect($dbHostname, $dbUsername, $dbPassword);
    
    if(!$conexao) { 
    	die("nao deu, contate o adm.". mysql_error()); 
    }
      
    //selecionar a base de dados
    mysql_select_db($dbDatabase ) or die("nao foi possivel seleciona a base de dados");
    	
    $sql = 'SELECT * FROM carona WHERE caroneiro = "'.$usuario.'" ORDER BY data';
      
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
				if ($query) { ?>
					<table class="highlight">
				    	<thead>
				    		<tr>
				            	<th data-field="caroneiro">Caroneiro</th>
				            	<th data-field="vagas">Vagas</th>
				            	<th data-field="data">Data</th>
				            	<th data-field="saida">Saída</th>
				            	<th data-field="origem">Origem</th>
				            	<th data-field="destino">Destino</th>
				        	</tr>
				        </thead>
				        <tbody>
							<?php while($carona =  mysql_fetch_assoc($query)) { ?>
								<tr>
					           		<td><?php echo $carona['caroneiro'];?></td>
					           		<td><?php echo $carona['vagas'];?></td>
					           		<td><?php echo date('d-m-Y', strtotime($carona['data']));?></td>
					           		<td><?php echo $carona['saida'];?></td>
					           		<td><?php echo $carona['origem'];?></td>
					           		<td><?php echo $carona['destino'];?></td>
					         	</tr>
					        <?php } ?>  
			        	</tbody>
			      	</table>
		      	<?php } else { ?>
		      		<p>Nenhuma carona disponível!</p>	
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
    