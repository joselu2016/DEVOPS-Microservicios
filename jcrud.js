function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
 
	try {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} catch (E) {
		xmlhttp = false;
	}
}
 
if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
	  xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}
	 
//Función para recoger los datos del formulario y enviarlos por post  
function enviarDatos(){
//div donde se mostrará lo resultados
divResultado = document.getElementById('resultado');
//recogemos los valores de los inputs
accion=document.nuevo_empleado.accion.value;
clave=document.nuevo_empleado.idec.value;
//fechaigreso=document.nuevo_empleado.fechaigreso.value;
nombres=document.nuevo_empleado.nombres.value;
apellidos=document.nuevo_empleado.apellidos.value;
cedula=document.nuevo_empleado.cedula.value;
//instanciamos el objetoAjax
ajax=objetoAjax();
//uso del medotod POST
//archivo que realizará la operacion
//registro.php
 ajax.open("POST", "crud.php",true);
//cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
ajax.onreadystatechange=function() {
//la función responseText tiene todos los datos pedidos al servidor
if (ajax.readyState==4) {
//mostrar resultados en esta capa
divResultado.innerHTML = ajax.responseText
//llamar a funcion para limpiar los inputs
//LimpiarCampos();
	}
 }
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
	//ajax.send("nombre="+nom+"&apellido="+ape+"&web="+web)
	ajax.send("clave="+clave+"&nombres="+nombres+"&apellidos="+apellidos+"&cedula="+cedula+"&accion="+accion) 
}
 
 ///REGISTRAR LAS CUENTAS
 
function enviarcuentas(){
 
divResultado = document.getElementById('resultado'); 
 accion=document.nuevo_empleado.accion.value;  
clave=document.nuevo_empleado.idec.value;  
cedula=document.nuevo_empleado.cedula.value;
 monto=document.nuevo_empleado.monto.value;
ncuenta=document.nuevo_empleado.ncuenta.value;
ajax=objetoAjax();
ajax.open("POST", "crud.php",true);
ajax.onreadystatechange=function() {
if (ajax.readyState==4) {
divResultado.innerHTML = ajax.responseText
}
 }
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("clave="+clave+"&ncuenta="+ncuenta+"&cedula="+cedula+"&monto="+monto+"&accion="+accion) 
}
///LIMPIAR LOS CAMPOS DE TEXTO
function LimpiarCampos(){
window.location.reload();

}
///CANCELAR
function recarga(){
window.location.reload();	
 }
	 
function cancelar(){
location.href="fondo.php",target="frame_rejilla";	
}
	 
function volver(){
location.href="listac.php",target="frame_rejilla";	
}
	 
function creacuenta(une,cedula){
location.href="registrocuentas.php?nombres="+une+"&cedula="+cedula,target="frame_rejilla";	
	
	 }
	
