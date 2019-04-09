<?php
/*----------Código Generado por --------------*/
/*-- Fecha : 22/11/2016 21:47:53--*/
/*-- Autores : Roy Alex Standen Barraza - Edson Carrasco Gonzales--*/
/*-- Contacto : roystandenb@gmail.com / edsoncarrascogonzalez@gmail.com --*/
error_reporting(E_ALL);
session_start();
include_once("../modelo/conexion.php");
include_once("../modelo/orden.class.php");
if(isset($_SESSION['usuario'])){
@$ID_REPRODUCCION = $_POST['ID_REPRODUCCION'];
@$ID_CARTEL_PRODUCTO = $_POST['ID_CARTEL_PRODUCTO'];
@$ORDEN_REPRODUCCION = $_POST['ORDEN_REPRODUCCION'];

$accion = $_GET['accion'];
	if($accion=='crear'){
		$objeto = new cartel($ID_REPRODUCCION,$ID_CARTEL_PRODUCTO,$ORDEN_REPRODUCCION);
		print $objeto->crear();
	}else if($accion=='modificar'){
		$objeto = new cartel($ID_REPRODUCCION,$ID_CARTEL_PRODUCTO,$ORDEN_REPRODUCCION);
		print $objeto->modificar();
	}else if($accion=='eliminar'){
		$objeto = new cartel($ID_REPRODUCCION,$ID_CARTEL_PRODUCTO,$ORDEN_REPRODUCCION);
		print $objeto->eliminar();
	}else if($accion=='mostrar'){
		$objeto = new cartel($ID_REPRODUCCION,$ID_CARTEL_PRODUCTO,$ORDEN_REPRODUCCION);
		echo $objeto->mostrar($_GET['jtSorting'],$_GET['jtStartIndex'],$_GET['jtPageSize']);
	}else if($accion=='comboboxCarteles'){
		$conexion = new Database();
		$datos = $conexion->listarJtablesSinPaginador(" `cartel_producto` "
															," `ID_CARTEL_PRODUCTO` AS Value, `NOMBRE_CARTEL_PRODUCTO` AS DisplayText ", "");
		echo json_encode($datos);	
	}
}
?>