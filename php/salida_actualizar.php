<?php

if(!empty($_POST)){
	if(isset($_POST["provee"]) &&isset($_POST["fecha"]) &&isset($_POST["factura"]) &&isset($_POST["gravadas_locales"]) &&isset($_POST["credito_fiscal"]) &&isset($_POST["fovial_cesc_iva"]) &&isset($_POST["total"]) ){
		if($_POST["provee"]!="" && $_POST["fecha"]!="" && $_POST["factura"]!=""&& $_POST["gravadas_locales"]!="" && $_POST["credito_fiscal"]!=""&&$_POST["fovial_cesc_iva"]!="" && $_POST["total"]!=""){
			include "conexion.php";
			
			$sql = "update salidas set id_provee=\"$_POST[provee]\", fecha=\"$_POST[fecha]\", factura=\"$_POST[factura]\", gravadas_locales=\"$_POST[gravadas_locales]\", credito_fiscal=\"$_POST[credito_fiscal]\", fovial_cesc_iva=\"$_POST[fovial_cesc_iva]\", total=\"$_POST[total]\" where id=".$_POST["id"];		
			
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Actualizado exitosamente.\");window.location='../salida_ver.php';</script>";
			}else{
				print "<script>alert(\"No se pudo actualizar.\");window.location='../salida_ver.php';</script>";

			}
		}
	}
}



?>
