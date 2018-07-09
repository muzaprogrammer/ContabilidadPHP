<?php
include "conexion.php";

$user_id=null;
$sql1  = 'SELECT entradas.id, entradas.fecha, clientes.id_cliente, entradas.factura, clientes.nrc, clientes.nombre, entradas.gravadas_locales, entradas.credito_fiscal, entradas.total FROM entradas INNER JOIN clientes ON entradas.id_cliente=clientes.id_cliente where entradas.id = '.$_GET["id"];
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

<form role="form" method="post" action="php/entrada_actualizar.php">
  <div class="form-group">
    <label for="proveedor">PROVEEDOR</label>
  <br>
    <select name="provee">
        <option value="<?php echo $salida->id_cliente; ?>" ><?php echo $salida->nombre; ?></option>
        <?php
    include "php/conexion.php";
												
          $query = $con -> query ("SELECT * FROM clientes");
                      
          while ($valores = mysqli_fetch_array($query)) {
                        
            echo '<option value="'.$valores[id_cliente].'">'.$valores[nombre].'</option>';
                          
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
    <label for="credito_fiscal">DEBITO FISCAL</label>
    <input type="number" min="0" max="10000" step="0.01" value="<?php echo $salida->credito_fiscal; ?>" class="form-control" name="credito_fiscal" >
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