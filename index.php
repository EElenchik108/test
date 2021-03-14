<?php
	session_start();
	require_once 'vendor/autoload.php';
	spl_autoload_register(function($class){
	require_once 'src/' . $class . '.php';
});
Libs\Route::init();
