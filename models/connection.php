<?php

class Connection{

	static public function connect(){

		$link = new PDO("mysql:host=localhost;dbname=veterinaria_happy_dog",
			            "root",
			            "");

		$link->exec("set names utf8");

		return $link;

	}
}