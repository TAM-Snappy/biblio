<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

session_cache_limiter('private_no_expire, must-revalidate');
session_start();

require_once('controllers/controller.php');

try {

	if(isset($_GET['tome']) && isset($_GET['manga'])){
		$manga = htmlspecialchars($_GET['manga']);
		$tome = htmlspecialchars($_GET['tome']);
		ctlTome($manga,$tome);
	}
	elseif(isset($_GET['manga'])){
		$manga = htmlspecialchars($_GET['manga']);
		ctlManga($manga);
	}
	else ctlHome(); 

	
}catch (Exception $e) {    $errorMessage = $e->getMessage();    ctlError($errorMessage);}