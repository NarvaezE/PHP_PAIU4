<?php
session_start();

if (!isset($_SESSION['super_token'])) {
  $_SESSION['super_token'] = 
  
  md5(uniqid(mt_rand(), true));
}

if (!defined('BASEPATH')) {
  define('BASEPATH', 'http://localhost/PHP_PAIU4/CRUD_PHP_API/' );
}

?>