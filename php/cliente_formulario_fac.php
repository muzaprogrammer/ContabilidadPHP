<?php
include "conexion.php";

$user_id=null;
$sql1= "SELECT * FROM clientes INNER JOIN tipo_cliente ON clientes.id_tipo = tipo_cliente.id_tipo WHERE clientes.id_cliente = ".$_GET["id"];
$query = $con->query($sql1);
$cliente = null;
if($query->num_rows>0){
while ($r=$query->fetch_object()){
  $cliente=$r;
  break;
}

  }
?>

<?php if($cliente!=null):?>

<form role="form" method="post" action="php/cliente_actualizar_fac.php">  
  <div class="form-group">
    <label for="nombre">NOMBRE</label>
    <input type="text" class="form-control" value="<?php echo $cliente->nombre; ?>" name="nombre" >
  </div>  
  <div class="form-group">
    <label for="direccion">DIRECCION</label>
    <input type="text" class="form-control" value="<?php echo $cliente->direccion; ?>" name="direccion" >
  </div>
<input type="hidden" name="id" value="<?php echo $cliente->id_cliente; ?>">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>
<?php else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<?php endif;?>