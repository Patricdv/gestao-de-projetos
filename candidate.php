<?php
    session_start();
  
    $dbHostname="localhost";
    $dbDatabase="dbcaronauffs";
    $dbUsername="root"; 
    $dbPassword="";
    
   	function registraCarona ($idCarona) {
      $conexao = mysql_connect($dbHostname, $dbUsername, $dbPassword);
      
      if(!$conexao) { 
        die("nao deu, contate o adm.". mysql_error()); 
      }
      
      //selecionar a base de dados
      mysql_select_db($dbDatabase ) or die("nao foi possivel seleciona a base de dados");
        
      //inserir dados da rota
      $usuario = $_SESSION["user_id"];
      
      $sql = 'INSERT INTO vagas (idCarona, idUsuario) 
                  VALUES ("'.$idCarona.'", "'.$usuario.'")';
      
      $result = mysql_query($sql, $conexao);
       
      mysql_close($conexao);
    }

    
 ?>

