<?php

if(!empty($_POST)){
	if(isset($_POST["nit"]) &&isset($_POST["nrc"]) &&isset($_POST["nombre"]) &&isset($_POST["observaciones"])){
		if($_POST["nombre"]!=""){
			include "conexion.php";
			
			$sql = "insert into proveedores (nit, nrc, nombre, observacion) VALUE (\"$_POST[nit]\",\"$_POST[nrc]\",\"$_POST[nombre]\",\"$_POST[observaciones]\")";	
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Agregado exitosamente.\");window.location='../proveedor_ver.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../proveedor_ver.php';</script>";

			}
		}
	}
}



?>