<?php 
require_once('conectar.php');


$accion=@$_POST["accion"];
if (!isset($accion)) { $accion=@$_GET["accion"]; }

 //clave, fechaigreso,nombres,apellidos,cedula,direccion, telefono,edad,sexo,foto, estado

 
$clave=@$_POST["clave"];
$cuenta=@$_POST["ncuenta"];
$monto=@$_POST["monto"];
$tipo=@$_POST["tipo"];
$fecha=@$_POST["fecha"];
$nombres=@$_POST["nombres"];
$apellidos=@$_POST["apellidos"];
$cedula=@$_POST["cedula"];
 
  //$foto=@$_POST["foto"];
  //$estado=@$_POST["estado"];  

$hoy=date("d/m/Y"); 

$estado=1;
$foto="imagen.jpg";


if ($accion=="rclientes") {
	$query_operacion="INSERT INTO clientes(idcliente,nombres,apellidos,cedula) VALUES ('$clave','$nombres','$apellidos','$cedula')";					
	$rs_operacion=mysql_query($query_operacion);
	echo"El cliente ha sido registrado correctamente";

header("location:listac.php"); 
	
	}
	
	if ($accion=="rcuenta") {
	$query_operacion="INSERT INTO cuentas(idcuenta,cliente,ncuenta,montobase,estado) VALUES ('$clave','$cedula','$cuenta','$monto','1')";					
	$rs_operacion=mysql_query($query_operacion);
	echo"La cuenta ha sido registrado correctamente"; 
	
	}
	?>
