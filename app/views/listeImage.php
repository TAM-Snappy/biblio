<?php

$contents='<h3>'.$data['nom_manga'].'</h3></br>';

foreach($data['tab_image_tome'] as $image){
    $contents.= '<img src="../../../'.$image.'" /></br>';
}

require_once('gabarit.php');
