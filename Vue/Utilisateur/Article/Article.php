<?php
require_once("../../../Model/Connexion.php");
        $base = Connection::getConnection();
        $requete = "SELECT * FROM article;";
        $etat = $base->prepare($requete);
        $etat->execute();
        $resultat = $etat->fetchAll();

        $base1 = Connection::getConnection();
        $requete1 = "SELECT * FROM demande;";
        $etat1 = $base1->prepare($requete1);
        $etat1 -> execute();
        $resultat1 = $etat1-> fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Article2</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee&amp;display=swap">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="font-family: ABeeZee, sans-serif;">
    <nav class="navbar navbar-light navbar-expand-lg navigation-clean-search" style="background: rgb(107,255,113);border-bottom-left-radius: 50px;border-top-right-radius: 0px;">
        <div class="container"><a class="navbar-brand" href="#">BIONEXX</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav">
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
                <form class="me-auto search-form" target="_self">
                    <div class="d-flex align-items-center"><label class="form-label d-flex mb-0" for="search-field"></label></div>
                </form>
                <form action="../../../Controlleur/ArticleControlleur.php" method="post"><button class="btn btn-light action-button" type="submit"name="terminer">Terminer</button>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div>
                    <?php foreach($resultat1 as $resultat1){}
                    ?>
                    <p>Formulaire des Articles</p>
                </div>
                <hr>
                <div><input type="date" name="ar_date" placeholder="Date de la demande" style="border-width: 0px;"value="<?= $resultat1['dm_dateDemande']?>">--><input type="date" name="ar_dateLiv" placeholder="Date de la demande" style="border-width: 0px;"value="<?= $resultat1['dm_dateLiv']?>"></div>
                <hr>
                <div><input type="text" name="ar_nomdem" placeholder="Votre nom" style="border-width: 0px;border-color: rgb(255,255,255);"value="<?= $resultat1['dm_nom']?>">-->Achat Numero <input type="text" name="ar_num" placeholder="Votre nom" style="border-width: 0px;border-color: rgb(255,255,255);"value="<?= $resultat1['dm_id']?>"></div>
                <hr>
                <div><input type="text" name="ar_article" placeholder="Votre Article"></div>
                <hr>
                <div><input type="text" name="ar_qte" placeholder="La quantite"></div>
                <hr><button class="btn btn-primary d-lg-flex" type="submit" style="border-radius: 57px;">Ajouter une Article</button>
            </div>
            <?php ?>
            <div class="col">
                <?php foreach($resultat as $resultat){}?>
                    <table>
                        <tr>
                            <td><?= $resultat['ar_article']?></td>
                            <td><?= $resultat['ar_qte']?></td>
                        </tr>
                    </table>
                    <?php ?>
            </div>
        </div>
    </div>
    
                </form>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="button.js"></script>
</body>

</html>