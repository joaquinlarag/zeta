<?php
 /* Ejemplo 1 generando excel desde mysql con PHP
    @Autor: Carlos Hernan Aguilar Hurtado
 */
error_reporting(E_ALL ^ E_DEPRECATED);
$conexion = mysql_connect ("localhost:3306", "cbg24975_userbgl", "Bgl_2016_busCamion");
 mysql_select_db ("cbg24975_sitio", $conexion);   
 $sql = "SELECT * FROM contacto ORDER BY id ASC";
 mysql_query('SET NAMES \'utf8\'');
 $resultado = mysql_query ($sql, $conexion) or die (mysql_error ());
 $registros = mysql_num_rows ($resultado);
  
 if ($registros > 0) {
   require_once 'Classes/PHPExcel.php';
   $objPHPExcel = new PHPExcel();
    
   //Informacion del excel
   $objPHPExcel->
    getProperties()
        ->setCreator("losneurona.cl")
        ->setLastModifiedBy("losneurona.cl")
        ->setTitle("Exportar usuarios BGL")
        ->setSubject("Datos Formulario Sitio Web BGL")
        ->setDescription("Datos Formulario Sitio Web BGL")
        ->setKeywords("BGL")
        ->setCategory("Agilidad, confianza y servicio");    
		$i = 1;
 $objPHPExcel->setActiveSheetIndex(0)
 			->setCellValue('A'.$i, "Nombre")
			->setCellValue('B'.$i, "Mail")
			->setCellValue('C'.$i, "Empresa")
			->setCellValue('D'.$i, "Teléfono")
			->setCellValue('E'.$i, "Solicitud")
			->setCellValue('F'.$i, "Fecha");
 
   $i = 2;    
   while ($registro = mysql_fetch_object ($resultado)) {
        
      $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $registro->nombre)
			->setCellValue('B'.$i, $registro->mail)
			->setCellValue('C'.$i, $registro->empresa)
			->setCellValue('D'.$i, $registro->telefono)
			->setCellValue('E'.$i, $registro->solicitud)
			->setCellValue('F'.$i, $registro->fecha);
  
      $i++;
       
   }
}
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Registro_contacto_bgl.xlsx"');
header('Cache-Control: max-age=0');
 
$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007'); 
$objWriter->save('php://output');
exit;
mysql_close ();
?>