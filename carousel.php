<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Carousel</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php
                $CheminDossierImages="./diffus";
                $scandir = scandir($CheminDossierImages);
                //variable permettant d'enregistrer les images dans un tableau (array)
                $images=[];
                $Nbr=0;
                foreach($scandir as $cle => $fichier){
                    $fichier=strtolower($fichier);
                    //Lister toutes images ayant les extensions jpg, jpeg, png, gif et bmp
                    if(preg_match("#\.(jpg|jpeg|png|gif|bmp)$#",$fichier)){
                        //on passe tout le nom du fichier en caractères minuscules, y compris l'extension
                        //la preg_match définie: \.(jpg|jpeg|png|gif|bmp|tif)$
                        //commence par un point (.) (doit être échappé avec anti-slash \ car le point veut dire "tous les caractères" sinon)
                        //(|) parenthèses avec des barres obliques dit "ou" (plusieurs possibilités)
                        //le $ dit que ce doit se trouver à la fin du nom du fichier, par exemple un fichier nommé "monFichier.jpg.php" ne sera pas accepté car il ne se termine pas par .jpg, ou .jpeg ou .png ou...
                        $Nbr++;
                        $images[$Nbr]=$fichier;
                    }
                }
                //print_r ($images);
                //echo ($Nbr);
                if ($Nbr >1) {
                $isFirst = true;
                //var_dump ($isFirst);
                foreach($images as $image => $affichage){
                    ?>
                        <div class="carousel-item<?php echo($isFirst ? ' active' : '') ?>" data-interval="10000">
                            <img src="<?php echo($CheminDossierImages.'/'.$affichage)?>" class="d-block w-100">
                        </div>
                    <?php
                    //echo ($CheminDossierImages);
                    //echo ($CheminDossierImages.'/'.$affichage);
                    //echo ($isFirst ? ' active' : '' );
                    $isFirst = false;
                    //var_dump($isFirst);
                    }
                }
                    ?>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>