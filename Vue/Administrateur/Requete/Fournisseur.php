<?php
require_once("../../../Model/Article.php");
require_once("../../../Model/Article.php");
$ar = new Article();
require_once("../../../Model/Connexion.php");
$base = Connection::getConnection();
$requete = "SELECT * FROM nomfournisseur;";
$etat = $base->prepare($requete);
$etat->execute();
$resultat = $etat->fetchAll();

$base1 = Connection::getConnection();
$requete1 = "SELECT * FROM Fournisseur;";
$etat1 = $base1->prepare($requete1);
$etat1->execute();
$resultat1 = $etat1->fetchAll();

$base2 = Connection::getConnection();
$requete2 = "SELECT * FROM demande;";
$etat2 = $base2->prepare($requete2);
$etat2->execute();
$resultat2 = $etat2->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>fournisseur3</title>
    <link rel="stylesheet" href="assets1/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee&amp;display=swap">
    <link rel="stylesheet" href="assets1/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets1/css/styles.css">

</head>

<body style="border-bottom-left-radius: 0px;font-family: ABeeZee, sans-serif;">
    <nav class="navbar navbar-light navbar-expand-lg navigation-clean-search" style="background: rgb(122,249,226);border-bottom-left-radius: 62px;">
        <div class="container"><a class="navbar-brand" href="#">BIONEXX</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav">
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link" href="Comparaison.php">Comparaison</a></li>
                </ul>
                <form class="me-auto search-form" target="_self">
                    <div class="d-flex align-items-center"><label class="form-label d-flex mb-0" for="search-field"></label></div>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div>
                    <p class="lead text-center" style="font-weight: bold;text-decoration:  underline;">Les Fournisseur saisi:</p>
                </div>
                <div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>nom</th>
                                    <th>Article Dispo</th>
                                    <th>Quantité</th>
                                    <th>Prix</th>
                                    <th>Totale</th>
                                </tr>
                            </thead>
                            <?php
                            foreach($resultat1 as $resultat1):
                            ?>
                            <tbody> 
                                <tr>
                                    <td><?=$resultat1['f_nom']?></td>
                                    <td><?=$resultat1['f_articleDispo']?></td>
                                    <td><?=$resultat1['f_qte']?></td>
                                    <td><?=$resultat1['f_prix']?></td>
                                    <td><?=$resultat1['f_montant']?></td>
                                    
                                </tr>
                                <tr></tr>
                            </tbody>
                            <?php endforeach;?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <p class="lead text-center" style="font-weight: bold;text-decoration:  underline;">Les Article demander:</p>
                </div>
                <div>
                    <div class="table-responsive">
                        <table class="table">
                            <?php
            if(isset($_POST['ar_nomdem'])AND isset($_POST['ar_date'])AND isset($_POST['ar_dateLiv'])){
                extract($_POST);
                $ar = new Article();
                $ar -> setArNom($ar_nomdem);
                $ar -> setArDate($ar_date);
                $ar -> setArDateLiv($ar_dateLiv);
                $ar -> voir();
            }
            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <section class="contact-clean">
                    <?php foreach($resultat as $resultat){}?>
                    <form method="post"action="../../../Controlleur/FournisseurControlleur.php">
                        <h2 class="text-center"><input class="form-control" type="text" name="f_nom" style="border-width: 0px;"value="<?= $resultat['nom_f']?>"></h2>
                        <h2 class="text-center"><input class="form-control" type="text" name="f_echeance" style="border-width: 0px;"value="<?= $resultat['echeance_f']?>"></h2>
                        <h2 class="text-center"><input class="form-control" type="text" name="f_modePay" style="border-width: 0px;"value="<?= $resultat['modePay_f']?>"></h2>
                        <div class="mb-3"><input class="form-control" type="text" name="f_articleDispo" placeholder="Article Disponible"></div>
                        <div class="mb-3"><input class="form-control" type="text" name="f_qte" placeholder="Quantite"></div>
                        <div class="mb-3"><input class="form-control" type="text" name="f_prix" placeholder="Prix"></div>
                        <div class="mb-3"><button class="btn btn-primary" type="submit" style="border-radius: 71px;background: rgb(253,145,255);">Ajouter une Article</button><a href="..\Message\Boite.php" class="btn btn-primary" style="border-radius: 46px;background: rgb(253,145,255);">terminer</a></div>
                    </form>
                </section>
            </div>
            <div class="col-md-6">
            <p class="lead text-center" style="font-weight: bold;text-decoration:  underline;">Les Demandes:</p>
            <table class="table" border="1px">
            <thead>
                <tr>
                    <th>Numero d'achat</th>
                    <th>Nom-demandeur</th>
                    <th>Date de la demande</th>
                    <th>Type d'article</th>
                    <th>Date de Livraison</th>
                </tr>
            </thead>
            <?php foreach($resultat2 as $resultat):?>
                <form action="" method="post">
            <tbody>
                <tr>
                    <td>Numero <?=$resultat['dm_id']?></td>
                    <td><i class="fa fa-user-plus"></i><input type="text" style="background: #b3ffb6;border-width: 0px;" name="ar_nomdem"value="<?= $resultat['dm_nom']?>"></td>
                    <td><i class="fa fa-calendar-times-o"></i><input type="text" style="background: #b3ffb6;border-width: 0px;" name="ar_date"value="<?= $resultat['dm_dateDemande']?>"></td>
                    <td><i class="far fa-plus-square"></i><?= $resultat['dm_typeArticle']?><button class="btn btn-primary" data-bss-hover-animate="rubberBand" type="submit" style="background: rgb(254,154,62);border-radius: 50px;" onclick="afficherTexte()">Voir</button>
                    <td><input type="text" style="background: #b3ffb6;border-width: 0px;" name="ar_dateLiv"value="<?= $resultat['dm_dateLiv']?>"></td>
            </tr>
            </tbody>
            </form>
            <?php endforeach;?>
            </table>
            </div>
        </div>
    </div>
    <script src="assets1/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>