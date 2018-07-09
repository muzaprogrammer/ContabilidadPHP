<?php

if(!empty($_POST)){
	if(isset($_POST["nombre"]) &&isset($_POST["direccion"])){
		if($_POST["nombre"]!="" &&$_POST["direccion"]!=""){
			include "conexion.php";
			
			$sql  = "UPDATE clientes SET id_tipo = 2, nombre = \"$_POST[nombre]\", nit = NULL, nrc = NULL, giro = NULL, direccion = \"$_POST[direccion]\" WHERE clientes.id_cliente = ".$_POST["id"];			
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