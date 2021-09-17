<?php

class Manga extends Controller
{

    private $chemin_manga = '../static/manga/';
    private $chemin_temp = '../static/temp/';

    public function index(){

        $nb_manga = 0;
        $tab_nom_manga = array();
    
        //On ouvre le dossier souhaité avec la fonction opendir(), et on stock le résultat dans la variable $dossier
        if($dossier = opendir($this->chemin_manga)){ 
    
            //On une boucle avec While, et avec la fonction readdir on lis ce que contient la variable 'dossier' ( false !== vérifie que la lecture du dossier n'a pas retourné d'erreur.)
            while(false !== ($fichier = readdir($dossier))) {
                if($fichier != '.' && $fichier != '..'){
                    $nb_manga++; 
                    $tab_nom_manga[]=$fichier;
                }
                
            }
            closedir($dossier);
        }

        sort($tab_nom_manga);

        $this->view('listeManga', ['nb_manga' => $nb_manga, 'tab_nom_manga' => $tab_nom_manga]); 
    }

    public function titre($nom_manga = ''){

        $nb_tome = 0; //On crée la variable $nb_fichier que l'on incrémentera à chaque nouveau fichier
        $tab_nom_tome = array();

        //On ouvre le dossier souhaité avec la fonction opendir(), eton stock le résultat dans la variable $dossier
        if($dossier = opendir($this->chemin_manga . $nom_manga)){

            while(false !== ($fichier = readdir($dossier))){
                if($fichier != '.' && $fichier != '..' && $fichier != 'index.php')
                {
                        $nb_tome++; //On incrémente le compteur qui vaut +1
                        $tab_nom_tome[]=$fichier;

                } //On ferme le if (qui permet de ne pas afficher index.php, etc.)

            } //On termine la boucle
            closedir($dossier);

            sort($tab_nom_tome);

            $this->view('listeTome', ['nom_manga' => $nom_manga, 'nb_tome' => $nb_tome, 'tab_nom_tome' => $tab_nom_tome]);
        }
        else{
            echo "Erreur dans l'ouverture du dossier !";
            $this->index();
        }
    }

    public function tome($nom_manga = '', $nom_tome = ''){

        # 1) extraire les images

        $chemin_cible = $this->chemin_manga . $nom_manga . '/' . $nom_tome ;

        $nom_tome_sans_extention = explode('.',$nom_tome)[0]; // supp l'extension
        $chemin_cible_temp = $this->chemin_temp . $nom_manga . '/' . $nom_tome_sans_extention; 

        $zip = new ZipArchive;
        $resultat = $zip->open("$chemin_cible");
        if ($resultat === TRUE) {
            if(!file_exists("$chemin_cible_temp")){

                mkdir("$chemin_cible_temp");
                $zip->extractTo("$chemin_cible_temp" . '/');
            }
            $zip->close();
        }


        # 2) rassembler dans l'ordre les images

        $tab_image_tome = array();

        if($dossier = opendir($chemin_cible_temp)){
        
            while(false !== ($fichier = readdir($dossier))) {
                if($fichier != '.' && $fichier != '..')
                {
                    $tab_image_tome[]=$chemin_cible_temp.'/'.$fichier;
                }
        
            } //On termine la boucle
            closedir($dossier);
        
            sort($tab_image_tome);

            $this->view('listeImage', ['nom_manga' => $nom_manga, 'nom_tome' => $nom_tome, 'tab_image_tome' => $tab_image_tome]);
        }
        else{
            echo "Erreur dans l'ouverture du dossier des images !";
            $this->index();
        }
    }

    public function tomesuivant($nom_manga = '', $nom_tome = ''){  
        
        $tab_nom_tome = array();
        if($dossier = opendir($this->chemin_manga . $nom_manga)){

            while(false !== ($fichier = readdir($dossier))){
                if($fichier != '.' && $fichier != '..' && $fichier != 'index.php'){
                        $tab_nom_tome[]=$fichier;
                }
            }
            closedir($dossier);

            sort($tab_nom_tome);
        }
        else{
            echo "Erreur dans l'ouverture du dossier !";
            $this->index();
        }


        $isSuivant = false;
        $nom_tome_suivant = '';

        foreach ($tab_nom_tome as $fichier) {
            if($isSuivant){
                $nom_tome_suivant = $fichier;
                break;
            }

            if($fichier == $nom_tome){
                $isSuivant = true;
            }
        }

        // supprime ancien tome dans le temp
        $dir = $this->chemin_temp . $nom_manga . '/' . explode('.',$nom_tome)[0];
        if(is_dir($dir)){
            foreach(scandir($dir) as $file) {
                if ('.' === $file || '..' === $file) continue;
                else unlink("$dir/$file");
            }
            rmdir($dir);
        }

        if($isSuivant && $nom_tome_suivant != ''){
            // redirige vers le tome suivant
            $this->tome($nom_manga, $nom_tome_suivant);
        }
        else{
            echo "Fin des tomes de ce manga";
            $this->index();
        }
    }
}