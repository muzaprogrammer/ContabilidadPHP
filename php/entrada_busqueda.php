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
	if(isset($_POST["inicio"]) &&isset($_POST["fin"]) &&isset($_POST["facturas"])){
$sql1= "SELECT entradas.id, entradas.fecha, entradas.factura, clientes.nrc, clientes.nombre, entradas.gravadas_locales, entradas.credito_fiscal, entradas.total FROM entradas INNER JOIN clientes ON entradas.id_cliente=clientes.id_cliente WHERE entradas.fecha between \"$_POST[inicio]\" and \"$_POST[fin]\" AND clientes.id_tipo < \"$_POST[facturas]\" ORDER BY entradas.id asc";
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
	<th>DEBITO FISCAL</th>	
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
	<td><?php echo $r["total"]; ?></td>
	<td style="width:150px;">
		<a href="./entrada_editar.php?id=<?php echo $r["id"];?>" class="btn btn-sm btn-warning">Editar</a>
		<a href="#" id="del-<?php echo $r["id"];?>" class="btn btn-sm btn-danger">Eliminar</a>
		<script>
		$("#del-"+<?php echo $r["id"];?>).click(function(e){
			e.preventDefault();
			p = confirm("Estas seguro?");
			if(p){
				window.location="./php/entrada_eliminar.php?id="+<?php echo $r["id"];?>;

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
			$sql2="select sum(gravadas_locales) as total1 FROM entradas INNER JOIN clientes ON entradas.id_cliente=clientes.id_cliente WHERE entradas.fecha between \"$_POST[inicio]\" and \"$_POST[fin]\" AND clientes.id_tipo < \"$_POST[facturas]\" ORDER BY entradas.id asc";
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
		<TD><B>TOTAL DEBITO FISCAL</B></TD>
		<TD><B>$
		<?php 
			$sql2="select sum(credito_fiscal) as total2 FROM entradas INNER JOIN clientes ON entradas.id_cliente=clientes.id_cliente WHERE entradas.fecha between \"$_POST[inicio]\" and \"$_POST[fin]\" AND clientes.id_tipo < \"$_POST[facturas]\" ORDER BY entradas.id asc";
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
		<TD><B>TOTAL</B></TD>
		<TD><B>$
		<?php 
			$sql2="select sum(total) as total4 FROM entradas INNER JOIN clientes ON entradas.id_cliente=clientes.id_cliente WHERE entradas.fecha between \"$_POST[inicio]\" and \"$_POST[fin]\" AND clientes.id_tipo < \"$_POST[facturas]\" ORDER BY entradas.id asc";
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
<form class="navbar-form navbar-left" method="post" action="./reportes/entrada_pdf.php">
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