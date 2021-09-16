<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

session_cache_limiter('private_no_expire, must-revalidate');
session_start();
$id_session = session_id();

require_once '../app/init.php';

$app = new App();