<?php
echo '<center><h1>LA BIBLIO DE RORO</h1></center></br>';
$nb_fichier = 0; //On crée la variable $nb_fichier que l'on incrémentera à chaque nouveau fichier
echo '<ul>';
$tab = array();


if($dossier = opendir('manga/'))//On ouvre le dossier souhaité avec la fonction opendir(), eton stock le résultat dans la variable $dossier
{
          
    while(false !== ($fichier = readdir($dossier)))//On une boucle avec While, et avec la fonction readdir on lis ce que contient la variable 'dossier' ( false !== vérifie que la lecture du dossier n'a pas retourné d'erreur.)
    {
        if($fichier != '.' && $fichier != '..' && $fichier != 'index.php')
        {
            	$nb_fichier++; //On incrémente le compteur qui vaut +1
            	$tab[]=$fichier;
		//echo '<li><a href="tome.php?manga=' . $fichier .'">' . $fichier . '</a></li>';
        } //On ferme le if (qui permet de ne pas afficher index.php, etc.)
       
    } //On termine la boucle
  
    echo '</ul><br />';
    echo '<strong>' . $nb_fichier .'</strong> manga disponibles';
       
    closedir($dossier);

sort($tab);
foreach($tab as $euma){
echo '<li><a href="tome.php?manga=' . $euma .'">' . $euma . '</a></li>'; 
}
}
   
else
     echo 'Le dossier n\' a pas pu être ouvert';

?>
