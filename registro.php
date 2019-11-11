<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="estilos.css" type="text/css" rel="stylesheet">
<script language="JavaScript" type="text/javascript" src="jcrud.js"></script>
</head>

<body>
<?php 

require_once('cont.php');
$link=Conectarse();
$Sql="select * from clientes";
$result=mysql_query($Sql,$link);
$filas = mysql_fetch_array($result);
 $total=mysql_num_rows($result);
?>

<fieldset class="marcof" >
<legend>Registro de clientes
</legend>
<form name="nuevo_empleado" action="" onSubmit="enviarDatos(); return false">
<table width="460" border="0">
  <tr>
    <td width="68">Codigo:</td>
    <td width="376"><input type="text" name="idec" id="idec" class="cajaMedia" value="<?php $total=$total+1; echo"$total"; ?>"></td>
  </tr>
  <tr>
    <td>Nombres:</td>
    <td><input type="text" name="nombres" id="nombres" class="cajaGrande"></td>
  </tr>
  <tr>
    <td>Apellidos</td>
    <td><input type="text" name="apellidos"  id="apellidos" class="cajaGrande"></td>
  </tr>
  <tr>
    <td>Cedula:</td>
    <td><input type="text" name="cedula" id="cedula" class="cajaMedia"></td>
  </tr>
   <tr>
    <td colspan="2"><input type="submit" name="g"   value="Guardar"  > 
   <input type="button" name="gi"   value="Nuevo" onClick="recarga()"  >
   
   <input type="button" name="c"  class="boton" value="Cancelar" onClick="cancelar()"> </td>
   
  </tr>
</table>



<input type="hidden" name="accion"   value="rclientes">

</form>
 <div id="resultado"><?php include('crud.php');?></div>
</fieldset>
</body>
</html>
