
<?php
require_once("../Model/Connexion.php");
$base = Connection::getConnection();
$requete = "SELECT * FROM boncommande;";
$etat = $base->prepare($requete);
$etat->execute();
$resultat = $etat->fetchAll();


$requete1 = "SELECT * FROM fournisseur";
$etat1 = $base->prepare($requete1);
$etat1->execute();
$resultat1 = $etat1->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>BC (copy)</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<?php
foreach($resultat as $res):
?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div>
                    <picture><img class="img-fluid" src="assets/img/Bionexx.jpg" style="width: 150px;"></picture>
                    <div>
                        <div class="card">
                            <div class="card-header">
                                <p style="font-weight: bold;">BIONEXX S.A</p>
                                <div><label class="form-label">Tana Water Front</label></div>
                                <div><label class="form-label">(inject Building 2nd Floor)</label></div>
                                <div><label class="form-label">Ambodivona</label></div>
                                <div><label class="form-label">101 Antananarivo</label></div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr style="background: rgb(255,255,255);">
                <div>
                    <div class="card">
                        <div class="card-header">
                            <div><label class="form-label" style="font-weight: bold;">Gestionnaire:<?=$res['bc_gestionnaire']?></label></div>
                            <div><label class="form-label" style="font-weight: bold;">N Eb:<?=$res['bc_eb']?></label></div>
                            <div><label class="form-label" style="font-weight: bold;">Demandeur:<?=$res['bc_demandeur']?></label></div>
                            <div><label class="form-label" style="font-weight: bold;">Affectation:<?=$res['bc_affectation']?></label></div>
                            <div><label class="form-label" style="font-weight: bold;">Date de Livraison:<?=$res['bc_dateLiv']?></label></div>
                            <div><label class="form-label" style="font-weight: bold;">Type d'achat:<?=$res['bc_achat']?></label></div>
                            <div><label class="form-label" style="font-weight: bold;">Incoterm:<?=$res['bc_incoterm']?></label></div>
                            <div><label class="form-label" style="font-weight: bold;">Mode expédition:<?=$res['bc_modeExp']?></label></div>
                            <div><label class="form-label" style="font-weight: bold;">Délai de disponibilité:<?=$res['bc_delai']?></label></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <p class="lead text-start" style="font-size: 36px;">Bon de commande</p>
                </div>
                <div>
                    <p class="lead text-start" style="font-size: 20px;font-weight: bold;">en US$</p>
                </div>
                <div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead style="border-color: rgb(255,255,255);">
                                <tr>
                                    <th style="border-width: 0px;background: #ebebeb;border-radius: 24px;">N BC</th>
                                    <th style="border-width: 0px;border-radius: 24px;background: #ebebeb;">N INVEST</th>
                                    <th style="border-width: 0px;background: #ebebeb;border-radius: 24px;">CODE D'AFFAIRE</th>
                                </tr>
                            </thead>
                            <tbody style="border-width: 0px;">
                                <tr>
                                    <td style="border-width: 0px;"><?=$res['bc_num']?></td>
                                    <td style="border-width: 0px;"><?=$res['bc_invest']?></td>
                                    <td style="border-width: 0px;"><?=$res['bc_code']?></td>
                                    <td style="border-width: 0px;"></td>
                                </tr>
                                <tr></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div><label class="form-label">Date:<?=$res['bc_date']?></label></div>
                <div>
                    <div class="card">
                        <div class="card-header">
                            <p><?=$res['bc_fournisseur']?></p>
                            <div>
                                <p><br>Immeuble Lam Seck<br>Ampasambazaha RN7<br>301 Fianarantsoa<br>nralaza.trading@gmarl.com<br>NIF<br><br></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr style="height: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead style="border-radius: 0px;">
                            <tr style="background: #ebebeb;border-radius: 0px;">
                                <th style="border-width: 0px;">Référence</th>
                                <th>Reference fournisseur</th>
                                <th>Désignation</th>
                                <th><br>N' et date de la DA<br></th>
                                <th>Quantité</th>
                                <th>Unité</th>
                                <th>Prix unitaire</th>
                                <th>Prix totale</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach;?>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>