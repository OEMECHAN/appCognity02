<?php

class Observaciones{
	
	public $negocio = '';
	
	/**
	 * Lista las observaciones
	 * @return arr_obj_observacion
	 * @version 18 April 2014
	 * @author Joel Vasquez Villalobos.
	 * @version Revisado por Geynen: 15 Octubre 2015
	 */	
	public function getObservacion(){
		$cnx = loadModel('database', $this->negocio);	
		$db = $cnx->getConnection();
		$sql = "select * from observaciones where estado=true";
		$arr_obj_observacion = mysqli_query($sql); //pg_query

		$num_rows = mysqli_num_rows($arr_obj_observacion); //pg_num_rows
		if($num_rows > 0){
			$data = array();
			while($obj_observacion=mysqli_fetch_object($arr_obj_observacion)) { //pg_fetch_object
				$data[] = $obj_observacion;
			}
			return $data;
        } else {
            return 0;
        }
	 
	}
	
}
?>
