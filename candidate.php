<?php
  function registraCarona ($carona) {
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

    //inserir dados da vaga
    $usuario = $_SESSION['user_id'];

    $sql = 'INSERT INTO vagas (idCarona, idUsuario) VALUES ("'.$carona.'", "'.$usuario.'")';
    
    $result = mysql_query($sql, $conexao);

    mysql_close($conexao);

    if ($result) {
      $validation['text'] = 'Cadastrado com sucesso!';
      return json_encode($validation);
    }

    $validation['text'] = 'Ocorreu um problema no cadastro, tente novamente mais tarde!';
    return json_encode($validation);
  }

  if (isset($_GET['carona'])) {
    echo registraCarona($_GET['carona']);
  }
?>