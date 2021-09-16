<?php

$contents='<h3>'.$data['nom_manga'].' : '.$data['nom_tome'].'</h3></br>';

$contents.='<a href="/biblio_manga/biblio/public/manga/tomesuivant/'.$data['nom_manga'].'/'.$data['nom_tome'].'" >Suivant</a></br></br>';

foreach($data['tab_image_tome'] as $image){
    $contents.= '<img src="/biblio_manga/biblio/public/'.$image.'" /></br>';
}

require_once('gabarit.php');
