
<?php

if(empty($_REQUEST)) 
    header("Location: index.php");


$server = "ldap://10.10.65.242";
$ID_Usuario = mb_strtolower($_REQUEST['usuario'],'UTF-8');
$user = $_REQUEST['usuario']."@rede.sp";
$psw = $_REQUEST['senha'];
$inicial = $_REQUEST['usuario'];
$permissao = substr($inicial, -6);
$dn = "DC=rede,DC=sp";

$search = "samaccountname=".$_REQUEST['usuario'];  //"samaccountname=".$user; ou userprincipalname //

$ds=ldap_connect($server);
ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3); // Corrige problema com "ç"
$r=ldap_bind($ds, $user , $psw); 
$sr=ldap_search($ds, $dn, $search);
$data = ldap_get_entries($ds, $sr); 

session_start();

require_once 'conexao.php';

$buscar_cadastros = "SELECT permissao, statususer FROM usuarios WHERE `usuario`='".strtolower($inicial)."';";
$query_cadastros = mysqli_query($conn, $buscar_cadastros);

if(mysqli_num_rows($query_cadastros) !=1){
   header("location: erropermissao.php");

   
}else{
   $resultado = mysqli_fetch_assoc($query_cadastros);
}

if($data["count"]==0) {
  unset ($_SESSION['SesID']);
  unset ($_SESSION['SesNome']);
  unset ($_SESSION['SesE-mail']);
  unset ($_SESSION['Perm']);
  unset ($_SESSION['Status']);
  header('location:index.php?m=erro');
  logMsg( "Login usuário ".$inicial , 'error' );
  
}else{
     for ($i=0; $i<$data["count"]; $i++) {
        $nomefr = utf8_encode($data[$i]["givenname"][0]) . " " . utf8_encode($data[$i]["sn"][0]);
        $emailfr = mb_strtolower($data[$i]["mail"][0]);
        }

    $_SESSION['SesID'] = $inicial;
    $_SESSION['SesNome'] = $nomefr;
    $_SESSION['SesE-mail'] = $emailfr;
    $_SESSION['Perm'] =  $resultado['permissao'];
    $_SESSION['Status'] =  $resultado['statususer'];
    header('location:principal.php');
    logMsg( $_SESSION['SesID']." - ".$_SESSION['SesNome'] , 'login' );
 }



?>


