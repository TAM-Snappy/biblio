<?php

$contents='<strong>'. $data['nb_manga'] .'</strong> manga disponibles <br><ul class="ul-manga">';

foreach($data['tab_nom_manga'] as $nom_manga){
    //$contents.='<li><a href="/biblio_manga/biblio/public/manga/titre/'.$nom_manga.'" >'.$nom_manga.'</a></li>';
    $contents.='<div class="card">
                    <img src="/biblio_manga/biblio/public/images/card-logo.jpg" class="image-manga">
                    <div class="container">
                        <a class="a" href="/biblio_manga/biblio/public/manga/titre/'.$nom_manga.'" ><h4>'.$nom_manga.'</h4></a>
                    </div>
                </div>';
}

$contents.='</ul>';
require_once('gabarit.php');
