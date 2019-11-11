<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="estilos.css" type="text/css" rel="stylesheet">
</head>

<body>
 <fieldset class="marcofd"> 
 <legend>CONSULTA DE CUENTA</legend>
 <form>
 <table width="681" border="0">
  <tr>
    <td width="240">Ingrese cedula o cuenta</td>
    <td width="341"><input type="text" name="criterio" id="criterio" class="cajaGrande"></td>
  
    
    <td width="86"><input type="submit" value="Buscar"></td>
  </tr>
   <input type="hidden" name="accion" id="accion"  value="busca"> 
</table>
</form>
 <?php 
include ("cont.php");

$link=Conectarse();
$accion=@$_POST["accion"];
if (!isset($accion)) { $accion=@$_GET["accion"]; }

$criterio=sqlite_escape_string(@$_REQUEST['criterio']);

if ($criterio!="")
      {
	$txt_criterio = addslashes($_GET["criterio"]);
	$criterio = " where clientes.cedula like '%" . $txt_criterio . "%' or clientes.nombres like '%" . $txt_criterio . "%' or clientes.apellidos like '%" . $txt_criterio . "%'  or cuentas.ncuenta like '%" . $txt_criterio . "%' ";
	
}	

$Sql="SELECT clientes.idcliente,clientes.nombres,clientes.apellidos,clientes.cedula, cuentas.ncuenta,cuentas.montobase from clientes inner join cuentas on cuentas.cliente=clientes.cedula $criterio";
$result=mysql_query($Sql,$link);
$filas = mysql_fetch_array($result);
 $total=mysql_num_rows($result);
$nombres=($filas["nombres"]);
$apellidos=($filas["apellidos"]);
$cedula=($filas["cedula"]);
$cuenta=($filas["ncuenta"]);
$monto=($filas["montobase"]);

 ?>
  </fieldset>
 
 <legend>RESULTADOS DE CONSULTA</legend>
 
 <table width="649" border="0">
  <tr>
    <td width="176">Nombres:</td>
    <td width="457"><?php if ($accion=="busca") { echo"$nombres $apellidos"; }?></td>
  </tr>
  <tr>
    <td>Cedula de identidad:</td>
    <td><?php if ($accion=="busca") { echo"$cedula"; }?></td>
  </tr>
  <tr>
    <td>Numero de cuenta:</td>
    <td><?php if ($accion=="busca") {echo"$cuenta";} ?></td>
  </tr>
  <tr>
    <td>Saldo a la fecha:</td>
    <td>$<?php if ($accion=="busca") {echo number_format($monto,2); }
	?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>


</body>
</html>
