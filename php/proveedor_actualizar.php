<?php

if(!empty($_POST)){
	if(isset($_POST["nit"]) &&isset($_POST["nrc"]) &&isset($_POST["nombre"]) &&isset($_POST["observacion"])){
		if($_POST["nombre"]!="" && $_POST["nit"]!="" ){

			include "conexion.php";
			$sql = "UPDATE proveedores set nit=\"$_POST[nit]\", nrc=\"$_POST[nrc]\", nombre=\"$_POST[nombre]\", observacion=\"$_POST[observacion]\" where id = ".$_POST["id"];			
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Actualizado exitosamente.\");window.location='../proveedor_ver.php';</script>";
			}else{
				print "<script>alert(\"No se pudo actualizar.\");window.location='../proveedor_ver.php';</script>";

			}
		}
	}
}
?>