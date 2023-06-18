<?php
require_once("../../../Model/Connexion.php");

        $base = Connection::getConnection();
        $requete = "SELECT * FROM demande;";
        $etat = $base->prepare($requete);
        $etat->execute();
        $resultat = $etat->fetchAll();

        $base1 = Connection::getConnection();
        $requete1 = "SELECT * FROM article;";
        $etat1 = $base1->prepare($requete1);
        $etat1->execute();
        $resultat1 = $etat1->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>BoiteMessage</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="font-family: ABeeZee, sans-serif;">
    <nav class="navbar navbar-light navbar-expand-lg navigation-clean-search" data-aos="fade-down" data-aos-duration="350" style="background: rgb(66,255,142);border-width: 0px;border-radius: 0px;border-bottom-left-radius: 65px;border-bottom-right-radius: 65px;">
        <div class="container"><a class="navbar-brand" href="#">BIONEXX</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="../Requete/NomFournisseur.php" style="color: rgb(0,0,0);"><i class="fa fa-foursquare"></i>Fournisseur</a></li>
                    <li class="nav-item"><a class="nav-link" href="../Requete/Comparaison.php" style="color: rgb(0,0,0);"><i class="fa fa-compress"></i>Comparaison</a></li>
                    <li class="nav-item"><a class="nav-link" href="ListDem.php" style="color: rgb(0,0,0);"><i class="fa fa-users"></i>Liste des Demandeur</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../../Mail/Mail.php" style="color: rgb(0,0,0);">Email</a></li>
                    <li class="nav-item"><a class="nav-link" href="../Requete/Bc.php" style="color: rgb(0,0,0);"><i class="fas fa-expand"></i>Bon de commande</a></li>
                </ul>
                <form class="me-auto search-form" target="_self">
                    <div class="d-flex align-items-center"></div>
                </form><form action="../../../Controlleur/GenerateurDmControlleur.php" method="post"><button class="btn btn-primary" data-bss-hover-animate="rubberBand" type="submit" style="background: rgb(254,154,62);border-radius: 50px;" name="donwdem">Telecharger</button></form>
            </div>
        </div>
    </nav>
    
    <p class="text-center" style="font-family: ABeeZee, sans-serif;font-size: 30px;">Boite de Reception</p>
    <div class="table-responsive" style="border-radius: 0px;border-width: 0px;background: #b3ffb6;border-bottom-left-radius: 30px;">
        <table class="table" border="1px">
            <thead>
                <tr>
                    <th>Numero d'achat</th>
                    <th>Nom-demandeur</th>
                    <th>Date de la demande</th>
                    <th>Département</th>
                    <th>Type d'article</th>
                    <th>Priorité</th>
                    <th>Date de Livraison</th>
                </tr>
            </thead>
            <?php foreach($resultat as $resultat):?>
                <form action="../../../Controlleur/Comparaison/ComparaisonControlleur.php" method="post">
            <tbody>
                <tr>
                    <td>Numero <?=$resultat['dm_id']?></td>
                    <td><i class="fa fa-user-plus"></i><input type="text" style="background: #b3ffb6;border-width: 0px;" name="ar_nomdem"value="<?= $resultat['dm_nom']?>"></td>
                    <td><i class="fa fa-calendar-times-o"></i><input type="text" style="background: #b3ffb6;border-width: 0px;" name="ar_date"value="<?= $resultat['dm_dateDemande']?>"></td>
                    <td><i class="fas fa-expand"></i><?= $resultat['dm_departement']?></td>
                    <td><i class="far fa-plus-square"></i><?= $resultat['dm_typeArticle']?><button class="btn btn-primary" data-bss-hover-animate="rubberBand" type="submit" style="background: rgb(254,154,62);border-radius: 50px;" name="voir">Prospection</button>
                    <td><?= $resultat['dm_prioriter']?></td>
                    <td><input type="text" style="background: #b3ffb6;border-width: 0px;" name="ar_dateLiv"value="<?= $resultat['dm_dateLiv']?>"></td>
            </tr>
            
            </tbody>
            </form>
            <?php endforeach;?>
        </table>
    </div>
    <script src="button.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
</body>

</html>