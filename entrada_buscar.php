
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
		<h2 text-align="center"><?php 
		if(!empty($_POST)){
			if(isset($_POST["inicio"]) &&isset($_POST["fin"])){
				print "ENTRADAS<h4>DESDE: <b>$_POST[inicio]</b> <br> HASTA: <b>$_POST[fin]</b></h4>";
				
			}
		}
		?>
		</h2>
<!-- Button trigger modal -->
  <a data-toggle="modal" href="./entrada_formulario_agregar.php" class="btn btn-default">Agregar</a>
<br><br>
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
  <form class="navbar-form navbar-left" method="post" action="./entrada_buscar.php">
      <div class="form-group">
        <input type="date" name="inicio" class="form-control" placeholder="Buscar">
      </div>
      <div class="form-group">
        <input type="date" name="fin" class="form-control" placeholder="Buscar">
      </div>	  
	  <div class="form-group">
        <input type="checkbox" name="facturas" value="3">SOLO FACTURAS<br>  	  
      </div>
	  <div class="form-group">
        <input type="checkbox" name="facturas" value="4">TODO<br>  	  
      </div>
      <button type="submit" class="btn btn-default">&nbsp;<i class="glyphicon glyphicon-search"></i>&nbsp;</button>	  
  </form>
<?php include "php/entrada_busqueda.php"; ?>
</div>
</div>
</div>

<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>