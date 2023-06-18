<?php
require_once("../../../Model/Connexion.php");
$base = Connection::getConnection();
$requete = "SELECT * FROM demandeur;";
$etat = $base->prepare($requete);
$etat->execute();
$resultat = $etat->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ListeDem</title>
    <link rel="stylesheet" href="assets1/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee&amp;display=swap">
    <link rel="stylesheet" href="assets1/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets1/css/styles.css">
</head>

<body style="font-family: ABeeZee, sans-serif;">
    <nav class="navbar navbar-light navbar-expand-lg navigation-clean-search" style="background: rgb(141,165,254);border-bottom-left-radius: 60px;">
        <div class="container"><a class="navbar-brand" href="#">BIONEXX</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="../Requete/NomFournisseur.php">Fournisseur</a></li>
                    <li class="nav-item"><a class="nav-link" href="../Requete/Comparaison.php">Comparaison</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Liste des demandeurs</a></li>
                </ul>
                <form class="me-auto search-form" target="_self">
                    <div class="d-flex align-items-center"><label class="form-label d-flex mb-0" for="search-field"></label></div>
                </form><form action="../../../Controlleur/GenerateurDemControlleur.php" method="post"><button class="btn btn-primary" data-bss-hover-animate="rubberBand" type="submit" style="background: rgb(254,154,62);border-radius: 50px;" name="donwdm">Telecharger</button></form>
            </div>
        </div>
    </nav>
    <p class="lead text-center">Liste des demandeurs</p>
    <div class="table-responsive" style="background: rgb(141,165,254);border-bottom-left-radius: 35px;">
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                </tr>
            </thead>
            <?php foreach($resultat as $resultat):?>
            <tbody>
                <tr>
                    <td><?=$resultat['dem_nom']?></td>
                    <td><?=$resultat['dem_email']?></td>
                </tr>
            </tbody>
            <?php endforeach;?>
        </table>
    </div>
    <script src="assets1/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>