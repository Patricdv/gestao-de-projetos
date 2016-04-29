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
			$Data     = $_POST["nome"];
			$Horario = $_POST["endereco"];
			$Destino     = $_POST["tipo"];		
      
      $sql = 'INSERT INTO carona (Data, HoraSaida, IdDestino) VALUES ("'.$Data.'", "'.$Horario.'", "'.$Destino.'")';
      
      $result = mysql_query($sql, $conexao);
      
      echo $result;
      
      if (!$result) {
        echo mysql_error();
      } else {
        header("location: /gestao-de-projetos/panel.php");
      }
        
      mysql_close($conexao);
    }
 ?>