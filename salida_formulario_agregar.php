<html>
	<head>
		<title>INGUNIXX</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<script src="js/jquery.min.js"></script>
	</head>
	<body>
	<?php include "php/navbar.php"; ?>
<div class="container">
<div class="row">
<div class="col-md-12">
		<h2 text-align="center">SALIDAS</h2>
<!-- Button trigger modal -->  
<form role="form" method="post" action="php/salida_agregar.php">   
  <div class="form-group">
    <label for="documento">PROVEEDOR</label>
	<br>
    <select name="provee">
        <option value="0">Seleccione Proveedor:</option>
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
    <input type="date" class="form-control" name="fecha" >
  </div>
  <div class="form-group">
    <label for="factura">FACTURA</label>
    <input type="text" class="form-control" name="factura" >
  </div>
  <div class="form-group">
    <label for="gravadas_locales">GRAVADAS LOCALES</label>
    <input type="number" min="0" max="10000" step="0.01" class="form-control" name="gravadas_locales" >
  </div>
  <div class="form-group">
    <label for="credito_fiscal">CREDITO FISCAL</label>
    <input type="number" min="0" max="10000" step="0.01" class="form-control" name="credito_fiscal" >
  </div>
  <div class="form-group">
    <label for="fovial_cesc_iva">FOVIAL/CESC/IVA</label>
    <input type="number" min="0" max="10000" step="0.01" class="form-control" name="fovial_cesc_iva" >
  </div>
  <div class="form-group">
    <label for="total">TOTAL</label>
    <input type="number" min="0" max="10000" step="0.01" class="form-control" name="total" >
  </div>
  <button type="submit" class="btn btn-default">Agregar</button>
</form>
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

<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>