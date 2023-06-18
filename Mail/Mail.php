<?php
require_once("../Model/Connexion.php");
$base = Connection::getConnection();
$requete = "SELECT * FROM chefdepart;";
$etat = $base->prepare($requete);
$etat->execute();
$resultat = $etat->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Email2</title>
    <link rel="stylesheet" href="assets1/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets1/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets1/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg navigation-clean-search" style="background: #bebebe;border-bottom-left-radius: 43px;">
        <div class="container"><a class="navbar-brand" href="#">BIONEXX</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#">Fournisseur</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Comparaison</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Liste des demandeur</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Email</a></li>
                </ul>
                <form class="me-auto search-form" target="_self">
                    <div class="d-flex align-items-center"><label class="form-label d-flex mb-0" for="search-field"></label></div>
                </form>
            </div>
        </div>
    </nav>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Departement</th>
                    <th>Email</th>
                </tr>
            </thead>
            <?php
            foreach($resultat as $res):
            ?>
            <form action="../Controlleur/MessageControlleur.php" method="post">
            <tbody>
                <tr>
                    <td><input type="text" name="nom" style="border-width: 0px;"value="<?=$res['chef_nom']?>"></td>
                    <td><?=$res['chef_dep']?><span style="display: none;"><input type="text" name="message" style="border-width: 0px;"Value="Code reussi"></span></td>
                    <td><input type="text" name="destinataire" style="border-width: 0px;"value="<?=$res['chef_email']?>"><span style="display: none;"><input type="text" name="subject" style="border-width: 0px;"value="Departement Achat"></span><input type="submit" value="SEND"></td>
                </tr>
                <tr></tr>
            </tbody>
            </form>
            <?php
            endforeach;
            ?>
        </table>
    </div>
    <script src="assets1/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>