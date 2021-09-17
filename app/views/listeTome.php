<?php

$contents='<strong>'. $data['nb_tome'] .'</strong> tome disponibles <input type="text" id="search-manga" onkeyup="searchManga(\'ul-tome\', \'li\')" placeholder="Rechercher version du tome"></br></br>  <br><ul id="ul-tome">';

foreach($data['tab_nom_tome'] as $nom_tome){
    $contents.='<li class="li"><a href="/biblio_manga/biblio/public/manga/tome/'.$data['nom_manga'].'/'.$nom_tome.'" >'.$nom_tome.'</a></li>';
}

$contents.='</ul>';
require_once('gabarit.php');
