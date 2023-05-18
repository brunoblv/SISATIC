<?php 
if (!isset($_SESSION)) {
     session_start();
    }

if (!isset($_SESSION['SesID'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}

include 'conexao.php';

 ?>
<!doctype html>
<html lang="pt-br">
  <head>
  <?php include 'head.php';?>


	
  </head>
  <body>
		
  <?php include 'navbar.php';?>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
		<div class="card">
            <div class="card-header">
                Últimas movimentações
            </div>
            <div class="card-body">
            <div class="table-responsive">
         <table class="table table-striped table-hover">
           <thead>
               <tr>
               <th>Nº Patrimônio</th>
               <th>Nome</th>
               <th>Descrição do Bem</th>
               <th>Localização</th>
               <th>Servidor</th>
               <th>Responsável</th>
               <th>CIMBPM:</th>
               <th>Data</th>
               </tr>
           </thead>
           <tbody>
           <?php

// Receber o número da página
$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);                
$pagina = (!empty($pagina_atual)) ? $pagina_atual: 1;

//Setar a quantidade de itens por página
$qnt_result_pg = 10;

//Calcular o início da visualização
$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

$buscar_cadastros = "SELECT item.patrimonio, item.tipo, item.marca, item.modelo, item.nome, transferencia.cimbpm, transferencia.localnovo, transferencia.servidoratual, transferencia.usuario, transferencia.datatransf
FROM item, transferencia
WHERE item.iditem = transferencia.iditem ORDER BY transferencia.datatransf DESC LIMIT $inicio, $qnt_result_pg";
$query_cadastros = mysqli_query($conn, $buscar_cadastros);
//Paginação - Somar a quantidade de processos                   


$result_pg = "SELECT COUNT(id) AS num_result FROM transferencia";                    
$resultado_pg = mysqli_query($conn, $result_pg);
$row_pg = mysqli_fetch_assoc($resultado_pg);
//echo $row_pg['num_result'];
$quantidade_pg = ceil ($row_pg['num_result'] / $qnt_result_pg);

//Limitar a quantidade de Links antes e depois
$max_links = 2;

                while($receber_cadastros = mysqli_fetch_array($query_cadastros)){
                   
                    $patrimonio = $receber_cadastros['patrimonio'];
                    $nome = $receber_cadastros['nome'];
                    $marca = $receber_cadastros['marca'];
                    $tipo = $receber_cadastros['tipo'];
                    $modelo = $receber_cadastros['modelo'];
                    $descricao = $tipo .' ' . $marca . ' Modelo:' . $modelo;
                    $localizacao = $receber_cadastros['localnovo'];
                    $servidor = $receber_cadastros['servidoratual'];
                    $usuario = $receber_cadastros['usuario'];
                    $cimbpm = $receber_cadastros['cimbpm'];
                    $data = $receber_cadastros['datatransf'];
                    
                        

               ?>
               <tr>
                   <td scope ="row"><?php echo $patrimonio ?>
                   <td><?php echo $nome ?></td>
                   <td><?php echo $descricao ?></td>
                   <td><?php echo $localizacao ?></td>
                   <td><?php echo $servidor ?></td>     
                   <td><?php echo $usuario ?></td>    
                   <td><?php echo $cimbpm ?></td>           
                   <td><?php echo $data ?></td> 
                                                        
               </tr>
               <?php }; ?>      
           </tbody>
       </table>
   </div>

                    
<nav aria-label="Page navigation example">
<ul class="pagination">
<li class="page-item"><a class="page-link" href="principal.php?pagina=1">Primeira</a></li>

<?php for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
    if($pag_ant >=1){     
    echo "<li class='page-item'><a class='page-link' href='principal.php?pagina=$pag_ant'>$pag_ant</a></li>";
    }
} ?>

<li class="page-item"><a class='page-link'><?php echo $pagina?></a></li>

<?php for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
    if($pag_dep <= $quantidade_pg) {
    echo "<li class='page-item'><a class='page-link' href='principal.php?pagina=$pag_dep'>$pag_dep</a></li>";
    }

}


echo "<li class='page-item'><a class='page-link' href='principal.php?pagina=$quantidade_pg'>Última</a></li>";

echo '</ul>';
echo '</nav>';



?>
</div>
            </div>
        </div>
	</div>

  
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

	

  </body>
</html>