<?php
if (!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION['SesID'])) {
  session_destroy();
  header("Location: login.php");
  exit;
}

include 'navbar.php';

$login = $_SESSION['SesID'];
$permissao = $_SESSION['Perm'];
$status = $_SESSION['Status'];

if ($permissao == 2) {
  header("location: erropermissao.php");
}


//if ($row ==3){   

//  header("location: erropermissao.php");
//}

?>
<!doctype html>
<html lang="pt-br">

<head>
  <?php include 'head.php'; ?>

</head>

<body>

  <!-- Page Content  -->

  <div id="content" class="p-4 p-md-5 pt-5">
    <h4 class="mb-3">Cadastro de bens</h4>
    <hr class="mb-4">
    <form class="need-validation" no validade method="POST" action="cadastraitem.php" autocomplete="off">
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="numpatri" class="form-label">Número do Patrimônio PMSP:</label>
          <input type="text" class="form-control" id="numpatri" name="numpatri" required="required">
        </div>
        <div class="col-md-6 mb-3">
          <label for="tipo" class="form-label">Tipo:</label>
          <select class="form-select" id="tipo" required name="tipo">
            <option>Computador</option>
            <option>Monitor</option>
            <option>Plotter</option>
            <option>Switch</option>
            <option>Workstation</option>
            <option>Outros</option>
          </select>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="marca" class="form-label">Marca:</label>
          <input type="text" class="form-control" id="marca" name="marca" required="required">
        </div>
        <div class="col-md-6 mb-3">
          <label for="modelo" class="form-label">Modelo:</label>
          <input type="text" class="form-control" id="modelo" name="modelo" required="required">
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="numserie" class="form-label">Número de Série:</label>
          <input type="text" class="form-control" id="numserie" name="numserie" required="required">
        </div>
        <div class="col-md-6 mb-3">
          <label for="localnovo" class="form-label">Localização:</label>
          <select class="form-select" id="local" required name="local">
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
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="numprocesso" class="form-label">Nome do Servidor:</label>
          <input type="text" class="form-control" id="servidor" name="servidor" required="required">
        </div>        
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="numprocesso" class="form-label">Num. Processo:</label>
          <input type="text" class="form-control" id="numprocesso" name="numprocesso" required="required">
        </div>
        <div class="col-md-6 mb-3">
          <label for="numprocesso" class="form-label">Nome do computador:</label>
          <input type="text" class="form-control" id="nomepc" name="nomepc">
        </div>
      </div>
      <div class="row"> 
        <div class="col-md-6 mb-3">
          <label for="numprocesso" class="form-label">Status:</label>
          <select class="form-select" id="statusitem" required name="statusitem">
            <option>Ativo</option>
            <option>Baixado</option>
            <option>Para Doação</option>
            <option>Para Descarte</option>
            <option>Doado</option>
            <option>Descartado</option>

          </select>
        </div>



      </div>
      <button type="submit" class="btn btn-primary" name="salvar">Salvar</button>

  </div>
  </form>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>



</body>

</html>