<?php

include "conexion.php";

$user_id=null;

$sql1= "select sum(gravadas_locales) as total1, sum(credito_fiscal) as total2, sum(total) as total3 from salidas WHERE salidas.fecha between \"$_POST[inicio]\" and \"$_POST[fin]\"";

$query = $con->query($sql1);

?>

<?php if($query->num_rows>0):?>

<table class="table table-bordered table-hover">
<tr>
	<td colspan="3" align="center">
	<h3><b>SALIDAS</b></h3>
	</td>
</tr>
<tr>
	<th>VENTAS GRAVADAS</th>
	<th>CREDITO FISCAL</th>
	<th>TOTAL</th>	
</tr>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["total1"]; ?></td>
	<td><?php echo $r["total2"]; ?></td>	
	<td><?php echo $r["total3"]; ?></td>
</tr>
<?php endwhile;?>

<?php else:?>	
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>

<?php

include "conexion.php";

$user_id=null;

$sql1= "select sum(gravadas_locales) as total1, sum(credito_fiscal) as total2, sum(total) as total3 from entradas WHERE entradas.fecha between \"$_POST[inicio]\" and \"$_POST[fin]\"";

$query = $con->query($sql1);

?>

<?php if($query->num_rows>0):?>

<table class="table table-bordered table-hover">
<tr>
	<td colspan="3" align="center">
	<h3><b>ENTRADAS</b></h3>
	</td>
</tr>
<tr>
	<th>VENTAS GRAVADAS</th>
	<th>DEBITO FISCAL</th>
	<th>TOTAL</th>	
</tr>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["total1"]; ?></td>
	<td><?php echo $r["total2"]; ?></td>	
	<td><?php echo $r["total3"]; ?></td>
</tr>
<?php endwhile;?>

<?php else:?>	
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>

<?php

include "conexion.php";

$user_id=null;

$sql1= "select sum(gravadas_locales) as total1, sum(credito_fiscal) as total2, sum(total) as total3 from entradas WHERE entradas.fecha between \"$_POST[inicio]\" and \"$_POST[fin]\"";

$query = $con->query($sql1);

?>

<?php if($query->num_rows>0):?>

<table class="table table-bordered table-hover">
<tr>
	<td colspan="3" align="center">
	<h3><b>UTILIDADES</b></h3>
	</td>
</tr>
<tr>
	<th>VENTAS GRAVADAS</th>
	<th>DEBITO - CREDITO FISCAL</th>
	<th>DIFERENCIA</th>	
</tr>
<?php while ($r=$query->fetch_array()):
$sql2= "select sum(gravadas_locales) as totala, sum(credito_fiscal) as totalb, sum(total) as totalc from salidas WHERE salidas.fecha between \"$_POST[inicio]\" and \"$_POST[fin]\"";
$query = $con->query($sql2);
while ($r2=$query->fetch_array()):
?>
<tr>
	<td><?php echo (($r["total1"])-($r2["totala"])); ?></td>
	<td><?php echo (($r["total2"])-($r2["totalb"])); ?></td>
	<td><?php echo (($r["total3"])-($r2["totalc"])); ?></td>
</tr>
<?php 
endwhile;
endwhile;
?>

<?php else:?>	
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>
