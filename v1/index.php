<?php
require_once __DIR__.'/vendor/autoload.php';
require_once '../Config/appController.php';
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App();

$app->get('/hello/{name}', 'index');
$app->get('/{negocio}/observaciones','getObservaciones');

$app->run();


function  index (Request $request, Response $response) {
   // $result = $request->getAttribute('name');
	$response->withHeader('Content-type', 'application/json');
	//$response->getBody()->write("Hello", $result);
	
	$data = array('name' => 'Bob', 'age' => 40);
	$newResponse = $response->withJson($data);

    return $newResponse;

}

/**
 * Lista observaciones en Codigos y Descripcion.
 * @param $negocio 
 * @return array json 
 * @author Joel Vasquez Villalobos.
 * @version 11 Junio 2014
 */
function getObservaciones(Request $request, Response $response) {
	$negocio = $request->getAttribute('negocio');
	$model_observacion = loadModel('Observaciones',$negocio); //Observaciones: nombre del archivo model/observaciones.php

	$result = array();
	try {
		$arr_obj_observacion = $model_observacion->getObservacion();	
		if($arr_obj_observacion){
			$response->withHeader('Content-type', 'application/json');
			$response->withStatus(200);
			$result['success'] = true;
			$result["message"] = "Tabla Observaciones";
			$result["datos"] = $arr_obj_observacion;
			$newResponse = $response->withJson($result);

			 return $newResponse;
			//echo json_encode($result);
		}
	} catch(Exception $e) {
			$response->withHeader('Content-type', 'application/json');
			$response->withStatus(200);
			$result["success"] = false;
			$result["message"] =  $e ;
			$result["datos"] = array();
			$newResponse = $response->withJson($result);

			 return $newResponse;
			//echo json_encode($result);
	}
}

/*
*TODO:
*
*D:\Apache2\htdocs\devops\vendor\bin\phpunit --bootstrap Email.php --testdox tests  
*D:\Apache2\htdocs\devops\vendor\bin\phpunit --bootstrap Email.php tests/EmailTest
*
*/

//ejecutar:
//localhost/api/V1/index.php/plus/observaciones
?>

    
