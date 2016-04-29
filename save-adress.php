<?php
    $dbHostname="localhost";
    $dbDatabase="dbcaronauffs";
    $dbUsername="root"; 
    $dbPassoword="";
   	if(isset($_POST["submit"])){
        $conexao=mysql_connect($dbHostname, $dbUsername, $dbPassoword);
        if($conexao){
        }else{
            die("nao deu, contate o adm.". mysql_error());
        }
        //selecionar a base de dados
        mysql_select_db($dbDatabase )
            or die("nao foi possivel seleciona a base de dados");
        //inserir dados de caroneiro - tipo 0
			$Endereco=$_POST["endereco"];
        $sql = "INSERT INTO 'destino' values('', '$Endereco')";

        $reult=mysql_query($sql, $conexao);
        if(!$reult){
            echo "<br>falha ao inserir";
        }else{
        	header("location: panel.php");
        }
        mysql_close($conexao);
    }
   
?>  