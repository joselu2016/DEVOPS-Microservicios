<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="estilos.css" type="text/css" rel="stylesheet">
</head>
<body>
 <fieldset class="marcor"> 
 <legend>RETIROS</legend>
 <form>
 <table width="681" border="0">
  <tr>
    <td width="240">Ingrese numero de cuenta</td>
    <td width="341"><input type="text" name="cuenta" id="cuenta" class="cajaGrande"></td>
  </tr>
  
  <tr>
    <td width="240">Ingrese clave</td>
    <td width="341"><input type="text" name="clave" id="clave" class="cajaGrande"></td>
 
  </tr>
  <tr>
    <td width="240">Ingrese el monto</td>
    <td width="341"><input type="text" name="monto" id="monto" class="cajaGrande"></td>
    </tr><tr>
    <td  colspan="2"><input type="submit" value="Realizar retiro"></td>
  </tr>
   <input type="hidden" name="accion" id="accion"  value="busca"> 
</table>
</form>
<?php
include ("conectar.php");
include ("cont.php");
//generamos ide de la operacion
$ide="op";
$id="";
$link=Conectarse();
$Sqlop="select * from operaciones";
$resultop=mysql_query($Sqlop,$link);
$filasop = mysql_fetch_array($resultop);
 $totalop=mysql_num_rows($resultop);

$totalop=$totalop+1;
$id=$ide.$totalop;
$tipo="Retiro";
//realiamos consulta
$accion=@$_POST["accion"];
if (!isset($accion)) { $accion=@$_GET["accion"]; }
$cuenta=sqlite_escape_string(@$_REQUEST['cuenta']);
$clave=sqlite_escape_string(@$_REQUEST['clave']);
$montoc=sqlite_escape_string(@$_REQUEST['monto']);
$Sql="SELECT clientes.idcliente,clientes.nombres,clientes.apellidos,clientes.cedula, cuentas.ncuenta,cuentas.montobase,cuentas.clave from clientes inner join cuentas on cuentas.cliente=clientes.cedula where cuentas.ncuenta='$cuenta' and cuentas.clave='$clave'";
$result=mysql_query($Sql,$link);
$filas = mysql_fetch_array($result);
 $total=mysql_num_rows($result);$nombres=($filas["nombres"]);
$apellidos=($filas["apellidos"]);
$cedula=($filas["cedula"]);
$cuenta=($filas["ncuenta"]);
$montob=($filas["montobase"]);
$clave=($filas["clave"]);

 if($total<=0){
	 echo"Cuenta o clave son incorrectas intente de nuevo";
	 }else{
//consultamos saldo
$hoy=date("d/m/Y");
//echo"$monto";

if($montoc>=$montob){
echo"Fondos insuficientes";	
	$confirma="no";
	}else{
		$confirma="si";
echo"Transaccion realiada";		
		}
	//// regitramos la operacion
	if($confirma=="si"){
$retiro="UPDATE cuentas SET montobase=montobase-'$montoc' WHERE ncuenta='$cuenta'";					
	$rs_operacion=mysql_query($retiro);	
	
$query_operacion="INSERT INTO operaciones(idoperacion,ncuentaop,tipo,monto,fecha,estado) VALUES ('$id','$cuenta','$tipo','$montoc','$hoy','1')";					
	$rs_operacion=mysql_query($query_operacion);
	}			

		}

 ?>
</body>
</html>
