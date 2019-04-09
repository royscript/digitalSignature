<?php
include_once("../../modelo/conexion.php");

$listado = array();
$listado = ($_GET["listado"]);
$listado = explode(",", $listado);
$conexion = new Database();
$nuevoListado = array();
for($x=0;$x<count($listado);$x++){
	$result = $conexion->consulta("SELECT * 
									FROM `cartel_producto` C
									LEFT JOIN `reproduccion` R
									ON(C.`ID_CARTEL_PRODUCTO`=R.`ID_CARTEL_PRODUCTO`)
									WHERE C.`ID_CARTEL_PRODUCTO` = ".$listado[$x]."
									ORDER BY R.`ORDEN_REPRODUCCION` ASC");
	$nuevoListado[] = $conexion->extraer_registro();
}

print_r($nuevoListado);

$x=0;
if(isset($_GET["siguienteCartel"])){
	$x=intval($_GET["siguienteCartel"]);
}
for($x=$x;$x<count($nuevoListado);$x++){
	if($nuevoListado[$x]["TIPO_CARTEL"]=="producto-plantilla-1"){
		$dato = $nuevoListado[$x];
		$siguienteCartel = 0;
		if($x==(count($nuevoListado)-1)){
			$siguienteCartel = 0;
		}else{
			$siguienteCartel = $_GET["siguienteCartel"];
		}
		header('Location: Productos/plantilla_1.php?fondo_pantalla='.$dato["FONDO_PANTALLA_CARTEL_PRODUCTO"]
			   										."&foto_producto=".$dato["FOTO_CARTEL_PRODUCTO"]
			  										."&dias_oferta=".$dato["DIAS_OFERTA_CARTEL_PRODUCTO"]
			  										."&oferta=".$dato["OFERTA_CARTEL_PRODUCTO"]
			  										."&valor=".$dato["VALOR_CARTEL_PRODUCTO"]
			  										."&texto_informativo=".$dato["TEXTO_INFORMATIVO_CARTEL_PRODUCTO"]
			  										."&duracion_cartel=".$dato["DURACION_CARTEL_PRODUCTO"]
			  										."&siguienteCartel=".$dato["siguienteCartel"]
			  										."&listado=".$_GET["listado"]);
	}
}
?>
