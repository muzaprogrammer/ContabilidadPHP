<?php
include "conexion.php";

$user_id=null;
$sql1  = 'SELECT salidas.id, salidas.fecha, salidas.id_provee, salidas.factura, proveedores.nrc, proveedores.nombre, salidas.gravadas_locales, salidas.credito_fiscal, salidas.fovial_cesc_iva, salidas.total FROM salidas INNER JOIN proveedores ON salidas.id_provee=proveedores.id where salidas.id = '.$_GET["id"];
$query = $con->query($sql1);
$salida = null;
if($query->num_rows>0){
while ($r=$query->fetch_object()){
  $salida=$r;
  break;
}

  }
?>

<?php if($salida!=null):?>

<form role="form" method="post" action="php/salida_actualizar.php">
  <div class="form-group">
    <label for="proveedor">PROVEEDOR</label>
  <br>
    <select name="provee">
        <option value="<?php echo $salida->id_provee; ?>" ><?php echo $salida->nombre; ?></option>
        <?php
    include "php/conexion.php";
												
          $query = $con -> query ("SELECT * FROM proveedores");
                      
          while ($valores = mysqli_fetch_array($query)) {
                        
            echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
                          
          }
        ?>
      </select>
  </div>
  <div class="form-group">
    <label for="fecha">FECHA</label>
    <input type="date" class="form-control" value="<?php echo $salida->fecha; ?>" name="fecha" >
  </div>
  <div class="form-group">
    <label for="factura">FACTURA</label>
    <input type="text" class="form-control" value="<?php echo $salida->factura; ?>" name="factura" >
  </div>
  <div class="form-group">
    <label for="gravadas_locales">GRAVADAS LOCALES</label>
    <input type="number" min="0" max="10000" step="0.01" value="<?php echo $salida->gravadas_locales; ?>" class="form-control" name="gravadas_locales" >
  </div>
  <div class="form-group">
    <label for="credito_fiscal">CREDITO FISCAL</label>
    <input type="number" min="0" max="10000" step="0.01" value="<?php echo $salida->credito_fiscal; ?>" class="form-control" name="credito_fiscal" >
  </div>
  <div class="form-group">
    <label for="fovial_cesc_iva">FOVIAL/CESC/IVA</label>
    <input type="number" min="0" max="10000" step="0.01" value="<?php echo $salida->fovial_cesc_iva; ?>" class="form-control" name="fovial_cesc_iva" >
  </div>
  <div class="form-group">
    <label for="total">TOTAL</label>
    <input type="number" min="0" max="10000" step="0.01" value="<?php echo $salida->total; ?>" class="form-control" name="total" >
  </div>
<input type="hidden" name="id" value="<?php echo $salida->id; ?>">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>
<?php else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<?php endif;?>