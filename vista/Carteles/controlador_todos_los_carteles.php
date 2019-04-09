<?php
include_once("../../modelo/conexion.php");



$conexion = new Database();
$nuevoListado = array();

$result = $conexion->consulta("SELECT * 
								FROM `cartel_producto` C
								LEFT JOIN `reproduccion` R
								ON(C.`ID_CARTEL_PRODUCTO`=R.`ID_CARTEL_PRODUCTO`)
								ORDER BY R.`ORDEN_REPRODUCCION` ASC");
$listado = $conexion->extraer_array();


$x=0;
if(isset($_GET["siguienteCartel"])){
	$x=intval($_GET["siguienteCartel"]);
}

if($x>=count($listado)){
	$x = 0;
}

$dato = $listado[$x];

header('Location: Productos/plantilla_1.php?fondo_pantalla='.$dato["FONDO_PANTALLA_CARTEL_PRODUCTO"]
			   										."&foto_producto=".$dato["FOTO_CARTEL_PRODUCTO"]
			  										."&dias_oferta=".$dato["DIAS_OFERTA_CARTEL_PRODUCTO"]
			  										."&oferta=".$dato["OFERTA_CARTEL_PRODUCTO"]
			  										."&valor=".$dato["VALOR_CARTEL_PRODUCTO"]
			  										."&texto_informativo=".$dato["TEXTO_INFORMATIVO_CARTEL_PRODUCTO"]
			  										."&duracion_cartel=".$dato["DURACION_CARTEL_PRODUCTO"]
			  										."&siguienteCartel=".($x+1)
			  										."&listado=".$_GET["listado"]
			  										."&controlador=controlador_todos_los_carteles.php");

for($x=$x;$x<count($nuevoListado);$x++){
	if($nuevoListado[$x]["TIPO_CARTEL"]=="producto-plantilla-1"){
		$dato = $nuevoListado[$x];
		$siguienteCartel = 0;
		if($x==(count($nuevoListado)-1)){
			echo "".$dato["FOTO_CARTEL_PRODUCTO"];
			$siguienteCartel = 0;
		}else{
			$siguienteCartel = $_GET["siguienteCartel"];
			//echo "".$dato["FOTO_CARTEL_PRODUCTO"];
		}
		header('Location: Productos/plantilla_1.php?fondo_pantalla='.$dato["FONDO_PANTALLA_CARTEL_PRODUCTO"]
			   										."&foto_producto=".$dato["FOTO_CARTEL_PRODUCTO"]
			  										."&dias_oferta=".$dato["DIAS_OFERTA_CARTEL_PRODUCTO"]
			  										."&oferta=".$dato["OFERTA_CARTEL_PRODUCTO"]
			  										."&valor=".$dato["VALOR_CARTEL_PRODUCTO"]
			  										."&texto_informativo=".$dato["TEXTO_INFORMATIVO_CARTEL_PRODUCTO"]
			  										."&duracion_cartel=".$dato["DURACION_CARTEL_PRODUCTO"]
			  										."&siguienteCartel=".$x++
			  										."&listado=".$_GET["listado"]
			  										."&controlador=controlador_todos_los_carteles.php");
	}
}
?>
