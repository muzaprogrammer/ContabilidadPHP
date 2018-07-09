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
    <h2 text-align="center">PROVEEDORES</h2>
<!-- Button trigger modal -->
  <form role="form" method="post" action="php/proveedor_agregar.php">   
  <div class="form-group">
    <label for="documento">NIT</label>
    <input type="text" class="form-control" name="nit" required>
  </div>
  <div class="form-group">
    <label for="registro">NRC</label>
    <input type="text" class="form-control" name="nrc" required>
  </div>
  <div class="form-group">
    <label for="nombre">NOMBRE DEL CONTRIBUYENTE</label>
    <input type="text" class="form-control" name="nombre" >
  </div>  
  <div class="form-group">
    <label for="observaciones">OBRSERVACIONES</label>
    <input type="text" class="form-control" name="observaciones" >
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