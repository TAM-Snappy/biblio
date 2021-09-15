<?php

require_once('static/function.php');
require_once('views/view.php');

function ctlHome(){
    $nb_fichier = 0;
    $tab_nom_manga = array();

    //On ouvre le dossier souhaité avec la fonction opendir(), et on stock le résultat dans la variable $dossier
    if($dossier = opendir('static/manga/')){ 

        //On une boucle avec While, et avec la fonction readdir on lis ce que contient la variable 'dossier' ( false !== vérifie que la lecture du dossier n'a pas retourné d'erreur.)
        while(false !== ($fichier = readdir($dossier))) {
            if($fichier != '.' && $fichier != '..'){
                $nb_fichier++; 
                $tab_nom_manga[]=$fichier;
            }
            
        }
    }

	displayHome($nb_fichier, $tab_nom_manga);
}

function ctlManga($manga){
    checkNom($manga);


    $old_tome = '';
    if(isset($_GET['old_tome'])){
        $old_tome = $_GET['old_tome'];
    }

    $nb_fichier = 0; //On crée la variable $nb_fichier que l'on incrémentera à chaque nouveau fichier
    echo '<ul>';
    $tab = array();

    if($dossier = opendir('static/manga/' . $manga))//On ouvre le dossier souhaité avec la fonction opendir(), eton stock le résultat dans la variable $dossier
    {


        while(false !== ($fichier = readdir($dossier)))//On une boucle avec While, et avec la fonction readdir on lis ce que contient la variable 'dossier' ( false !== vérifie que la lecture du dossier n'a pas retourné d'erreur.)
        {
            if($fichier != '.' && $fichier != '..' && $fichier != 'index.php')
            {
                    $nb_fichier++; //On incrémente le compteur qui vaut +1
                    $tab[]=$fichier;

            } //On ferme le if (qui permet de ne pas afficher index.php, etc.)

        } //On termine la boucle
        closedir($dossier);

        echo '</ul><br />';
        echo '<strong>' . $nb_fichier .'</strong> tome(s) disponible(s)';

        $is_next_tome = false;
        $euma_ext = explode('.',$tab[0])[1];
        sort($tab);
        foreach($tab as $euma){
            
            $euma_tome = explode('.',$euma)[0];
            if($old_tome == $euma_tome){
                $is_next_tome = true;
            }
            echo '<li><a href="index.php?tome=' . $euma .'&amp;manga=' . $manga .'">' . $euma . '</a></li>';
            if($is_next_tome){
                $ma = $manga;
                header("Location: index.php?tome=".$euma."&;manga=".$ma);
            }
        }

    }


    else echo 'Le dossier n\' a pas pu être ouvert';


}

function ctlTome($manga,$tome){

    checkNom($manga);
    checkNom($tome);

    echo 'ok';  

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
}