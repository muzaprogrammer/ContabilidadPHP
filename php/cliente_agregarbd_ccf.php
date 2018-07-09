<?php

if(!empty($_POST)){
	if(isset($_POST["nombre"]) &&isset($_POST["nit"]) &&isset($_POST["nrc"]) &&isset($_POST["giro"]) &&isset($_POST["direccion"])){
		if($_POST["nombre"]!=""){
			include "conexion.php";
			$sql = "INSERT INTO clientes (id_tipo, nombre, nit, nrc, giro, direccion) VALUES (1, \"$_POST[nombre]\", \"$_POST[nit]\", \"$_POST[nrc]\", \"$_POST[giro]\", \"$_POST[direccion]\")";			
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Agregado exitosamente.\");window.location='../cliente_ver.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../cliente_ver.php';</script>";

			}
		}
	}
}
?>