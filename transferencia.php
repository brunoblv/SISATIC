<?php 
if (!isset($_SESSION)) {
     session_start();
    }

if (!isset($_SESSION['SesID'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}

$login = $_SESSION['SesID'];

include 'navbar.php';

require_once 'conexao.php';

$buscar_cadastros = "SELECT permissao FROM usuarios WHERE `usuario`='".strtolower($login)."';";
$query_cadastros = mysqli_query($conn, $buscar_cadastros);

if(mysqli_num_rows($query_cadastros) !=1){
   header("location: erropermissao.php");
   
}else{
   $resultado = mysqli_fetch_assoc($query_cadastros);
}

$buscar_cadastros = "SELECT permissao FROM usuarios WHERE `usuario`='".strtolower($login)."';";
$query_cadastros = mysqli_query($conn, $buscar_cadastros);

while ($row = $query_cadastros->fetch_assoc()) {
    
}

if ($row <>0 and $row <>1 and $row<>2){
    header("location: erropermissao.php");
}



 ?>

<!doctype html>
<html lang="pt-br">
  <head>

<?php include 'head.php';?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



<?php   
    include "conexao.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM item WHERE iditem = '$id'";
    $dados = mysqli_query($conn, $sql);
    $linha = mysqli_fetch_assoc($dados);
    $numpatri = $linha['patrimonio'];
	$numserie = $linha['numserie'];
	$tipo = $linha['tipo'];
    $marca = $linha['marca'];
    $modelo = $linha['modelo'];
    $setor = $linha['localizacao'];
    $servidor = $linha['servidor'];
    $nf = $linha['numprocesso'];
    $nib = $linha['cimbpm'];
    $nomepc =  $linha['nome'];
    $statusitem = $linha['statusitem'];

?>

	<title>Transferência</title>  
  
</head>
<body>

  <div class="container">
  
      <h4 class="mb-3">Movimentação</h4>
      <hr class="mb-4">
      <h5 class="mb-3">Dados do Item</h5>
      <form class="need-validation" no validade method="POST" action="transferiritem.php" autocomplete="off">
        <div class = "row">
        <div class="col-md-6 mb-3">
            <label for="numprocesso" class="form-label">ID:</label>
            <input type="text" class="form-control" id="id" name="id" required="required" value="<?php echo $linha['iditem'] ?>" readonly>
          </div>  
         
          <div class="col-md-6 mb-3">
            <label for="numprocesso" class="form-label">Número do Patrimônio PMSP:</label>
            <input type="text" class="form-control" id="numpatri" name="numpatri" required="required"value="<?php echo $linha['patrimonio'] ?>" readonly>
          </div>
        </div>
          
        <div class = "row"> 
        <div class="col-md-6 mb-3">
            <label for="numprocesso" class="form-label">Tipo:</label>
            <input type="text" class="form-control" id="tipo" name="tipo" required="required" value="<?php echo $linha['tipo'] ?>" readonly>
          </div>
          <div class="col-md-6 mb-3">
            <label for="numprocesso" class="form-label">Modelo:</label>
            <input type="text" class="form-control" id="modelo" name="modelo" required="required" value="<?php echo $linha['modelo'] ?>" readonly>
          </div>    
        </div>          
        <div class = "row"> 
        <div class="col-md-6 mb-3">
            <label for="numprocesso" class="form-label">Número de Série:</label>
            <input type="text" class="form-control" id="numserie" name="numserie" required="required" value="<?php echo $linha['numserie'] ?>" readonly>
          </div>
          <div class="col-md-6 mb-3">
            <label for="numprocesso" class="form-label">Marca:</label>
            <input type="text" class="form-control" id="marca" name="marca" required="required" value="<?php echo $linha['marca'] ?>" readonly>
          </div>
        </div>
        <div class = "row"> 
        <div class="col-md-6 mb-3">
            <label for="local" class="form-label">Localização atual:</label>
            <input type="text" class="form-control" id="local" name="local" required="required" value="<?php echo $linha['localizacao'] ?>" readonly>
          </div>
          <div class="col-md-6 mb-3">
            <label for="numprocesso" class="form-label">Servidor atual:</label>
            <input type="text" class="form-control" id="servidor" name="servidor" required="required" value="<?php echo $linha['servidor'] ?>" readonly>
          </div>
        </div>
        <br>
        <h5 class="mb-3">Dados da Transferência</h5>
        <hr class="mb-4">        
            <div class = "row"> 
                <div class="col-md-6 mb-3">
                    <label for="numprocesso" class="form-label">Nome do Servidor:</label>
                    <input type="text" class="form-control" id="servidornovo" name="servidornovo" required="required">
                </div>
                <div class="col-md-6 mb-3">
                <label for="numprocesso" class="form-label">Localização Nova:</label>
                    <select class="form-select" id="localnovo" required name="localnovo">
                        <option>Selecionar</option>
                        <option>ASCOM</option>
                        <option>ATAJ</option>
                        <option>ATECC</option>
                        <option>ATIC</option>
                        <option>AUDITÓRIO</option>
                        <option>CAF</option>
                        <option>CAF/DGP</option>
                        <option>CAF/DLC</option>
                        <option>CAF/DOF</option>
                        <option>CAF/DSUP</option>
                        <option>CAP</option>
                        <option>CAP/ARTHUR SABOYA</option>
                        <option>CAP/DEPROT</option>
                        <option>CAP/DPCI</option>
                        <option>CAP/DPD</option>
                        <option>CAP/NÚCLEO DE ATENDIMENTO</option>
                        <option>CASE</option>
                        <option>CASE/DCAD</option>
                        <option>CASE/DDU</option>
                        <option>CASE/DLE</option>
                        <option>CASE/STEL</option>
                        <option>CEPEUC</option>
                        <option>CGPATRI</option>
                        <option>COMIN</option>
                        <option>COMIN/DCIGP</option>
                        <option>COMIN/DCIMP</option>
                        <option>CONTRU</option>
                        <option>CONTRU/DACESS</option>
                        <option>CONTRU/DINS</option>
                        <option>CONTRU/DLR</option>
                        <option>CONTRU/DSUS</option>
                        <option>DEUSO</option>
                        <option>GABINETE</option>
                        <option>GEOINFO</option>
                        <option>GTEC</option>
                        <option>ILUME</option>
                        <option>PARHIS</option>
                        <option>PARHIS/DHIS</option>
                        <option>PARHIS/DHMP</option>
                        <option>PARHIS/DPS</option>
                        <option>PLANURB</option>
                        <option>RESID</option>
                        <option>RESID/DRGP</option>
                        <option>RESID/DRPM</option>
                        <option>RESID/DRU</option>
                        <option>SERVIN</option>
                        <option>SERVIN/DSIGP</option>
                        <option>SERVIN/DSIMP</option>
             
                    </select>  
                </div>
         </div> 
         <div class = "row">
         <div class="col-md-6 mb-3">
           <label for="numprocesso" class="form-label">CIMBPM:</label>
          <input type="text" class="form-control" id="cimbpm" name="cimbpm" required="required" ?>
          </div>
         </div>

         <div class = "row"> 
                <div class="col-md-6 mb-3">
                    <label for="numprocesso" class="form-label">Responsável pela Transferência:</label>
                    <input type="text" class="form-control" id="resp" name="resp" required="required" value="<?php echo $_SESSION['SesNome'];?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="numprocesso" class="form-label">Login:</label>
                    <input type="text" class="form-control" id="login" name="login" required="required" value="<?php echo $_SESSION['SesID'];?>" readonly> 
                </div>
        </div>
               
        <button type="submit" class="btn btn-primary" name="salvar">Salvar</button>
                
        </div>
        </form>
    </div>


</body>
</html>


    
