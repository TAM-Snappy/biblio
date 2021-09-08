<?php 

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

$manga = $_GET['manga'];
$tome = $_GET['tome'];
// var_dump($manga,$tome);
// die('e');

$cb = 'manga/' . $manga . '/' . $tome ;

$tome = explode('.',$tome)[0]; // supp l'extension
$mkdir = 'temp/' . $manga . '/' . $tome; 



$zip = new ZipArchive;
$res = $zip->open($cb);
if ($res === TRUE) {
    mkdir("$mkdir");

    $zip->extractTo($mkdir . '/');
    $zip->close();

}

header("Location: display.php?manga=$mkdir");

?>






