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
			$login    = $_POST["email"];
			$password = $_POST["senha"];
      
      $sql = 'SELECT id FROM usuario WHERE email = "'.$login.'" AND senha = "'.$password.'"'; 
     
      $result = mysql_query($sql, $conexao);
      
      if (!$result) {
        $_SESSION['message'] = "Usuário ou email inválido!";
        $_SESSION['email'] = $login;
        $_SESSION['senha'] = $password;
        header("location: /gestao-de-projetos/login.php");
      } else {
        header("location: /gestao-de-projetos/panel.php");
      }
        
      mysql_close($conexao);
    }
 ?>