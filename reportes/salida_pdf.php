<?php
include "../php/conexion.php";

$user_id=null;
if(!empty($_POST)){
	if(isset($_POST["inicio"]) &&isset($_POST["fin"])){
$sql1= "SELECT salidas.id, salidas.fecha, salidas.factura, proveedores.nrc, proveedores.nombre, salidas.gravadas_locales, salidas.credito_fiscal, salidas.fovial_cesc_iva, salidas.total FROM salidas INNER JOIN proveedores ON salidas.id_provee=proveedores.id WHERE salidas.fecha between \"$_POST[inicio]\" and \"$_POST[fin]\" AND proveedores.id > \"$_POST[facturas]\" ORDER BY salidas.id asc";
}}
$query = $con->query($sql1);
if($query->num_rows>0):
$html="<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <title>SALIDAS</title>
    <link rel='stylesheet' href='style.css' media='all' />
  </head>
  <body>
    <header class='clearfix'>
      <h1>SALIDAS INGUNIXX</h1>      
      <div id='project'>
		<span>REPORTE DE SALIDAS</span>
        <span>DESDE:</span> "."$_POST[inicio]"."
        <span>HASTA:</span> "."$_POST[fin]"."
        <span>-- FECHA DE ELABORACION:</span> ".date("Y-m-d")."  
      </div>
    </header>
    <main>
      <table border=1>
        <thead>
          <tr>
            <th>#</th>
			<th>FECHA</th>
			<th>FACTURA</th>
			<th>NRC</th>
			<th>NOMBRE</th>
			<th>GRAVADAS LOCALES</th>
			<th>CREDITO FISCAL</th>
			<th>FOVIAL/CESC</th>
			<th>TOTAL</th>
          </tr>";
while ($r=$query->fetch_array()): 
$html.="<tbody>
<tr>
	<td>".$r["id"]."</td>
	<td>".$r["fecha"]."</td>	
	<td>".$r["factura"]."</td>
	<td>".$r["nrc"]."</td>
	<td class='desc'>".$r["nombre"]."</td>
	<td>$".$r["gravadas_locales"]."</td>
	<td>$".$r["credito_fiscal"]."</td>
	<td>$".$r["fovial_cesc_iva"]."</td>
	<td>$".$r["total"]."</td>	
</tr>
</tbody>";
endwhile;
else:
endif; 
$sql2="select sum(gravadas_locales) as total1, sum(credito_fiscal) as total2, sum(fovial_cesc_iva) as total3, sum(total) as total4 from salidas WHERE salidas.fecha between \"$_POST[inicio]\" and \"$_POST[fin]\" ";
			$query = $con->query($sql2);
			if($query->num_rows>0):
				while ($s=$query->fetch_array()):
$html.="
<tr>
	<TD COLSPAN='5'><B>TOTALES</B></TD>
	<td><B>$".$s["total1"]."</B></td>	
	<td><B>$".$s["total2"]."</B></td>	
	<td><B>$".$s["total3"]."</B></td>	
	<td><B>$".$s["total4"]."</B></td>	
</tr>
</table>
    </main>    
  </body>
</html>
";      
endwhile;
endif;

include("mpdf/mpdf.php");
$mpdf=new mPDF('c','A4-L');
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($html);
$mpdf->Output();
exit;
?>