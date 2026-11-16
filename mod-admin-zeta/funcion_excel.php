<?php
header('Content-type: text/html; charset=utf-8');
include_once("conexion/conexion.php");

class Proyecto2 {
	
	private $codigo;
	private $descripcion;
	private $titulo;
	private $texto;
	private $bitly;
	private $imagen;
	private $planta;
	private $link;
	private $orden;


	
	
	function buscarConsulta($rr) {
        //Le deciamos que la locacion es lenguaje español
        setlocale(LC_CTYPE, 'es');
        //La sentencia a ejecutar
        $sql = "SELECT * FROM consulta WHERE id_usuario=$rr";
        try {
            //Creamos un objeto de la clase conexion
            $miconexion = new Conexion();
            //Obtenemos la conexion
            $cn = $miconexion->conectar();
            //Ejecutamos la sentencia
            $rs = mysql_query($sql, $cn);
            //Creamos un array que almacenara los datos de la sentencia
            $registros = array();
            //Recorremos el resultado de la consulta y lo almacenamos en el array
            while ($reg = mysql_fetch_array($rs)) {
                array_push($registros, $reg);
            }
            //Liberamos recursos
            mysql_free_result($rs);
            mysql_close($cn);
        } catch (exception $e) {
            try {
                mysql_free_result($rs);
            } catch (exception $e) {

            }
            try {
                mysql_close($cn);
            } catch (exception $e) {

            }
        }
        return $registros;
    }
	
	function buscarPropiedad($rr) {
        //Le deciamos que la locacion es lenguaje español
        setlocale(LC_CTYPE, 'es');
        //La sentencia a ejecutar
        $sql = "SELECT * FROM propiedad WHERE codigo=$rr";
        try {
            //Creamos un objeto de la clase conexion
            $miconexion = new Conexion();
            //Obtenemos la conexion
            $cn = $miconexion->conectar();
            //Ejecutamos la sentencia
            $rs = mysql_query($sql, $cn);
            //Creamos un array que almacenara los datos de la sentencia
            $registros = array();
            //Recorremos el resultado de la consulta y lo almacenamos en el array
            while ($reg = mysql_fetch_array($rs)) {
                array_push($registros, $reg);
            }
            //Liberamos recursos
            mysql_free_result($rs);
            mysql_close($cn);
        } catch (exception $e) {
            try {
                mysql_free_result($rs);
            } catch (exception $e) {

            }
            try {
                mysql_close($cn);
            } catch (exception $e) {

            }
        }
        return $registros;
    }


	function setDescripcion($descripcion) {
    	$this->descripcion = $descripcion;
    }
	function setTitulo($titulo) {
    	$this->titulo = $titulo;
    }
	function setOrden($orden) {
    	$this->orden = $orden;
    }
	function setTexto($texto) {
    	$this->texto = $texto;
    }
	function setImagen($imagen) {
    	$this->imagen = $imagen;
    }
	function setPlanta($planta) {
    	$this->planta = $planta;
    }
	function setCodigo($codigo) {
    	$this->codigo = $codigo;
    }
	function setBitly($bitly) {
    	$this->bitly = $bitly;
    }
	function setLink($link) {
    	$this->link = $link;
    }



	
	}
	?>