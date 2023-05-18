<?php

include 'conexao.php';

if (isset($_POST['busca'])){
    $pesquisa = $_POST['busca'];
} else {
    $pesquisa='';
}


$buscar_cadastros = "SELECT * FROM item WHERE patrimonio like'%$pesquisa%'";

$query_cadastros = mysqli_query($conn, $buscar_cadastros);


?>