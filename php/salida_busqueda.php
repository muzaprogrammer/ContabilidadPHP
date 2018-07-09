<html>
	<head>
		<title>INGUNIXX</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<script src="js/jquery.min.js"></script>
	</head>
	<body>
<?php

include "conexion.php";

$user_id=null;
if(!empty($_POST)){
	if(isset($_POST["inicio"]) &&isset($_POST["fin"])){
$sql1= "SELECT salidas.id, salidas.fecha, salidas.factura, proveedores.nrc, proveedores.nombre, salidas.gravadas_locales, salidas.credito_fiscal, salidas.fovial_cesc_iva, salidas.total FROM salidas INNER JOIN proveedores ON salidas.id_provee=proveedores.id WHERE salidas.fecha between \"$_POST[inicio]\" and \"$_POST[fin]\" AND proveedores.id > \"$_POST[facturas]\" ORDER BY salidas.id asc";
}}
$query = $con->query($sql1);

?>

<?php if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
	<th>CORELATIVO</th>
	<th>FECHA</th>
	<th>FACTURA</th>
	<th>NRC</th>
	<th>NOMBRE</th>
	<th>GRAVADAS LOCALES</th>
	<th>CREDITO FISCAL</th>
	<th>FOVIAL/CESC</th>
	<th>TOTAL</th>
	<th></th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["id"]; ?></td>
	<td><?php echo $r["fecha"]; ?></td>	
	<td><?php echo $r["factura"]; ?></td>
	<td><?php echo $r["nrc"]; ?></td>
	<td><?php echo $r["nombre"]; ?></td>
	<td><?php echo $r["gravadas_locales"]; ?></td>
	<td><?php echo $r["credito_fiscal"]; ?></td>
	<td><?php echo $r["fovial_cesc_iva"]; ?></td>
	<td><?php echo $r["total"]; ?></td>
	<td style="width:150px;">
		<a href="./salida_editar.php?id=<?php echo $r["id"];?>" class="btn btn-sm btn-warning">Editar</a>
		<a href="#" id="del-<?php echo $r["id"];?>" class="btn btn-sm btn-danger">Eliminar</a>
		<script>
		$("#del-"+<?php echo $r["id"];?>).click(function(e){
			e.preventDefault();
			p = confirm("Estas seguro?");
			if(p){
				window.location="./php/salida_eliminar.php?id="+<?php echo $r["id"];?>;

			}

		});
		</script>
	</td>
</tr>		
<?php endwhile;?>
</table>
<TABLE>
	<TR>
		<TD><B>TOTAL GRAVADAS LOCALES</B></TD>
		<TD><B>$
		<?php 
			$sql2="select sum(gravadas_locales) as total1 from salidas WHERE salidas.fecha between \"$_POST[inicio]\" and \"$_POST[fin]\" ";
			$query = $con->query($sql2);
			if($query->num_rows>0):
				while ($r=$query->fetch_array()):
					echo $r["total1"];
				endwhile;
			endif;
		?>		
		</B></TD>
	</TR>
	<TR>
		<TD><B>TOTAL CREDITO FISCAL</B></TD>
		<TD><B>$
		<?php 
			$sql2="select sum(credito_fiscal) as total2 from salidas WHERE salidas.fecha between \"$_POST[inicio]\" and \"$_POST[fin]\" ";
			$query = $con->query($sql2);
			if($query->num_rows>0):
				while ($r=$query->fetch_array()):
					echo $r["total2"];
				endwhile;
			endif;
		?>		
		</B></TD>
	</TR>
	<TR>
		<TD><B>TOTAL FOVIAL/CESC/IVA</B></TD>
		<TD><B>$
		<?php 
			$sql2="select sum(fovial_cesc_iva) as total3 from salidas WHERE salidas.fecha between \"$_POST[inicio]\" and \"$_POST[fin]\" ";
			$query = $con->query($sql2);
			if($query->num_rows>0):
				while ($r=$query->fetch_array()):
					echo $r["total3"];
				endwhile;
			endif;
		?>		
		</B></TD>
	</TR>
	<TR>
		<TD><B>TOTAL</B></TD>
		<TD><B>$
		<?php 
			$sql2="select sum(total) as total4 from salidas WHERE salidas.fecha between \"$_POST[inicio]\" and \"$_POST[fin]\" ";
			$query = $con->query($sql2);
			if($query->num_rows>0):
				while ($r=$query->fetch_array()):
					echo $r["total4"];
				endwhile;
			endif;
		?>		
		</B></TD>
	</TR>
</TABLE>
<BR><BR>
<form class="navbar-form navbar-left" method="post" action="./reportes/salida_pdf.php">
      <input type="hidden" name="inicio" value="<?php echo $_POST["inicio"] ?>">
	  <input type="hidden" name="fin" value="<?php echo $_POST["fin"] ?>">
	  <input type="hidden" name="facturas" value="<?php echo $_POST["facturas"] ?>">
	  
      <button type="submit" class="btn btn-sm btn-warning">GENERAR PDF</button>	  
  </form>
<?php else:?>	
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>
<BR><BR><BR>
</body>
</html>