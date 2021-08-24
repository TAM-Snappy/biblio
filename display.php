<?php
$manga = $_GET['manga'];


$dir = 'temp/' . $manga . '/';
$tab = array();


if($dossier = opendir($dir))//On ouvre le dossier souhaité avec la fonction opendir(), eton stock le résultat dans la variable $dossier
{


    while(false !== ($fichier = readdir($dossier))) //On une boucle avec While, et avec la fonction readdir on lis ce que contient la variable 'dossier' ( false !== vérifie que la lecture du dossier n'a pas retourné d'erreur.)
    {
        if($fichier != '.' && $fichier != '..' && $fichier != 'index.php')
        {
            echo '<center><H1>'.$fichier.'</H1></br></center>'; 
            


			if($dossiermanga = opendir($dir.'/'.$fichier))//On ouvre le dossier souhaité avec la fonction opendir(), eton stock le résultat dans la variable $dossier
			{

          			while(false !== ($image = readdir($dossiermanga))) //On une boucle avec While, et avec la fonction readdir on lis ce que contient la variable 'dossier' ( false !== vérifie que la lecture du dossier n'a pas retourné d'erreur.)
    				{
        				if($image != '.' && $image != '..' && $image != 'index.php')
        				{
					
					$acces = $dir.'/'.$fichier.'/'.$image;
            				$tab[]=$acces;
					echo $acces;
					
					}
				}
			closedir($dossiermanga);
			}



        } //On ferme le if (qui permet de ne pas afficher index.php, etc.)

    } //On termine la boucle


    closedir($dossier);
sort($tab);
foreach($tab as $euma){
echo '<center><img src="'.$euma.'" /></center></br>';
}

}

?>
