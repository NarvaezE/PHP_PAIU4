<?php  
	session_start();
	
	if (!isset( $_SESSION['super_token'] )) {
		
		$_SESSION['super_token'] = md5( uniqid( mt_rand(), true ) );
	}

	if (!defined('BASE_PATH')) {
		
		define('BASE_PATH','http://localhost:8888/programacionavanzadaIDSTV2022/');
	}
?>