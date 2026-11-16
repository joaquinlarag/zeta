<?php
/*mysql_query('SET NAMES \'utf8\'');*/
include_once("conexion-movil.php");

class Galeria {

	private $nombre;
	private $email;
	private $empresa;
	private $telefono;
	private $id;
	private $codigo;
	private $titulo;
	private $solicitud;
	private $fecha;




	function buscarCarrusel() {
        //Le deciamos que la locacion es lenguaje espa�ol
        setlocale(LC_CTYPE, 'es');
        //La sentencia a ejecutar
        $sql = "SELECT * FROM carrusel ORDER BY orden ASC";
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

	function buscarProducto($rr) {
        //Le deciamos que la locacion es lenguaje espa�ol
        setlocale(LC_CTYPE, 'es');
        //La sentencia a ejecutar
        $sql = "SELECT * FROM productos WHERE categoria='$rr' ORDER BY orden ASC";
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

		function buscarCategorias() {
        //Le deciamos que la locacion es lenguaje espa�ol
        setlocale(LC_CTYPE, 'es');
        //La sentencia a ejecutar
        $sql = "SELECT * FROM categorias ORDER BY orden ASC";
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

	function buscarCategoriaExacta($rr) {
        //Le deciamos que la locacion es lenguaje espa�ol
        setlocale(LC_CTYPE, 'es');
        //La sentencia a ejecutar
        $sql = "SELECT * FROM categorias WHERE id_cat=$rr";
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

	function buscarSubcategorias($rr) {
        //Le deciamos que la locacion es lenguaje espa�ol
        setlocale(LC_CTYPE, 'es');
        //La sentencia a ejecutar
        $sql = "SELECT * FROM subcategorias WHERE id_cat=$rr";
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

	function buscarVehiculos($rr) {
        //Le deciamos que la locacion es lenguaje espa�ol
        setlocale(LC_CTYPE, 'es');
        //La sentencia a ejecutar
        $sql = "SELECT * FROM vehiculos WHERE id_sub=$rr ORDER BY orden ASC";
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




	function buscarSubcategoriaExacta($rr) {
        //Le deciamos que la locacion es lenguaje espa�ol
        setlocale(LC_CTYPE, 'es');
        //La sentencia a ejecutar
        $sql = "SELECT * FROM subcategorias WHERE id_sub=$rr";
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

	function buscarVehiculoExacto($rr) {
        //Le deciamos que la locacion es lenguaje espa�ol
        setlocale(LC_CTYPE, 'es');
        //La sentencia a ejecutar
        $sql = "SELECT * FROM vehiculos WHERE id=$rr";
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

	function buscarImagenesVehiculo($rr) {
        //Le deciamos que la locacion es lenguaje espa�ol
        setlocale(LC_CTYPE, 'es');
        //La sentencia a ejecutar
        $sql = "SELECT * FROM imagenes WHERE id_vehiculo=$rr ORDER BY orden ASC";
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


	function buscarVehiculosDestacados() {
        //Le deciamos que la locacion es lenguaje espa�ol
        setlocale(LC_CTYPE, 'es');
        //La sentencia a ejecutar
        $sql = "SELECT * FROM vehiculos WHERE destacado='1' ORDER BY orden ASC";
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

	function buscarVehiculosCategoria($rr) {
        //Le deciamos que la locacion es lenguaje espa�ol
        setlocale(LC_CTYPE, 'es');
        //La sentencia a ejecutar
        $sql = "SELECT * FROM vehiculos WHERE id_cat=$rr ORDER BY orden ASC";
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

	function buscarVehiculosTodos() {
        //Le deciamos que la locacion es lenguaje espa�ol
        setlocale(LC_CTYPE, 'es');
        //La sentencia a ejecutar
        $sql = "SELECT * FROM vehiculos ORDER BY orden ASC";
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

	function buscarVehiculosSubcategoria($rr) {
        //Le deciamos que la locacion es lenguaje espa�ol
        setlocale(LC_CTYPE, 'es');
        //La sentencia a ejecutar
        $sql = "SELECT * FROM vehiculos WHERE id_sub=$rr ORDER BY orden ASC";
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


	function insertarVenta() {
        $rpta;
        try {
            //Creamos un objeto de la clase conexion
            $miconexion = new Conexion();
            //Obtenemos la conexion
            $cn = $miconexion->conectar();
            //Comenzamos la transaccion
            mysql_query("BEGIN", $cn);

            //Obtenemos el codigo del siguiente producto
            //Elaboramos la sentencia
 			$sql = "INSERT INTO consulta VALUES(NULL, '$this->nombre', '$this->email', '$this->id','$this->codigo','$this->titulo','$this->solicitud','$this->fecha')";            //Ejecutamos la sentencia
            $result = mysql_query($sql, $cn)  or die( "Error en 	consulta: " . mysql_error() );
            if (!$result) {
                //Si no obtiene resultados anulamos la transaccion
                mysql_query("ROLLBACK", $cn);
                $rpta = false;
            } else {
                //Si obtiene resultados confirmamos la transaccion
                mysql_query("COMMIT", $cn);
                $rpta = true;
            }
            //Cerramos la conexion
            mysql_close($cn);
        } catch (exception $e) {
            try {
                mysql_query("ROLLBACK", $cn);
            } catch (exception $e1) {

            }
            try {
                mysql_close($cn);
            } catch (exception $e1) {

            }
            $rpta = false;
        }
        return $rpta;
    }

	function insertarContacto() {
        $rpta;
        try {
            //Creamos un objeto de la clase conexion
            $miconexion = new Conexion();
            //Obtenemos la conexion
            $cn = $miconexion->conectar();
            //Comenzamos la transaccion
            mysql_query("BEGIN", $cn);

            //Obtenemos el codigo del siguiente producto
            //Elaboramos la sentencia
 			$sql = "INSERT INTO contacto VALUES(NULL, '$this->nombre', '$this->email', '$this->empresa','$this->telefono','$this->solicitud','$this->fecha')";            //Ejecutamos la sentencia
            $result = mysql_query($sql, $cn)  or die( "Error en 	consulta: " . mysql_error() );
            if (!$result) {
                //Si no obtiene resultados anulamos la transaccion
                mysql_query("ROLLBACK", $cn);
                $rpta = false;
            } else {
                //Si obtiene resultados confirmamos la transaccion
                mysql_query("COMMIT", $cn);
                $rpta = true;
            }
            //Cerramos la conexion
            mysql_close($cn);
        } catch (exception $e) {
            try {
                mysql_query("ROLLBACK", $cn);
            } catch (exception $e1) {

            }
            try {
                mysql_close($cn);
            } catch (exception $e1) {

            }
            $rpta = false;
        }
        return $rpta;
    }

	function insertarLanding() {
        $rpta;
        try {
            //Creamos un objeto de la clase conexion
            $miconexion = new Conexion();
            //Obtenemos la conexion
            $cn = $miconexion->conectar();
            //Comenzamos la transaccion
            mysql_query("BEGIN", $cn);

            //Obtenemos el codigo del siguiente producto
            //Elaboramos la sentencia
 			$sql = "INSERT INTO landing VALUES(NULL, '$this->nombre', '$this->email', '$this->fecha')";            //Ejecutamos la sentencia
            $result = mysql_query($sql, $cn)  or die( "Error en 	consulta: " . mysql_error() );
            if (!$result) {
                //Si no obtiene resultados anulamos la transaccion
                mysql_query("ROLLBACK", $cn);
                $rpta = false;
            } else {
                //Si obtiene resultados confirmamos la transaccion
                mysql_query("COMMIT", $cn);
                $rpta = true;
            }
            //Cerramos la conexion
            mysql_close($cn);
        } catch (exception $e) {
            try {
                mysql_query("ROLLBACK", $cn);
            } catch (exception $e1) {

            }
            try {
                mysql_close($cn);
            } catch (exception $e1) {

            }
            $rpta = false;
        }
        return $rpta;
    }








	function setNombre($nombre) {
    	$this->nombre = $nombre;
    }

	function setEmail($email) {
    	$this->email = $email;
    }

	function setEmpresa($empresa) {
    	$this->empresa = $empresa;
    }

	function setTelefono($telefono) {
    	$this->telefono = $telefono;
    }




	function setId($id) {
    	$this->id = $id;
    }
	function setCodigo($codigo) {
    	$this->codigo = $codigo;
    }

	function setTitulo($titulo) {
    	$this->titulo = $titulo;
    }

	function setSolicitud($solicitud) {
    	$this->solicitud = $solicitud;
    }

	function setFecha($fecha) {
    	$this->fecha = $fecha;
    }




	}
	?>
