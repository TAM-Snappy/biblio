<?php
$manga = $_GET['manga'];


$dir = $manga . '/';
$tab = array();

$tab_url = explode('/',$manga);
$nom_manga = $tab_url[count($tab_url)-1];
echo '<center><H1>'.$nom_manga.'</H1></center></br>'; 

if($dossier = opendir($dir))//On ouvre le dossier souhaité avec la fonction opendir(), eton stock le résultat dans la variable $dossier
{


    while(false !== ($fichier = readdir($dossier))) //On une boucle avec While, et avec la fonction readdir on lis ce que contient la variable 'dossier' ( false !== vérifie que la lecture du dossier n'a pas retourné d'erreur.)
    {
        if($fichier != '.' && $fichier != '..')
        {
			$acces = $dir.$fichier;
            $tab[]=$acces;
        }

    } //On termine la boucle
    closedir($dossier);


	sort($tab);
	foreach($tab as $euma){
		echo '<center><img src="'.$euma.'" /></center></br>';
	}

	echo '<center><a href="tome.php?manga='.$tab_url[1].'" style="margin-right:30px">retour</a>';
	echo '<a href="tome.php?manga='.$tab_url[1].'&amp;old_tome='.$nom_manga.'">suivant</a></center>';
}



?>
