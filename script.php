<?php 

$manga = $_GET['manga'];
$tome = $_GET['tome'];

$mkdir = 'temp/' . $manga . '/'; 
$cb = 'manga/' . $manga . '/' . $tome ;






$zip = new ZipArchive;
$res = $zip->open($cb);
if ($res === TRUE) {
    mkdir("$mkdir");

    $zip->extractTo($mkdir . '/');
    $zip->close();

}
header("Location: display.php?manga=$manga");

?>






