<?php
    session_start();
  
    $dbHostname = "localhost";
    $dbDatabase = "dbcaronauffs";
    $dbUsername = "root"; 
    $dbPassword = "";
    $email      = $_POST["email"];
    $password   = $_POST["senha"];

   	if(isset($_POST["submit"])) {
      $conexao = mysql_connect($dbHostname, $dbUsername, $dbPassword);
      
      if(!$conexao) { 
        die("nao deu, contate o adm.". mysql_error()); 
      }
      
      //selecionar a base de dados
      mysql_select_db($dbDatabase ) or die("nao foi possivel seleciona a base de dados");
        
      //inserir dados da rota
		
      $sql = 'SELECT id, tipo FROM usuario WHERE email = "'.$email.'" AND senha = "'.$password.'" '; 
     
      $query = mysql_query($sql, $conexao);

      $try = mysql_fetch_assoc($query);

      if (!$try) {
        $_SESSION['message'] = "Usuário ou email inválido!";
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $password;
        header("location: /gestao-de-projetos/login.php");
      } else {
        $_SESSION['user_id']   = $try['id'];
        $_SESSION['user_tipo'] = $try['tipo'];
        header("location: /gestao-de-projetos/panel.php");
      }
        
      mysql_close($conexao);
    }
 ?>