<?php
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 
?>
<html>
<head>
<link href="estilos.css" type="text/css" rel="stylesheet">


<script language="JavaScript" type="text/javascript" src="jcrud.js"></script>
</head>

<? include ("conectar.php"); ?>
<body>
<fieldset style="border:1px solid #09F ; width:80%; height:50; color:#039;">
    <legend>Buscar:</legend>
    
<table width="200" border="0">
  <tr>
    <td>&nbsp;</td>
    <td><input type="text" name="buscar" class="cajaGrande"></td>
    <td><input type="submit" name="ab"  value="Buscar"></td>
     <td>&nbsp;</td>  
    </tr>
</table>
    
    
    </fieldset>
    <br>    
  <fieldset style="border:1px solid #09F ; width:80%;">  
    
<table  width='90%' border='0' cellspacing='1' cellpadding='0' >

  
  <?
$suma=0;


	$consulta="SELECT * from clientes order by idcliente asc";
	$rs_tabla = mysql_query($consulta);
	$nrs=mysql_num_rows($rs_tabla);
?>

  <tr class="cabeza">
    <td>id</td>
    <td>nombres</td>
        <td>cedula</td>
    
    
    
     <td colspan="3">crear cuenta</td> 
  </tr>
 
 <?php
for ($i = 0; $i < mysql_num_rows($rs_tabla); $i++) {

$id=mysql_result($rs_tabla,$i,"idcliente");

$nombres=mysql_result($rs_tabla,$i,"nombres");
$apellidos=mysql_result($rs_tabla,$i,"apellidos");

$cedula=mysql_result($rs_tabla,$i,"cedula");




if ($i % 2) { $fondolinea="#f5f5f5"; } else { $fondolinea="#ffffff"; } ?> 
  
 
   <tr bgcolor="<?php echo"$fondolinea"; ?>" class="fila" onMouseOver="this.style.color='#000033';this.style.backgroundColor='#FFFF99';this.style.cursor='hand';" onMouseOut="this.style.color='#000000'; this.style.backgroundColor='<?php echo"$fondolinea"; ?>'"o"];">
   
   
    <td bgcolor=""><?php echo"$id";?></td>
     <td><?php echo"$nombres $apellidos";?></td>
    <td><?php echo"$cedula";?></td>
 
   
    
    <td><center><img src="imagen/v.jpg" width="16" height="16" onClick="creacuenta('<?php $une="$nombres $apellidos"; echo"$une"; ?>','<?php echo"$cedula";?>')" title="CREAR CUENTA PARA EL CLIENTE"></center></td>
    
  </tr>
  
  
  <?php }?>
  
 
  
</table> 
</fieldset>
</body>
</html>
