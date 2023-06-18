<?php
/*require_once("../../../Model/Connexion.php");
$base = Connection::getConnection();
if(isset($_POST['f_nom1'])AND isset($_POST['f_nom2'])){
    extract($_POST);
    $f_nom1 = $_POST['f_nom1'];
    $f_nom2 = $_POST['f_nom2'];/*
    $req1  = $base ->prepare('SELECT SUM(f_montant) FROM fournisseur WHERE f_nom LIKE :f_nom;');
    $req1 ->execute(['f_nom'=>$f_nom1]);
    $res1 = $req1->fetchall();

    //req2
    $req2  = $base ->prepare('SELECT SUM(f_montant) FROM fournisseur WHERE f_nom LIKE :f_nom;');
    $req2 ->execute(['f_nom'=>$f_nom2]);
    $res2 = $req2->fetchall();

    //comparaison
    if($res1 < $res2){
        echo 'RS 2 kely';
    }
        else{
            echo 'RS 2 ngeda';
        }
    }*/
   /* $query1 = $base->query('SELECT SUM(f_montant) FROM fournisseur WHERE f_nom= ?');
    $query2 = $base->query('SELECT SUM(f_montant) FROM fournisseur WHERE f_nom= ?');

// Récupération des résultats sous forme de tableaux associatifs
$results1 = $query1->fetchAll(PDO::FETCH_ASSOC);
$results2 = $query2->fetchAll(PDO::FETCH_ASSOC);
print_r($results1);
print_r($results2);
if($results1 == $results2){
    echo "egale";
}else{
    echo "tsy mitovy";
}
}*/
// Comparaison des deux tableaux associatifs
//$differences = array_diff($results1, $results2);
// Affichage des différences
//print_r($differences);
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Comparaison</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>


<body>
    <section class="contact-clean">
        <form method="post"action="../../../Controlleur/Comparaison/CompControlleur.php">
            <h2 class="text-center">Nom des Fournisseur A comparer</h2>
            <div class="mb-3"><input class="form-control" type="text" name="f_nom1" placeholder="1 ere Fournisseur"></div>
            <div class="mb-3"><input class="form-control" type="text" name="f_nom2" placeholder="2 eme Fournisseur"></div>
            <div class="mb-3"><button class="btn btn-primary" type="submit">Envoyer</button></div>
            

        </form>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>