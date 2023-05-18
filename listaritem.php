<?php


if (!isset($_SESSION)) {
     session_start();
    }

if (!isset($_SESSION['SesID'])) {
    session_destroy();
    header("Location: home.php");
    exit;
}

$login = $_SESSION['SesID'];

require_once 'conexao.php';

$buscar_cadastros = "SELECT permissao FROM usuarios WHERE `usuario`='".strtolower($login)."';";
$query_cadastros = mysqli_query($conn, $buscar_cadastros);

if(mysqli_num_rows($query_cadastros) !=1){
   header("location: erropermissao.php");

   
}else{
   $resultado = mysqli_fetch_assoc($query_cadastros);
}
include 'conexao.php';

?>

<!doctype html>
<html lang="pt-br">
  <head>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

</style>
  <?php include 'head.php';?>
  
    <title>Consulta de itens</title>

</head>

<?php include "navbar.php";?>


<body>

<div id="content" class="p-4 p-md-5 pt-5">
    <div class="container-fluid">
        <input class="form-control" type="search" placeholder="Pesquisar" name="pesquisar" id="pesquisar">
        <button class="btn btn-outline-success" onclick="searchData()" type="submit">Pesquisar</button>
    </div>
    <div class="table-responsive">
         <table class="table table-striped table-hover">
           <thead>
               <tr>
               <th>Nº Patrimônio</th>
               <th>Nome</th>
               <th>Marca</th>
               <th>Tipo</th>
               <th>Desc. SBPM</th>
               <th>Modelo</th>
               <th>Núm. de Série</th>
               <th>Localização</th>
               <th>Servidor</th>
               <th>Num. Processo</th>
               <th>CIMBPM</th>
               <th>Status</th>
               <th>Ações</th>
               </tr>
           </thead>
           <tbody>
           <?php

// Receber o número da página
$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);                
$pagina = (!empty($pagina_atual)) ? $pagina_atual: 1;

//Setar a quantidade de itens por página
$qnt_result_pg = 25;

//Calcular o início da visualização
$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $buscar_cadastros = "SELECT * FROM item WHERE patrimonio LIKE '%$data%' or nome LIKE '%$data%' or modelo LIKE '%$data%' or tipo LIKE '%$data%' ORDER BY iditem DESC";
    }
    else
    {
        $buscar_cadastros = "SELECT * FROM item ORDER BY iditem LIMIT $inicio, $qnt_result_pg";
    }    

$query_cadastros = mysqli_query($conn, $buscar_cadastros);
//Paginação - Somar a quantidade de processos                   


$result_pg = "SELECT COUNT(iditem) AS num_result FROM item";                    
$resultado_pg = mysqli_query($conn, $result_pg);
$row_pg = mysqli_fetch_assoc($resultado_pg);
//echo $row_pg['num_result'];
$quantidade_pg = ceil ($row_pg['num_result'] / $qnt_result_pg);

//Limitar a quantidade de Links antes e depois
$max_links = 2;

                while($receber_cadastros = mysqli_fetch_array($query_cadastros)){
                    $id = $receber_cadastros['iditem'];
                    $localizacao = $receber_cadastros['localizacao'];
                    $marca = $receber_cadastros['marca'];
                    $modelo = $receber_cadastros['modelo'];
                    $numprocesso = $receber_cadastros['numprocesso'];
                    $descsbpm = $receber_cadastros['descsbpm'];
                    $cimbpm = $receber_cadastros['cimbpm'];
                    $numserie = $receber_cadastros['numserie'];
                    $patrimonio = $receber_cadastros['patrimonio'];
                    $servidor = $receber_cadastros['servidor'];
                    $tipo = $receber_cadastros['tipo'];
                    $nome = $receber_cadastros['nome'];
                    $statusitem = $receber_cadastros['statusitem'];
                        

               ?>
               <tr>
                   <td scope ="row"><?php echo $patrimonio ?></td>
                   <td><?php echo $nome ?></td>
                   <td><?php echo $marca ?></td>
                   <td><?php echo $tipo ?></td>
                   <td><?php echo $descsbpm ?></td>
                   <td><?php echo $modelo ?></td>
                   <td><?php echo $numserie ?></td>
                   <td><?php echo $localizacao ?></td>
                   <td><?php echo $servidor ?></td>
                   <td><?php echo $numprocesso ?></td>
                   <td><?php echo $cimbpm ?></td>
                   <td><?php echo $statusitem ?></td>
                   <td>
                            <a href="transferencia.php?id=<?php echo $id;?>" class="view" title="Transferir" data-toggle="tooltip"><i class="material-icons">&#xe5c8;</i></a>
                            <a href="alteraitem.php?id=<?php echo $id;?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                           
                   </td>

                  
                   
                   
               </tr>
               <?php }; ?>      
           </tbody>
       </table>
   </div>

                    
<nav aria-label="Page navigation example">
<ul class="pagination">
<li class="page-item"><a class="page-link" href="listaritem.php?pagina=1">Primeira</a></li>

<?php for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
    if($pag_ant >=1){     
    echo "<li class='page-item'><a class='page-link' href='listaritem.php?pagina=$pag_ant'>$pag_ant</a></li>";
    }
} ?>

<li class="page-item"><a class='page-link'><?php echo $pagina?></a></li>

<?php for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
    if($pag_dep <= $quantidade_pg) {
    echo "<li class='page-item'><a class='page-link' href='listaritem.php?pagina=$pag_dep'>$pag_dep</a></li>";
    }

}


echo "<li class='page-item'><a class='page-link' href='listaritem.php?pagina=$quantidade_pg'>Última</a></li>";

echo '</ul>';
echo '</nav>';



?>
</div>
 


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
      var search = document.getElementById('pesquisar');

      search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

      function searchData()
      {
          window.location = 'listaritem.php?search='+search.value;
      }
  </script>
  </body>
</html>