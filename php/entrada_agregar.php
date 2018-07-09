<?php

if(!empty($_POST)){
	if(isset($_POST["provee"]) &&isset($_POST["fecha"]) &&isset($_POST["factura"]) &&isset($_POST["gravadas_locales"]) &&isset($_POST["total"]) ){
		if($_POST["provee"]!="" && $_POST["fecha"]!="" && $_POST["factura"]!=""&& $_POST["gravadas_locales"]!="" && $_POST["total"]!=""){
			include "conexion.php";
			
			$sql = "insert into entradas (id_cliente, fecha, factura, gravadas_locales, credito_fiscal, total) value (\"$_POST[provee]\",\"$_POST[fecha]\",\"$_POST[factura]\",\"$_POST[gravadas_locales]\",\"$_POST[credito_fiscal]\",\"$_POST[total]\")";
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Agregado exitosamente.\");window.location='../entrada_ver.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../entrada_ver.php';</script>";

			}
		}
	}
}



?>
