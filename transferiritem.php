<?php

session_start();

include 'conexao.php';

$mysqli = new mysqli($host,$user,$password,$db_name) or die(mysqli_error($mysqli));
$mysqli2 = new mysqli($host,$user,$password,$db_name) or die(mysqli_error($mysqli));



if(isset($_POST['salvar'])){

    date_default_timezone_set('America/Sao_Paulo');    
    $iditem = $_POST['id'];
    $patrimonio = $_POST['numpatri'];
    $tipo = $_POST['tipo'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $localanterior = $_POST['local'];
	$localnovo = $_POST['localnovo'];
	$data = date('Y-m-d H:i:s');
    $servidoranterior = $_POST['servidor'];
    $servidoratual =  $_POST['servidornovo'];
    $idusuario = $_POST['login'];
    $usuario = $_POST['resp'];
    $cimbpm = $_POST['cimbpm'];
   
    $mysqli->query("INSERT INTO transferencia (iditem, localanterior, localnovo, datatransf, idusuario, usuario, servidoranterior, servidoratual, cimbpm)
     VALUES('$iditem','$localanterior','$localnovo', '$data', '$idusuario', '$usuario', '$servidoranterior', '$servidoratual', '$cimbpm')") or die ($mysqli->error);

    $mysqli2->query("UPDATE item
    SET localizacao = '$localnovo', servidor = '$servidoratual'
    WHERE iditem = '$iditem'") or die ($mysqli2->error);

    $_SESSION['patrimonio'] = $patrimonio;
    $_SESSION['tipo'] = $tipo;
    $_SESSION['modelo'] = $modelo;
    $_SESSION['marca'] = $marca;

    echo "<a href='listaritem.php'>Voltar</a>";

    echo "<script>window.alert('Movimentado com sucesso!'); document.location.href='pdf.php';</script>";    
    

}




?>