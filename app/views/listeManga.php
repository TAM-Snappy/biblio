<?php

$contents='<strong>'. $data['nb_manga'] .'</strong> manga disponibles <input type="text" id="search-manga" onkeyup="searchManga(\'ul-manga\', \'card\')" placeholder="Rechercher nom manga"></br></br> <br><div id="ul-manga" class="ul-manga"> ';

$contents.='';

foreach($data['tab_nom_manga'] as $nom_manga){
    //$contents.='<li><a href="/biblio_manga/biblio/public/manga/titre/'.$nom_manga.'" >'.$nom_manga.'</a></li>';
    $contents.='<div class="card">
                    <img src="/biblio_manga/biblio/public/images/card-logo.jpg" class="image-manga">
                    <div class="container">
                        <a class="a" href="/biblio_manga/biblio/public/manga/titre/'.$nom_manga.'" ><h4>'.$nom_manga.'</h4></a>
                    </div>
                </div>';
}

$contents.='</div>';
require_once('gabarit.php');
