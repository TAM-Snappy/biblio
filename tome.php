<?php

$old_tome = '';
if(isset($_GET['old_tome'])){
    $old_tome = $_GET['old_tome'];
}

$nb_fichier = 0; //On crée la variable $nb_fichier que l'on incrémentera à chaque nouveau fichier
echo '<ul>';
$tab = array();

if($dossier = opendir('manga/' . $_GET['manga']))//On ouvre le dossier souhaité avec la fonction opendir(), eton stock le résultat dans la variable $dossier
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
        echo '<li><a href="script.php?tome=' . $euma .'&amp;manga=' . $_GET['manga'] .'">' . $euma . '</a></li>';
        if($is_next_tome){
            $ma = $_GET['manga'];
            header("Location: script.php?tome=".$euma."&;manga=".$ma);
        }
    }

}


else
     echo 'Le dossier n\' a pas pu être ouvert';
?>
