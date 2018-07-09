<?php
include "../php/conexion.php";

$user_id=null;
if(!empty($_POST)){
	if(isset($_POST["inicio"]) &&isset($_POST["fin"]) &&isset($_POST["facturas"])){
$sql1= "SELECT entradas.id, entradas.fecha, entradas.factura, clientes.nrc, clientes.nombre, entradas.gravadas_locales, entradas.credito_fiscal, entradas.total FROM entradas INNER JOIN clientes ON entradas.id_cliente=clientes.id_cliente WHERE entradas.fecha between \"$_POST[inicio]\" and \"$_POST[fin]\" AND clientes.id_tipo < \"$_POST[facturas]\" ORDER BY entradas.id asc";
}}
$query = $con->query($sql1);
if($query->num_rows>0):

$html="<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <title>ENTRADAS</title>
    <link rel='stylesheet' href='style.css' media='all' />
  </head>
  <body>
    <header class='clearfix'>
      <h1>SALIDAS INGUNIXX</h1>      
      <div id='project'>
		<span>REPORTE DE ENTRADAS</span>
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
			<th>DEBITO FISCAL</th>	
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
	<td>".$r["gravadas_locales"]."</td>
	<td>".$r["credito_fiscal"]."</td>
	<td>".$r["total"]."</td>		
</tr>
</tbody>";
endwhile;
else:
endif; 

$sql2="select sum(gravadas_locales) as total1, sum(credito_fiscal) as total2, sum(total) as total3 from entradas INNER JOIN clientes ON entradas.id_cliente=clientes.id_cliente WHERE entradas.fecha between \"$_POST[inicio]\" and \"$_POST[fin]\" AND clientes.id_tipo < \"$_POST[facturas]\" ORDER BY entradas.id asc";

			$query = $con->query($sql2);
			if($query->num_rows>0):
				while ($s=$query->fetch_array()):
				
$html.="
<tr>
	<TD COLSPAN='5'><B>TOTALES</B></TD>
	<td><B>$".$s["total1"]."</B></td>	
	<td><B>$".$s["total2"]."</B></td>	
	<td><B>$".$s["total3"]."</B></td>		
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

