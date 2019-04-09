<?php
/*----------Código Generado por --------------*/
/*-- Fecha : 22/11/2016 21:47:53--*/
/*-- Autores : Roy Alex Standen Barraza - Edson Carrasco Gonzales--*/
/*-- Contacto : roystandenb@gmail.com / edsoncarrascogonzalez@gmail.com --*/
error_reporting(E_ALL);
session_start();
include_once("../modelo/conexion.php");
include_once("../modelo/cartel.class.php");
if(isset($_SESSION['usuario'])){
@$ID_CARTEL_PRODUCTO = $_POST['ID_CARTEL_PRODUCTO'];
@$ID_EFECTO = $_POST['ID_EFECTO'];
@$NOMBRE_CARTEL_PRODUCTO = $_POST['NOMBRE_CARTEL_PRODUCTO'];
@$DIAS_OFERTA_CARTEL_PRODUCTO = $_POST['DIAS_OFERTA_CARTEL_PRODUCTO'];
@$OFERTA_CARTEL_PRODUCTO = $_POST['OFERTA_CARTEL_PRODUCTO'];
@$VALOR_CARTEL_PRODUCTO = $_POST['VALOR_CARTEL_PRODUCTO'];
@$TEXTO_INFORMATIVO_CARTEL_PRODUCTO = $_POST['TEXTO_INFORMATIVO_CARTEL_PRODUCTO'];
@$FOTO_CARTEL_PRODUCTO = $_FILES['NUEVA_FOTO_PRODUCTO'];
@$FONDO_PANTALLA_CARTEL_PRODUCTO = $_FILES['NUEVO_FONDO_DE_PANTALLA'];
@$DURACION_CARTEL_PRODUCTO = $_POST['DURACION_CARTEL_PRODUCTO'];
@$TIPO_CARTEL = $_POST["TIPO_CARTEL"];
$accion = $_GET['accion'];
	if($accion=='crear'){
		$objeto = new cartel($ID_CARTEL_PRODUCTO,$ID_EFECTO,$NOMBRE_CARTEL_PRODUCTO,$DIAS_OFERTA_CARTEL_PRODUCTO,$OFERTA_CARTEL_PRODUCTO,$VALOR_CARTEL_PRODUCTO,$TEXTO_INFORMATIVO_CARTEL_PRODUCTO,$FOTO_CARTEL_PRODUCTO,$FONDO_PANTALLA_CARTEL_PRODUCTO,$DURACION_CARTEL_PRODUCTO,$TIPO_CARTEL);
		print $objeto->crear();
	}else if($accion=='modificar'){
		$objeto = new cartel($ID_CARTEL_PRODUCTO,$ID_EFECTO,$NOMBRE_CARTEL_PRODUCTO,$DIAS_OFERTA_CARTEL_PRODUCTO,$OFERTA_CARTEL_PRODUCTO,$VALOR_CARTEL_PRODUCTO,$TEXTO_INFORMATIVO_CARTEL_PRODUCTO,$FOTO_CARTEL_PRODUCTO,$FONDO_PANTALLA_CARTEL_PRODUCTO,$DURACION_CARTEL_PRODUCTO,$TIPO_CARTEL);
		print $objeto->modificar();
	}else if($accion=='eliminar'){
		$objeto = new cartel($ID_CARTEL_PRODUCTO,$ID_EFECTO,$NOMBRE_CARTEL_PRODUCTO,$DIAS_OFERTA_CARTEL_PRODUCTO,$OFERTA_CARTEL_PRODUCTO,$VALOR_CARTEL_PRODUCTO,$TEXTO_INFORMATIVO_CARTEL_PRODUCTO,$FOTO_CARTEL_PRODUCTO,$FONDO_PANTALLA_CARTEL_PRODUCTO,$DURACION_CARTEL_PRODUCTO,$TIPO_CARTEL);
		print $objeto->eliminar();
	}else if($accion=='mostrar'){
		$objeto = new cartel($ID_CARTEL_PRODUCTO,$ID_EFECTO,$NOMBRE_CARTEL_PRODUCTO,$DIAS_OFERTA_CARTEL_PRODUCTO,$OFERTA_CARTEL_PRODUCTO,$VALOR_CARTEL_PRODUCTO,$TEXTO_INFORMATIVO_CARTEL_PRODUCTO,$FOTO_CARTEL_PRODUCTO,$FONDO_PANTALLA_CARTEL_PRODUCTO,$DURACION_CARTEL_PRODUCTO,$TIPO_CARTEL);
		echo $objeto->mostrar($_GET['jtSorting'],$_GET['jtStartIndex'],$_GET['jtPageSize']);
	}else if($accion=='comboboxEfecto'){
		$conexion = new Database();
		$datos = $conexion->listarJtablesSinPaginador(" `efecto` "
															," `ID_EFECTO` AS Value, `NOMBRE_EFECTO` AS DisplayText ", "");
		echo json_encode($datos);	
	}
}
?>