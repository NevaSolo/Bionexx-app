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
    <title>Alerte</title>
    <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee&amp;display=swap">
    <link rel="stylesheet" href="assets2/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets2/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets2/css/styles.css">
</head>

<body style="font-family: ABeeZee, sans-serif;">
    <nav class="navbar navbar-light navbar-expand-lg navigation-clean-search" style="background: var(--bs-secondary);color: var(--bs-white);border-bottom-left-radius: 43px;">
        <div class="container"><a class="navbar-brand" href="#">BIONEXX</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="#" style="color: var(--bs-white);"><i class="fa fa-foursquare"></i>Fournisseur</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" style="color: var(--bs-gray-100);"><i class="fa fa-chain"></i>Comparaison</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" style="color: var(--bs-gray-100);"><i class="fa fa-list-ul"></i>Liste des demandeur</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" style="color: var(--bs-gray-100);"><i class="fa fa-envelope-o"></i>Email</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#" style="color: var(--bs-gray-100);"><i class="fa fa-warning"></i>Alerter Les demandes</a></li>
                </ul>
                <form class="me-auto search-form" target="_self">
                    <div class="d-flex align-items-center"><label class="form-label d-flex mb-0" for="search-field"></label></div>
                </form>
            </div>
        </div>
    </nav>
    <div class="text-center">
        <p class="lead">Les demandes</p>
    </div>
    <div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Numero D'achat</th>
                        <th>Demande</th>
                        <th>Date de la demande</th>
                        <th>Département</th>
                        <th>Type Article</th>
                        <th>Priorité</th>
                        <th>Date de livraison</th>
                        <th>Situation</th>
                    </tr>
                </thead>
                <?php foreach($resultat as $resultat):?>
                <form action="../../../Controlleur/SituationControlleur.php" method="post">
                <tbody>
                    <tr>
                        <td><?=$resultat['dm_id']?></td>
                        <td><input type="text" style="background: rgb(255, 255, 255);border-width: 0px;" name="s_nom"value="<?= $resultat['dm_nom']?>"></td>
                        <td><input type="text" style="border-width: 0px;" name="s_dateDemande"value=" <?=$resultat['dm_dateDemande']?>"></td>
                        <td><?= $resultat['dm_departement']?></td>
                        <td><input type="text" style="border-width: 0px;" name="s_typeArticle"value=" <?=$resultat['dm_typeArticle']?>"></td>
                        <td><?= $resultat['dm_prioriter']?></td>
                        <td><input type="text" style="border-width: 0px;" name="s_dateLiv"value="<?= $resultat['dm_dateLiv']?>"></td>
                        <td>
                        <input type="radio" style="border-width: 0px;" name="s_situation"value="Achat">Achat
                        <input type="radio" style="border-width: 0px;" name="s_situation"value="BC">BC
                        <input type="radio" style="border-width: 0px;" name="s_situation"value="Livrer">Livrer
                            <div><button class="btn btn-primary" type="submit"name="achat">Alerter</button></div>
                        </td>
                    </tr>
                    <tr></tr>
                </tbody>
                </form>
                <?php endforeach;?>
            </table>
        </div>
    </div>
    <script src="assets2/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>