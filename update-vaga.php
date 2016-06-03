<?php
  function updateVaga($vagas, $carona) {
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

    $vagas--;

    $sql = "UPDATE carona SET vagas = ".$vagas." WHERE id = ".$carona.""; 
    
    $result = mysql_query($sql, $conexao);

    mysql_close($conexao);

    $validation['vagas'] = $vagas;
    $validation['carona'] = $carona;
    return json_encode($validation);
  }

  if (isset($_GET['vagas']) && isset($_GET['carona'])) {
    echo updateVaga($_GET['vagas'], $_GET['carona']);
  }
?>