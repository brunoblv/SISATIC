<?php
session_start();

require __DIR__."/vendor/autoload.php";

use Dompdf\Adapter\CPDF;
use Dompdf\Dompdf;
use Dompdf\Exception;
use Dompdf\Options;

$dompdf = new Dompdf(['enable_remote'=> true]);

$img = '

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=Generator content="Microsoft Word 15 (filtered)">
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:10.0pt;
	margin-left:0cm;
	line-height:115%;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;}
p.MsoHeader, li.MsoHeader, div.MsoHeader
	{mso-style-link:"Cabeçalho Char";
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:10.0pt;
	margin-left:0cm;
	text-align:justify;
	line-height:115%;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;}
span.Textodocorpo
	{mso-style-name:"Texto do corpo_";
	mso-style-link:"Texto do corpo";
	font-family:"Calibri",sans-serif;
	background:white;
	font-weight:bold;}
p.Textodocorpo0, li.Textodocorpo0, div.Textodocorpo0
	{mso-style-name:"Texto do corpo";
	mso-style-link:"Texto do corpo_";
	margin-top:66.0pt;
	margin-right:0cm;
	margin-bottom:24.0pt;
	margin-left:0cm;
	text-align:justify;
	text-indent:35.0pt;
	line-height:12.8pt;
	background:white;
	font-size:10.5pt;
	font-family:"Calibri",sans-serif;
	}
span.CabealhoChar
	{mso-style-name:"Cabeçalho Char";
	mso-style-link:Cabeçalho;
	font-family:"Calibri",sans-serif;}
.MsoChpDefault
	{font-family:"Calibri",sans-serif;}
.MsoPapDefault
	{margin-bottom:10.0pt;
	line-height:115%;}
 /* Page Definitions */
 @page WordSection1
	{size:595.3pt 841.9pt;
	margin:62.35pt 3.0cm 62.35pt 3.0cm;}
div.WordSection1
	{page:WordSection1;}
-->
</style>

</head>

<body lang=PT-BR style="word-wrap:break-word">

<div class=WordSection1>

<p class=MsoHeader align=center style="margin-bottom:6.0pt;text-align:center"><span
style="font-size:14.0pt;line-height:115%">PREFEITURA DO MUNICÍPIO DE SÃO PAULO</span></p>

<p class=MsoHeader align=center style="margin-bottom:6.0pt;text-align:center"><span
style="font-size:14.0pt;line-height:115%">SECRETARIA MUNICIPAL DE URBANISMO E LICENCIAMENTO</span></p>

<p class=MsoHeader style="margin-bottom:6.0pt"><span style="font-size:5.0pt;
line-height:115%">&nbsp;</span></p>

<p class=MsoHeader align=center style="margin-bottom:0cm;text-align:center;
line-height:normal"><span style="font-size:5.0pt">&nbsp;</span></p>

<p class=MsoNormal align=center style="margin-bottom:0cm;text-align:center;
line-height:normal"><a name=bookmark0><b><span style="font-size:12.0pt;
color:black">TERMO DE ENTREGA/ RETIRADA</span></b></a></p>

<p class=MsoNormal align=center style="margin-bottom:0cm;text-align:center;
line-height:normal"><b><span style="font-size:7.0pt;color:black">&nbsp;</span></b></p>

<p class=MsoNormal align=center style="margin-bottom:0cm;text-align:center;
line-height:normal"><b><span style="font-size:8.0pt;color:black">&nbsp;</span></b></p>

<p class=Textodocorpo0 style="margin-top:0cm;margin-right:18.0pt;margin-bottom:
0cm;margin-left:2.0pt;line-height:normal;background:transparent"><span
style="font-size:12.0pt;font-family:"Calibri",sans-serif;color:black;
font-weight:normal">Recebi nesta data o Bem Patrimonial descrito no presente
termo de responsabilidade e recebimento, cuja movimentaçãoo, transferência/ aceite
será registrado no Sistema de Bens Patrimoniais - SBPM via processo SEI, nos
termos da legislação que rege a matéria.</span></p>

<p class=MsoNormal><span style="font-size:8.0pt;line-height:115%">&nbsp;</span></p>

<div align=center>

<table align=center class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 width=570
 style="width:427.25pt;border-collapse:collapse;border:none">
 <tr style="height:66.75pt">
  <td width=200 style="width:149.9pt;border:solid windowtext 1.0pt;background:
  white;padding:0cm 3.5pt 0cm 3.5pt;height:66.75pt">
  <p class=MsoNormal align=center style="margin-bottom:0cm;text-align:center;
  line-height:normal"><i><span style="font-size:12.0pt;color:black">NÚMERO DE PATRIMÔNIO</span></i></p>
  </td>
  <td width=370 style="width:277.35pt;border:solid windowtext 1.0pt;border-left:
  none;background:white;padding:0cm 3.5pt 0cm 3.5pt;height:66.75pt">
  <p class=MsoNormal align=center style="margin-bottom:0cm;text-align:center;
  line-height:normal"><i><span style="font-size:12.0pt;color:black">DISCRIMINAÇÃO
  BEM</span></i></p>
  </td>
 </tr>
 <tr style="height:39.6pt">
  <td width=200 style="width:149.9pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0cm 3.5pt 0cm 3.5pt;height:39.6pt">
  <p class=MsoNormal align=center style="margin-bottom:0cm;text-align:center;
  line-height:normal"><span style="font-size:12.0pt;color:black">';
  
  $html2 = $_SESSION['patrimonio'];

  $html3 = '</span></p>
  </td>
  <td width=370 style="width:277.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 3.5pt 0cm 3.5pt;height:39.6pt">
  <p class=MsoNormal align=center style="margin-bottom:0cm;text-align:center;
  line-height:normal"><span style="font-family:"Calibri",sans-serif;color:#18345A;
  text-transform:uppercase;background:#F7F8FA">&nbsp;</span><span
  style="font-size:12.0pt;color:black">';

  $html4 = $_SESSION['tipo'] .' '. $_SESSION['marca'] .' '. $_SESSION['modelo'];
  
  $html5 = '</span></p>
  </td>
 </tr>
</table>

</div>

<p class=MsoNormal><span style="font-size:12.0pt;line-height:115%">&nbsp;</span></p>
<p class=MsoNormal><span style="font-size:12.0pt;line-height:115%">&nbsp;</span></p>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 align=left
 width=565 style="width:423.85pt;border-collapse:collapse;margin-left:4.8pt;
 margin-right:4.8pt">
 <tr style="page-break-inside:avoid;height:96.0pt">
  <td width=565 valign=top style="width:423.85pt;padding:0cm 5.65pt 0cm 5.65pt;
  height:96.0pt">
  <p class=MsoNormal align=center style="text-align:center;line-height:normal"><span
  style="font-size:4.0pt">&nbsp;</span></p>
  <p class=MsoNormal style="line-height:normal">RECEBIDO EM:
  _______/_______/_______</p>
  <p class=MsoNormal style="line-height:normal">NOME:
  _____________________________________________________</p>
  <p class=MsoNormal style="line-height:normal">RF: ________________________</p>
  <p class=MsoNormal style="line-height:normal">SECRETARIA/ SETOR:
  _________________________________________ </p>
  <p class=MsoNormal align=center style="text-align:center;line-height:normal"><span
  style="font-size:4.0pt">&nbsp;</span></p>
  <p class=MsoNormal align=center style="text-align:center;line-height:normal">__________________________________________</p>
  <p class=MsoNormal align=center style="text-align:center;line-height:normal"><span
  style="font-size:8.0pt">CARIMBO OU RF E ASSINATURA</span></p>
  </td>
 </tr>
</table>

<p class=MsoNormal><span style="font-size:12.0pt;line-height:115%">&nbsp;</span></p>

</div>

</body>

</html>';
$htmltotal = $img . $html1 . $html2 . $html3 . $html4 . $html5;

$pdfOptions = new Options();
$pdfOptions->set('defaultFont', 'Calibri');

$dompdf->loadHtml($htmltotal);
$dompdf->setOptions($pdfOptions);
$dompdf->Setpaper("A4", "portrait");
$dompdf->render();
ob_end_clean();
$dompdf->stream("Termo_de_entrega.pdf");



?>

