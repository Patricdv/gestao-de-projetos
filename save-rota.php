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
			$data    = $_POST["data"];
			$horario = $_POST["hora_saida"];
			$destino = $_POST["destino"];		
      $origem  = $_POST["origem"];
      $usuario = 11; 
      $vagas   = $_POST["vagas"];
      
      $sql = 'INSERT INTO carona (caroneiro, vagas, data, saida, origem, destino ) 
                  VALUES ("'.$usuario.'", "'.$vagas.'","'.$data.'", "'.$horario.'", "'.$origem.'", "'.$destino.'")';
      
      $result = mysql_query($sql, $conexao);
      
      if (!$result) {
        echo mysql_error();
      } else {
        header("location: /gestao-de-projetos/panel.php");
      }
        
      mysql_close($conexao);
    }
 ?>