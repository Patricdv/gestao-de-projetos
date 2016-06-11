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
        
      //inserir dados da rota
      $usuario = $_SESSION["user_id"]; 
	    $nome    = $_POST["nome"];
	    $endereco = $_POST["endereco"];
	    $email = $_POST["email"];		
      $idade  = $_POST["idade"];
      $telefone  = $_POST["telefone"];
      $sexo = $_POST["sexo"];
      $id = $_SESSION["user_id"];   

      
      $sql = 'UPDATE usuario 
			  SET nome = "'.$nome.'", endereco = "'.$endereco.'", email = "'.$email.'", idade = "'.$idade.'", telefone = "'.$telefone.'", sexo = "'.$sexo.'"
              WHERE id = "'.$id.'"';
      
      $result = mysql_query($sql, $conexao);
      
      if (!$result) {
        echo mysql_error();
      } else {
        header("location: /gestao-de-projetos/user.php");
      }
        
      mysql_close($conexao);
    }
 ?>
