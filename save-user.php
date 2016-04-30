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
			$Nome     = $_POST["nome"];
			$Endereco = $_POST["endereco"];
			$Tipo     = (int) $_POST["tipo"];
			$Email    = $_POST["email"];
			$Idade    = (int) $_POST["idade"];
			$Sexo     = (int) $_POST["sexo"];
			$Telefone = $_POST["telefone"];
			$Senha    = $_POST["senha"];
      
      $sql = 'INSERT INTO usuario (nome, endereco, tipo, email, idade, sexo, telefone, senha) VALUES ("'.$Nome.'", "'.$Endereco.'", "'.$Tipo.'", "'.$Email.'", "'.$Idade.'", "'.$Sexo.'", "'.$Telefone.'", "'.$Senha.'")';
      
      $result = mysql_query($sql, $conexao);
      
      echo $result;
      
      if (!$result) {
        echo mysql_error();
      } else {
        $_SESSION['message'] = "Usuário cadastrado com sucesso";
        header("location: /gestao-de-projetos/panel.php");
      }
        
      mysql_close($conexao);
    }
 ?>