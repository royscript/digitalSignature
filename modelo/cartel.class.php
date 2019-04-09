<?php
include_once("conexion.php");
Class cartel{
	//Atributos
	private $ID_CARTEL_PRODUCTO = null;
	private $ID_EFECTO = null;
	private $NOMBRE_CARTEL_PRODUCTO = null;
	private $DIAS_OFERTA_CARTEL_PRODUCTO = null;
	private $OFERTA_CARTEL_PRODUCTO = null;
	private $VALOR_CARTEL_PRODUCTO = null;
	private $TEXTO_INFORMATIVO_CARTEL_PRODUCTO = null;
	private $FOTO_CARTEL_PRODUCTO = null;
	private $FONDO_PANTALLA_CARTEL_PRODUCTO = null;
	private $DURACION_CARTEL_PRODUCTO = null;
	private $TIPO_CARTEL = null;
	private $conexion = null;
	private $nombre_tabla = 'cartel_producto';
	private $id_tabla = 'ID_CARTEL_PRODUCTO';
	private $directorioFotoProducto = '../fotos/fotos_productos/';
	private $directorioFondosCarteles = '../fotos/fotos_fondos_carteles/';
	
	//Constructor
	function __construct($ID_CARTEL_PRODUCTO = null,$ID_EFECTO = null,$NOMBRE_CARTEL_PRODUCTO = null,
						 $DIAS_OFERTA_CARTEL_PRODUCTO = null, $OFERTA_CARTEL_PRODUCTO = null, $VALOR_CARTEL_PRODUCTO = null, $TEXTO_INFORMATIVO_CARTEL_PRODUCTO = null, $FOTO_CARTEL_PRODUCTO = null, $FONDO_PANTALLA_CARTEL_PRODUCTO = null, $DURACION_CARTEL_PRODUCTO = null, $TIPO_CARTEL = null) {
		$this->ID_CARTEL_PRODUCTO = $ID_CARTEL_PRODUCTO;
		$this->ID_EFECTO = $ID_EFECTO;
		$this->NOMBRE_CARTEL_PRODUCTO = strtoupper($NOMBRE_CARTEL_PRODUCTO);
		$this->DIAS_OFERTA_CARTEL_PRODUCTO = strtoupper($DIAS_OFERTA_CARTEL_PRODUCTO);
		$this->OFERTA_CARTEL_PRODUCTO = strtoupper($OFERTA_CARTEL_PRODUCTO);
		$this->VALOR_CARTEL_PRODUCTO = strtoupper($VALOR_CARTEL_PRODUCTO);
		$this->TEXTO_INFORMATIVO_CARTEL_PRODUCTO = strtoupper($TEXTO_INFORMATIVO_CARTEL_PRODUCTO);
		$this->FOTO_CARTEL_PRODUCTO = $FOTO_CARTEL_PRODUCTO;
		$this->FONDO_PANTALLA_CARTEL_PRODUCTO = $FONDO_PANTALLA_CARTEL_PRODUCTO;
		$this->DURACION_CARTEL_PRODUCTO = $DURACION_CARTEL_PRODUCTO;
		$this->TIPO_CARTEL = $TIPO_CARTEL;
		//-------------Conexion-----
		$this->conexion = new Database();
	}
	
	//Funciones públicas
	public function crear(){
		$query = "INSERT INTO `".$this->nombre_tabla."`
				(`ID_EFECTO`,`NOMBRE_CARTEL_PRODUCTO`,`DIAS_OFERTA_CARTEL_PRODUCTO`,
				 `OFERTA_CARTEL_PRODUCTO`,`VALOR_CARTEL_PRODUCTO`,`TEXTO_INFORMATIVO_CARTEL_PRODUCTO`,
				`DURACION_CARTEL_PRODUCTO`,`TIPO_CARTEL`)
				VALUES
				('".$this->ID_EFECTO."','".$this->NOMBRE_CARTEL_PRODUCTO."','".$this->DIAS_OFERTA_CARTEL_PRODUCTO."','"
				.$this->OFERTA_CARTEL_PRODUCTO."','".$this->VALOR_CARTEL_PRODUCTO."','".$this->TEXTO_INFORMATIVO_CARTEL_PRODUCTO
			    ."','".$this->DURACION_CARTEL_PRODUCTO."','".$this->TIPO_CARTEL."')";
		$query = $this->conexion->ejecutar_query($query);
		
		$this->ID_CARTEL_PRODUCTO = $this->conexion->ultimo_id();
		
		$nombre_foto_producto = $this->ID_CARTEL_PRODUCTO."_foto_producto";
		$nombre_foto_producto = $this->subirArchivo($this->FOTO_CARTEL_PRODUCTO,$nombre_foto_producto,$this->directorioFotoProducto);
		
		if(!empty($this->FOTO_CARTEL_PRODUCTO["type"])){
			$query="UPDATE `".$this->nombre_tabla."`
					SET
					`FOTO_CARTEL_PRODUCTO` = '".$nombre_foto_producto."'
					WHERE `".$this->id_tabla."` = '".$this->ID_CARTEL_PRODUCTO."'";
			$query = $this->conexion->ejecutar_query($query);
		}
		
		$nombre_fondo_cartel = $this->ID_CARTEL_PRODUCTO."_fondo_cartel";
		$nombre_fondo_cartel = $this->subirArchivo($this->FONDO_PANTALLA_CARTEL_PRODUCTO,$nombre_fondo_cartel,$this->directorioFondosCarteles);
		
		if(!empty($this->FONDO_PANTALLA_CARTEL_PRODUCTO["type"])){
			$query="UPDATE `".$this->nombre_tabla."`
					SET
					`FONDO_PANTALLA_CARTEL_PRODUCTO` = '".$nombre_fondo_cartel."'
					WHERE `".$this->id_tabla."` = '".$this->ID_CARTEL_PRODUCTO."'";
			$query = $this->conexion->ejecutar_query($query);
		}
		
		
		return $this->devolver_datos_tabla($query);
		
	}
	
	public function modificar(){
		$query="UPDATE `".$this->nombre_tabla."`
				SET
				`ID_EFECTO` = '".$this->ID_EFECTO."',
				`NOMBRE_CARTEL_PRODUCTO` = '".$this->NOMBRE_CARTEL_PRODUCTO."',
				`DIAS_OFERTA_CARTEL_PRODUCTO` = '".$this->DIAS_OFERTA_CARTEL_PRODUCTO."',
				`OFERTA_CARTEL_PRODUCTO` = '".$this->OFERTA_CARTEL_PRODUCTO."',
				`VALOR_CARTEL_PRODUCTO` = '".$this->VALOR_CARTEL_PRODUCTO."',
				`TEXTO_INFORMATIVO_CARTEL_PRODUCTO` = '".$this->TEXTO_INFORMATIVO_CARTEL_PRODUCTO."',
				`DURACION_CARTEL_PRODUCTO` = '".$this->DURACION_CARTEL_PRODUCTO."',
				`TIPO_CARTEL` = '".$this->TIPO_CARTEL."'
				WHERE `".$this->id_tabla."` = '".$this->ID_CARTEL_PRODUCTO."'";
		$query = $this->conexion->ejecutar_query($query);
		
		$nombre_foto_producto = $this->ID_CARTEL_PRODUCTO."_foto_producto";
		$nombre_foto_producto = $this->subirArchivo($this->FOTO_CARTEL_PRODUCTO,$nombre_foto_producto,$this->directorioFotoProducto);
		
		if(!empty($this->FOTO_CARTEL_PRODUCTO["type"])){
			$query="UPDATE `".$this->nombre_tabla."`
					SET
					`FOTO_CARTEL_PRODUCTO` = '".$nombre_foto_producto."'
					WHERE `".$this->id_tabla."` = '".$this->ID_CARTEL_PRODUCTO."'";
			$query = $this->conexion->ejecutar_query($query);
		}
		
		$nombre_fondo_cartel = $this->ID_CARTEL_PRODUCTO."_fondo_cartel";
		$nombre_fondo_cartel = $this->subirArchivo($this->FONDO_PANTALLA_CARTEL_PRODUCTO,$nombre_fondo_cartel,$this->directorioFondosCarteles);
		
		if(!empty($this->FONDO_PANTALLA_CARTEL_PRODUCTO["type"])){
			$query="UPDATE `".$this->nombre_tabla."`
					SET
					`FONDO_PANTALLA_CARTEL_PRODUCTO` = '".$nombre_fondo_cartel."'
					WHERE `".$this->id_tabla."` = '".$this->ID_CARTEL_PRODUCTO."'";
			$query = $this->conexion->ejecutar_query($query);
		}
		
		return $this->devolver_datos_tabla($query);
	}
	
	public function subirArchivo($archivo,$nombreArchivo,$direccionArchivo){
		if(!empty($archivo["type"])){
			$fileName = time().'_'.$archivo['name'];
			$valid_extensions = array("jpeg", "jpg", "png");
			$temporary = explode(".", $archivo["name"]);
			$file_extension = end($temporary);
			if(
				(($archivo["type"] == "image/png") || ($archivo["type"] == "image/jpg") || ($archivo["type"] == "image/jpeg")) 
				&& 
				in_array($file_extension, $valid_extensions)
			){
				$sourcePath = $archivo['tmp_name'];
				$targetPath = $direccionArchivo.$nombreArchivo.".".$file_extension;
				if(move_uploaded_file($sourcePath,$targetPath)){
					return $nombreArchivo.".".$file_extension;
				}else{
					return false;
				}
			}
		}
		
	}
	public function eliminar(){
		$query="DELETE FROM `".$this->nombre_tabla."` WHERE `".$this->id_tabla."`='".$this->ID_CARTEL_PRODUCTO."'";
		$query = $this->conexion->ejecutar_query($query);
		return $this->devolver_datos_tabla($query);
	}
	
	public function mostrar($jtSorting,$jtStartIndex,$jtPageSize){
		$campos = " * ";
		$tablas = " cartel_producto ";
		$clausulaWhere = " ";
		$datos = $this->conexion->listarJtables($tablas,$campos,$clausulaWhere,$jtSorting,$jtStartIndex,$jtPageSize);
		$this->conexion->cerrarConexion();
		return $datos;
	}
	
	
	//Funciones privadas
	private function devolver_datos_tabla($resultado_query){
		$result = "SELECT * FROM `".$this->nombre_tabla."` WHERE `".$this->id_tabla."` LIKE '".$this->ID_CARTEL_PRODUCTO."'";
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