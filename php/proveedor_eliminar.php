<?php

if(!empty($_GET)){
			include "conexion.php";
			
			$sql = "DELETE FROM proveedores WHERE id=".$_GET["id"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Eliminado exitosamente.\");window.location='../proveedor_ver.php';</script>";
			}else{
				print "<script>alert(\"No se pudo eliminar.\");window.location='../proveedor_ver.php';</script>";

			}
}

?>