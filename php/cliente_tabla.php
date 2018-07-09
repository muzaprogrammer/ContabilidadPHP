<?php

include "conexion.php";

$user_id=null;
$sql1= "SELECT * FROM clientes INNER JOIN tipo_cliente ON clientes.id_tipo = tipo_cliente.id_tipo WHERE tipo_cliente.id_tipo = 1";
$query = $con->query($sql1);
?>
<div class="container">
<div class="row">
<div class="col-md-12">
		<h2>CLIENTES CON CREDITO FISCAL</h2>
		<a data-toggle="modal" href="./cliente_agregar_ccf.php" class="btn btn-default">Agregar</a>
		<BR>
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar</h4>
        </div>
        <div class="modal-body">
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div>
</div>
</div>
<br>
<?php if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
	<th>#</th>
	<th>CONTRIBUYENTE</th>
	<th>NIT</th>
	<th>NRC</th>
	<th>GIRO</th>
	<th>DIRECCION</th>
	<th></th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["id_cliente"]; ?></td>
	<td><?php echo $r["nombre"]; ?></td>
	<td><?php echo $r["nit"]; ?></td>
	<td><?php echo $r["nrc"]; ?></td>
	<td><?php echo $r["giro"]; ?></td>
	<td><?php echo $r["direccion"]; ?></td>
	<td style="width:150px;">
		<a href="./cliente_editar_ccf.php?id=<?php echo $r["id_cliente"];?>" class="btn btn-sm btn-warning">Editar</a>
		<a href="./php/cliente_eliminar_ccf.php?id=<?php echo $r["id_cliente"];?>" class="btn btn-sm btn-danger">Eliminar</a>		
	</td>
</tr>
<?php endwhile;?>
</table>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>

<?php

include "conexion.php";

$user_id=null;
$sql1= "SELECT * FROM clientes INNER JOIN tipo_cliente ON clientes.id_tipo = tipo_cliente.id_tipo WHERE tipo_cliente.id_tipo = 2";
$query = $con->query($sql1);
?>
<div class="container">
<div class="row">
<div class="col-md-12">
		<h2>CLIENTES CON FACTURA</h2>
		<a data-toggle="modal" href="./cliente_agregar_fac.php" class="btn btn-default">Agregar</a>
		<BR>
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar</h4>
        </div>
        <div class="modal-body">
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div>
</div>
</div>
<br>
<?php if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
	<th>#</th>
	<th>NOMBRE</th>	
	<th>DIRECCION</th>	
	<th></th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["id_cliente"]; ?></td>
	<td><?php echo $r["nombre"]; ?></td>
	<td><?php echo $r["direccion"]; ?></td>	
	<td style="width:150px;">
		<a href="./cliente_editar_fac.php?id=<?php echo $r["id_cliente"];?>" class="btn btn-sm btn-warning">Editar</a>
		<a href="./php/cliente_eliminar_fac.php?id=<?php echo $r["id_cliente"];?>" class="btn btn-sm btn-danger">Eliminar</a>		
	</td>
</tr>
<?php endwhile;?>
</table>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>