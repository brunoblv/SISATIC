<?php

include 'conexao.php';

$mysqli = new mysqli($host,$user,$password,$db_name) or die(mysqli_error($mysqli));

if(isset($_POST['salvar'])) {	
	$numpatri = mysqli_real_escape_string($mysqli, $_POST['numpatri']);
	$numserie = mysqli_real_escape_string($mysqli, $_POST['numserie']);   
	$tipo = mysqli_real_escape_string($mysqli, $_POST['tipo']);
    $marca = mysqli_real_escape_string($mysqli, $_POST['marca']);
    $modelo = mysqli_real_escape_string($mysqli, $_POST['modelo']);
    $setor = mysqli_real_escape_string($mysqli, $_POST['local']);
    $servidor = mysqli_real_escape_string($mysqli, $_POST['servidor']);
    $numprocesso = mysqli_real_escape_string($mysqli, $_POST['numprocesso']);    
    $nomepc =  mysqli_real_escape_string($mysqli, $_POST['nomepc']);
    $statusitem = mysqli_real_escape_string($mysqli, $_POST['statusitem']);

    $mysqli->query("INSERT INTO item (patrimonio, numserie, tipo, marca, modelo, localizacao, servidor, numprocesso,
     nome, statusitem) VALUES('$numpatri','$numserie','$tipo', '$marca',
     '$modelo', '$setor', '$servidor', '$numprocesso','$nomepc','$statusitem')") or die ($mysqli->error);
    
    echo "<script>window.alert('Cadastrado com Sucesso'); document.location.href='principal.php'</script>";
 }
?>

