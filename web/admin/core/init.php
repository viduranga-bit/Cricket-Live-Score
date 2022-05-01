<?php
ob_start();

session_start();

define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'live_score');

spl_autoload_register(function($class_name) {
	require $_SERVER['DOCUMENT_ROOT'] . '/CSEKU_SDP_2017_ScoreUpdate/web/admin/libs/' . $class_name . '.php';
});
?>