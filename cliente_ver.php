
<html>
	<head>
		<title>CLIENTES</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<script src="js/jquery.min.js"></script>
	</head>
	<body>
	<?php include "php/navbar.php"; ?>
<div class="container">
<div class="row">
<div class="col-md-12">		
      
    <form class="navbar-form navbar-left" role="search" action="./cliente_buscar.php">
    <h2>CLIENTES </h2>
      <div class="form-group" ALIGN="CENTER">      
        <input type="text" name="s" class="form-control" placeholder="Buscar">        
      </div>
      <button type="submit" class="btn btn-default">&nbsp;<i class="glyphicon glyphicon-search"></i>&nbsp;</button>      
    </form>
      <BR><BR><BR><BR><BR><BR><BR>
<!-- Button trigger modal -->

 
<?php include "php/cliente_tabla.php"; ?>
</div>
</div>
</div>

<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>