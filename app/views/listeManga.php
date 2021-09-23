<?php

$contents='<strong>'. $data['nb_manga'] .'</strong> manga disponibles <input type="text" id="search-manga" onkeyup="searchManga(\'ul-manga\', \'li\')" placeholder="Rechercher nom manga"></br><ul id="ul-manga" class="ul-manga"> ';

$contents.='';

foreach($data['tab_nom_manga'] as $nom_manga){
    $contents.='<li class="li"><a href="/biblio_manga/biblio/public/manga/titre/'.$nom_manga.'" >'.$nom_manga.'</a></li>';
}

$contents.='</ul>';
require_once('gabarit.php');
