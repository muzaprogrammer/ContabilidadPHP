<?php

if(!empty($_GET)){
			include "conexion.php";
			
			$sql = "DELETE FROM clientes WHERE id_cliente =".$_GET["id"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Eliminado exitosamente.\");window.location='../cliente_ver.php';</script>";
			}else{
				print "<script>alert(\"No se pudo eliminar.\");window.location='../cliente_ver.php';</script>";

			}
}

?>