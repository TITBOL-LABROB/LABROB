<?php 

require_once '../../resources/bower_components/dompdf/dompdf_config.inc.php';

date_default_timezone_set("America/La_Paz");
$fecha=date("Y/m/d");
$hora=date("h:i:s");

$html="

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Proforma</title>
 	<link rel='image/x-icon' href='' type='image/png'>
 	<style>
 	*{
 	}
 	</style>
 </head>
 <body>
 	<table width='100%'>
 		<tr>
 			<td width='40%'></td>
 			<td width='40%' style='font-size:10px;'><b>ACTA RECEPCION DE MUESTRAS</b></td>
 			<td width='20%' style='text-align:center;font-size:10px;'><b>N* 26878</b></td>
 		</tr>
 	</table>
 	<table width='100%'>
 		<tr>
 			<td width='40%'>FR-RE-001</td>
 			<td width='35%'>Version: 02</td>
 			<td width='20%' style='text-align:right;'></td>
 		</tr>
 	</table>
	<table width='100%' style='border-collapse: collapse; border:0.7px solid #000000; font-size:10px;' border='0'>
		<tr style='text-align:center;'>
			<td width='15%'><b>Codigo de Muestra:</b></td>
			<td width='35%'><b>Producto</b></td>
			<td width='35%'><b>Marca</b></td>
			<td width='15%'><b>Cantidad de Muestra:</b></td>
		</tr>
		<tr>
			<td width='15%'>50570</td>
			<td width='35%'>Jugo Lacteo</td>
			<td width='35%'>Alimentacion Complementaria Escolar</td>
			<td width='15%' style='text-align:center;'>5250 ml.</td>
		</tr>
	</table>

	<table width='100%'style='border-collapse: collapse; border:0.7px solid #000000; font-size:10px;' border='0'>
		<tr>
			<td><b>Caracteristicas:</b><br>Sabor Durazno</td>
		</tr>
		<tr>
			<td><b>Caracteristicas:</b><br>Sabor Durazno</td>
		</tr>
	</table>
	<br>
	<table width='100%' style='border-collapse: collapse; border:0.7px solid #000000; font-size:10px;' border='0'>
		<tr>
			<td><b>Propietario: </b></td>
			<td><b>Telefono: </b></td>
		</tr>
		<tr>
			<td colspan='2'><b>Direccion:</b></td>
		</tr>
		<tr>
			<td colspan='2'><b>Tipo de Muestra:</b></td>
		</tr>
	</table>
	<br>
	<table width='100%' style='border-collapse: collapse; border:0.7px solid #000000; font-size:10px;' border='0'>
		<tr>
			<td><b>Ensayos Requeridos: </b><br>
			Segun Proforma No.
			</td>
		</tr>
	</table>
	<br>
	<table width='100%' style='border-collapse: collapse; border:0.7px solid #000000; font-size:10px;' border='0'>
		<tr>
			<td><b>Observaciones: </b><br>
			Prestacion de servicio laboratorial solicitada
			</td>
		</tr>
	</table>
	<br>
	<table width='100%' style='border-collapse: collapse;font-size:10px; border:0.7px solid;'>
		<tr>
			<td><b>Responsable de la Muestra: </b>Lic. Andrea Salas Justiniano</td>
			<td width='20%'>Fecha y Hora de Recepcion:</td>
			<td width='20%' style='text-align:center;'>$fecha $hora</td>
		</tr>
	</table>
	<br>
	<table width='100%' style='border-collapse: collapse;font-size:10px; border:0.7px solid;'>
		<tr>
			<td><b>Fecha y hora de entrega de resultados: </b>$fecha $hora</td>
		</tr>
	</table>
	<br>
	<table width='100%' style='border-collapse: collapse; border:0.7px solid #000000;' border='0'>
		<tr>
			<td><br><br><br></td>
			<td><br><br><br></td>
		</tr>
		<tr>
			<td style='font-size:10px; text-align:center;'>Firma del Interesado</td>
			<td style='font-size:10px; text-align:center;'>Firma de Recepcion</td>
		</tr>
		<tr>
			<td colspan='2' style='font-size:10px;'><b>Entregado por: </b> Ing. Tatiana Espinosa</td>
		</tr>
		<tr>
			<td colspan='2' style='font-size:10px;'><b>C.I.: </b> 796523</td>
		</tr>
	</table>
 </body>
 </html>";


$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->set_paper('a4', 'portrait');
$canvas = $dompdf->get_canvas();
$font = Font_Metrics::get_font("Sans Serif", "bold");
$canvas->page_text(540, 33, "Pagina: {PAGE_NUM} de {PAGE_COUNT}", $font, 10, array(0,0,0));
$dompdf->stream('my.pdf',array('Attachment'=>0));



 ?>	