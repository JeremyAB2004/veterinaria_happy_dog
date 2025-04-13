<?php

class ControllerTemplate {

	static public function ctrTemplate(){

		include "views/template.php";

	}

	public function urlWhatsAppCorporativo(){

		return "https://wa.me/+50672254473";
	}

	/*========================================
	Ruta Principal o dominio del sitio
	========================================*/

	static public function path($local){

		if($local == 1){

			if(!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])){

				return "https://localhost/veterinaria_happy_dog/"; //pruebas para facebook
	
			}else{
	
				return "localhost/veterinaria_happy_dog/"; //local
	
			}

		}

		

	}

	/*=============================================
	Función Limpiar HTML
	=============================================*/	

	static public function htmlClean($code){

		$search = array('/\>[^\S ]+/s','/[^\S ]+\</s','/(\s)+/s');

		$replace = array('>','<','\\1');

		$code = preg_replace($search, $replace, $code);

		$code = str_replace("> <", "><", $code);

		return $code;

	}

}