<?php
    session_start();
  
    $dbHostname="localhost";
    $dbDatabase="dbcaronauffs";
    $dbUsername="root"; 
    $dbPassword="";
    
   	if(isset($_POST["submit"])) {
      $conexao = mysql_connect($dbHostname, $dbUsername, $dbPassword);
      
      if(!$conexao) { 
        die("nao deu, contate o adm.". mysql_error()); 
      }
      
      //selecionar a base de dados
      mysql_select_db($dbDatabase ) or die("nao foi possivel seleciona a base de dados");
        
      //inserir dados de caroneiro - tipo 0
			$nome     = $_POST["nome"];
			$endereco = $_POST["endereco"];
			$tipo     = (int) $_POST["tipo"];
			$email    = $_POST["email"];
			$idade    = (int) $_POST["idade"];
			$sexo     = (int) $_POST["sexo"];
			$telefone = $_POST["telefone"];
			$senha    = $_POST["senha"];
      
      $sql = 'INSERT INTO usuario (nome, endereco, tipo, email, idade, sexo, telefone, senha) VALUES ("'.$nome.'", "'.$endereco.'", "'.$tipo.'", "'.$email.'", "'.$idade.'", "'.$sexo.'", "'.$telefone.'", "'.$senha.'")';
      
      $result = mysql_query($sql, $conexao);

      if (!$result) {
        echo mysql_error();
      } else {
        $_SESSION['message'] = "Usuário cadastrado com sucesso";
        header("location: /gestao-de-projetos/login.php");
      }
        
      mysql_close($conexao);
    }
 ?>