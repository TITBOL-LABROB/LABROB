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
			<td width='15%'>5250</td>
		</tr>
	</table>

	<table width='100%'style='border-collapse: collapse; border:0.7px solid #000000; font-size:10px;' border='0'>
		<tr>
			<td width='40%'style='text-align:center;'><b>Ensayos</b></td>
			<td width='20%' ><b>Unidades</b></td>
			<td width='20%' ><b>Metodo/Tecnica</b></td>
			<td width='20%' style='text-align:right;'><b>Precio Unitario (Bs.)</b></td>
		</tr>
		<tr>
			<td colspan='4' style='border:black 0.8px solid;text-align:left;'>FISICO QUIMICA</td>
		</tr>
		<tr>
			<td>Fosforo</td>
			<td>mg/100ml</td>
			<td>A0AC 995.11</td>
			<td style='text-align:right;'>130.00</td>
		</tr>
		<tr>
			<td colspan='2'></td>
			<td><b>Total Fisico Quimico</b></td>
			<td style='text-align:right;'><b>1974.00</b></td>
		</tr>
		<tr>
			<td colspan='4' style='border:black 0.8px solid;text-align:left;'>MICROBIOLOGIA</td>
		</tr>
		<tr>
			<td>Mohos y Levaduras</td>
			<td>UFC/ml</td>
			<td>A0AC 997.02**</td>
			<td style='text-align:right;'>295.00</td>
		</tr>
		<tr>
			<td colspan='2'></td>
			<td><b>Total Microbiologia</b></td>
			<td style='text-align:right;'><b>595.00</b></td>
		</tr>
	</table>
	<br>
	<table width='100%' style='border-collapse: collapse; border:0.7px solid #000000; font-size:10px;' border='0'>
		<tr>
			<td width='60%'></td>
			<td width='20%' style='text-align:right;'>Subtotal</td>
			<td width='5%' style='text-align:center;'></td>
			<td width='15%' style='text-align:right;'>2423.00</td>
		</tr>
		<tr>
			<td width='25%'></td>
			<td width='25%' style='text-align:right;'>No. Muestras</td>
			<td width='25%' style='text-align:center;'>1</td>
			<td width='25%' style='text-align:right;'>2423.00</td>
		</tr>
		<tr>
			<td width='25%'></td>
			<td width='25%' style='text-align:right;'>Descuento</td>
			<td width='25%' style='text-align:center;'>5%</td>
			<td width='25%' style='text-align:right;'>121.00</td>
		</tr>
		<tr>
			<td width='25%'></td>
			<td width='25%' style='text-align:right;'>Muestreo</td>
			<td width='25%' style='text-align:center;'></td>
			<td width='25%' style='text-align:right;'>0.00</td>
		</tr>
		<tr>
			<td width='25%'></td>
			<td width='25%' style='text-align:right;'><b>Total a Cancelar</b></td>
			<td width='25%' style='text-align:center;'></td>
			<td width='25%' style='text-align:right;'><b>2302.00</b></td>
		</tr>
	</table>
	<br>
	<table width='100%' style='border-collapse: collapse; border:0.7px solid #000000;' border='0'>
		<tr>
			<td colspan='2' style='font-size:9px;'><b>CONDICIONES DEL SERVICIO</b></td>
		</tr>
		<tr>
			<td style='font-size:8px;' width='35%'>TIEMPO DE ENTREGA:</td>
			<td style='font-size:8px;' width='65%'>18 Dias Habiles, sujeto a confirmacion en el momento de ingreso de la muestra</td>
		</tr>
		<tr>
			<td style='font-size:8px;'>FORMA ENTREGA INFORME RESULTADOS:</td>
			<td style='font-size:8px;'>En las instalaciones de LABROB presentando el Acta de Recepcion de Muestras</td>
		</tr>
		<tr>
			<td style='font-size:8px;'>FORMA PAGO:</td>
			<td style='font-size:8px;'>Se cancela segun convenio de trabajo</td>
		</tr>
		<tr>
			<td style='font-size:9px;'>EFECTIVO/CHEQUE/DEPOSITO CTA.</td>
			<td style='font-size:9px;'>CHEQUE A NOMBRE DE: UTALAB-U.A.G.R.M./DEP.BCO. UNION CTA. NO.:1-2230899</td>
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