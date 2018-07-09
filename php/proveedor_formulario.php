<?php
include "conexion.php";

$user_id=null;
$sql1= "select * from proveedores where id = ".$_GET["id"];
$query = $con->query($sql1);
$provee = null;
if($query->num_rows>0){
while ($r=$query->fetch_object()){
  $provee=$r;
  break;
}

  }
?>

<?php if($provee!=null):?>

<form role="form" method="post" action="php/proveedor_actualizar.php">
  <div class="form-group">
    <label for="documento">NIT</label>
    <input type="text" class="form-control" value="<?php echo $provee->nit; ?>" name="nit" required>    
  </div>
  <div class="form-group">
    <label for="registro">NRC</label>
    <input type="text" class="form-control" value="<?php echo $provee->nrc; ?>" name="nrc" required>
  </div>
  <div class="form-group">
    <label for="nombre">NOMBRE</label>
    <input type="text" class="form-control" value="<?php echo $provee->nombre; ?>" name="nombre" requiered>
  </div>  
  <div class="form-group">
    <label for="nombre">OBSERVACION</label>
    <input type="text" class="form-control" value="<?php echo $provee->observacion; ?>" name="observacion" requiered>
  </div>  
<input type="hidden" name="id" value="<?php echo $provee->id; ?>">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>
<?php else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<?php endif;?>