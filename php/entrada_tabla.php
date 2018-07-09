
<?php

include "conexion.php";


$user_id=null;
$sql1= $sql  = 'SELECT entradas.id, entradas.fecha, entradas.factura, clientes.nrc, clientes.nombre, entradas.gravadas_locales, entradas.credito_fiscal, entradas.total FROM entradas INNER JOIN clientes ON entradas.id_cliente=clientes.id_cliente ORDER BY entradas.id asc';
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
			$sql2='select sum(gravadas_locales) as total1 from entradas';
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
			$sql2='select sum(credito_fiscal) as total2 from entradas';
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
			$sql2='select sum(total) as total4 from entradas';
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
<br><br><br><br><br>

<?php else:?>	
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>
