<?php

include "conexion.php";

$user_id=null;
$sql1= "select * from proveedores where id like '%$_GET[s]%' or nit like '%$_GET[s]%' or nrc like '%$_GET[s]%' or nombre like '%$_GET[s]%' or observacion like '%$_GET[s]%' ";
$query = $con->query($sql1);
?>

<?php if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>	
	<th>#</th>
	<th>NIT</th>
	<th>NRC</th>
	<th>NOMBRE</th>	
	<th>OBSERVACION</th>	
	<th></th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["id"]; ?></td>
	<td><?php echo $r["nit"]; ?></td>
	<td><?php echo $r["nrc"]; ?></td>
	<td><?php echo $r["nombre"]; ?></td>	
	<td><?php echo $r["observacion"]; ?></td>	
	<td style="width:150px;">
		<a href="./proveedor_editar.php?id=<?php echo $r["id"];?>" class="btn btn-sm btn-warning">Editar</a>
		<a href="#" id="del-<?php echo $r["id"];?>" class="btn btn-sm btn-danger">Eliminar</a>
		<script>
		$("#del-"+<?php echo $r["id"];?>).click(function(e){
			e.preventDefault();
			p = confirm("Estas seguro?");
			if(p){
				window.location="./php/proveedor_eliminar.php?id="+<?php echo $r["id"];?>;

			}

		});
		</script>
	</td>
</tr>
<?php endwhile;?>
</table>
<br><br><br><br><br>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>
