<?php

$contents='<h3>'.$data['nom_manga'].' : '.$data['nom_tome'].'</h3></br>';

foreach($data['tab_image_tome'] as $image){
    $contents.= '<img width="520" class="myImg" src="/biblio_manga/biblio/public/'.$image.'" /></br>';
}

$contents.= '</br><a href="/biblio_manga/biblio/public/manga/tomesuivant/'.$data['nom_manga'].'/'.$data['nom_tome'].'" >Suivant</a>';

$contents.= '';

require_once('gabarit.php');
