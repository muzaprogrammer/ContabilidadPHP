<?php

if(!empty($_POST)){
	if(isset($_POST["provee"]) &&isset($_POST["fecha"]) &&isset($_POST["factura"]) &&isset($_POST["gravadas_locales"]) &&isset($_POST["credito_fiscal"]) &&isset($_POST["fovial_cesc_iva"]) &&isset($_POST["total"]) ){
		if($_POST["provee"]!="" && $_POST["fecha"]!="" && $_POST["factura"]!=""&& $_POST["gravadas_locales"]!="" && $_POST["credito_fiscal"]!="" && $_POST["total"]!=""){
			include "conexion.php";
			
			$sql = "insert into salidas (id_provee, fecha, factura, gravadas_locales, credito_fiscal, fovial_cesc_iva, total) value (\"$_POST[provee]\",\"$_POST[fecha]\",\"$_POST[factura]\",\"$_POST[gravadas_locales]\",\"$_POST[credito_fiscal]\",\"$_POST[fovial_cesc_iva]\",\"$_POST[total]\")";
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Agregado exitosamente.\");window.location='../salida_ver.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../salida_ver.php';</script>";

			}
		}
	}
}



?>
