<?php

if(!empty($_POST)){
	if(isset($_POST["nombre"]) &&isset($_POST["nit"]) &&isset($_POST["nrc"]) &&isset($_POST["giro"]) &&isset($_POST["direccion"])){
		if($_POST["nombre"]!="" && $_POST["nit"]!="" &&$_POST["nrc"]!="" &&$_POST["giro"]!="" &&$_POST["direccion"]!=""){
			include "conexion.php";
			
			$sql  = "UPDATE clientes SET id_tipo = 1, nombre = \"$_POST[nombre]\", nit = \"$_POST[nit]\", nrc = \"$_POST[nrc]\", giro = \"$_POST[giro]\", direccion = \"$_POST[direccion]\" WHERE clientes.id_cliente = ".$_POST["id"];			
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Actualizado exitosamente.\");window.location='../cliente_ver.php';</script>";
			}else{
				print "<script>alert(\"No se pudo actualizar.\");window.location='../cliente_ver.php';</script>";

			}
		}
	}
}



?>