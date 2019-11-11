<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="estilos.css" type="text/css" rel="stylesheet">
<script language="JavaScript" type="text/javascript" src="jcrud.js"></script>
</head>

<body>
<?php 
$cedula=sqlite_escape_string(@$_REQUEST['cedula']);
$nombres=sqlite_escape_string(@$_REQUEST['nombres']);


require_once('cont.php');
$link=Conectarse();
$Sql="select * from cuentas";
$result=mysql_query($Sql,$link);
$filas = mysql_fetch_array($result);
 $total=mysql_num_rows($result);
?>

<fieldset class="marcof" >
<legend>Registro de cuentas</legend>
<form name="nuevo_empleado" action="" onSubmit="enviarcuentas(); return false">
<table width="593" border="0">
  <tr>
    <td width="311">Codigo:</td>
    <td width="272"><input type="text" name="idec" id="idec" class="cajaMedia" value="<?php $total=$total+1; echo"C$total"; ?>"></td>
  </tr>
  <tr>
  <td>Nombres:</td>
  <td><input type="text" name="n" id="n" class="cajaGrande" value="<?php echo"$nombres";?>"></td>
  </tr>
  <tr>
    <td>ingrese numero de cedula del Cliente:</td>
    <td><input type="text" name="cedula" id="cedula" class="cajaGrande" value="<?php echo"$cedula";?>"></td>
  </tr>
  <tr>
    <td>Monto:</td>
    <td><input type="text" name="monto" id="monto"  class="cajaMedia"></td>
  </tr>
  <tr>
    <td>Numero de cuenta:</td>
    <td><input type="text" name="ncuenta" id="ncuenta" class="cajaGrande"  value="<?php $total=$total+1; echo"NC0$total"; ?>"></td>
  </tr>
  
   <tr>
    <td colspan="2"><input type="submit" name="g"   value="Guardar"  > 
   <input type="button" name="gi"   value="Nuevo" onClick="recarga()"  >
   <input type="button" name="c"  class="boton" value="Cancelar/Volver" onClick="volver()"> </td>
   
  </tr>
</table>



<input type="hidden" name="accion"   value="rcuenta">

</form>
 <div id="resultado"><?php include('crud.php');?></div>
</fieldset>
</body>
</html>
