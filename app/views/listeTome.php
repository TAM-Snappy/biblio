<?php

$contents='<strong>'. $data['nb_tome'] .'</strong> tome disponibles <br><ul>';

foreach($data['tab_nom_tome'] as $nom_tome){
    $contents.='<li><a href="../../manga/tome/'.$data['nom_manga'].'/'.$nom_tome.'" >'.$nom_tome.'</a></li>';
}

$contents.='</ul>';
require_once('gabarit.php');
