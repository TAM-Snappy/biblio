<!DOCTYPE html> 
<html lang="fr" xml:lang="fr" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- meta tags shared website -->
        <meta name="author" content="CHEVALIER Thomas">

        <link rel="stylesheet" href="/biblio_manga/biblio/public/css/style.css">

        <link rel="icon" type="image/x-icon" href="favicon.png" />
        <title>Biblio Roro</title>
    </head>

    <body>

        <h1>LA BIBLIO DE RORO</h1>

        <?php 

            echo '<a href="/biblio_manga/biblio/public/">Accueil</a>&nbsp;';
            echo '<a href="javascript:history.back()">Retour</a>&nbsp;';
            if(isset($data['nom_manga']) && isset($data['nom_tome'])){
                echo '<a href="/biblio_manga/biblio/public/manga/tomesuivant/'.$data['nom_manga'].'/'.$data['nom_tome'].'" >Suivant</a>';
            }

            echo '</br></br>';
        ?>

        <div id="page">

            <?php echo $contents; ?>
            
        </div>

        <script src="/biblio_manga/biblio/public/js/index.js"></script>

        <?php 
            if(isset($data['nom_manga']) && isset($data['nom_tome'])){
                echo '<script>redimImage()</script>';
            }
        ?>
        
	</body>
</html>