<?php
include_once("conexion.php");
Class cartel{
	//Atributos
	private $ID_REPRODUCCION = null;
	private $ID_CARTEL_PRODUCTO = null;
	private $ORDEN_REPRODUCCION = null;
	
	private $conexion = null;
	private $nombre_tabla = 'reproduccion';
	private $id_tabla = 'ID_REPRODUCCION';
	private $directorioFotoProducto = '../fotos/fotos_productos/';
	private $directorioFondosCarteles = '../fotos/fotos_fondos_carteles/';
	
	//Constructor
	function __construct($ID_REPRODUCCION = null,$ID_CARTEL_PRODUCTO = null,$ORDEN_REPRODUCCION = null) {
		$this->ID_REPRODUCCION = $ID_REPRODUCCION;
		$this->ID_CARTEL_PRODUCTO = $ID_CARTEL_PRODUCTO;
		$this->ORDEN_REPRODUCCION = $ORDEN_REPRODUCCION;
		//-------------Conexion-----
		$this->conexion = new Database();
	}
	
	//Funciones públicas
	public function crear(){
		$query = "INSERT INTO `".$this->nombre_tabla."`
				(`ID_CARTEL_PRODUCTO`,`ORDEN_REPRODUCCION`)
				VALUES
				('".$this->ID_CARTEL_PRODUCTO."','".$this->ORDEN_REPRODUCCION."')";
		$query = $this->conexion->ejecutar_query($query);
		
		$this->ID_CARTEL_PRODUCTO = $this->conexion->ultimo_id();

		return $this->devolver_datos_tabla($query);
		
	}
	
	public function modificar(){
		$query="UPDATE `".$this->nombre_tabla."`
				SET
				`ID_CARTEL_PRODUCTO` = '".$this->ID_CARTEL_PRODUCTO."',
				`ORDEN_REPRODUCCION` = '".$this->ORDEN_REPRODUCCION."'
				WHERE `".$this->id_tabla."` = '".$this->ID_REPRODUCCION."'";
		$query = $this->conexion->ejecutar_query($query);
		
		return $this->devolver_datos_tabla($query);
	}
	
	public function eliminar(){
		$query="DELETE FROM `".$this->nombre_tabla."` WHERE `".$this->id_tabla."`='".$this->ID_REPRODUCCION."'";
		$query = $this->conexion->ejecutar_query($query);
		return $this->devolver_datos_tabla($query);
	}
	
	public function mostrar($jtSorting,$jtStartIndex,$jtPageSize){
		$campos = " * ";
		$tablas = " reproduccion ";
		$clausulaWhere = " ";
		$datos = $this->conexion->listarJtables($tablas,$campos,$clausulaWhere,$jtSorting,$jtStartIndex,$jtPageSize);
		$this->conexion->cerrarConexion();
		return $datos;
	}
	
	
	//Funciones privadas
	private function devolver_datos_tabla($resultado_query){
		$result = "SELECT * FROM `".$this->nombre_tabla."` WHERE `".$this->id_tabla."` LIKE '".$this->conexion->ultimo_id()."'";
		if($resultado_query){
			$result = $this->conexion->consulta($result);
			$result = $this->conexion->extraer_registro();
			$jTableResult = array();
			$jTableResult['Result'] = "OK";
			$jTableResult['Record'] = $result;
			$this->conexion->cerrarConexion();
		}else{
			$result = $this->conexion->consulta($result);
			$result = $this->conexion->extraer_registro();
			$jTableResult = array();
			$jTableResult['Result'] = "ERROR";
			$jTableResult['Record'] = $result;
			$this->conexion->cerrarConexion();
		}
		return json_encode($jTableResult);
	}
}
?>