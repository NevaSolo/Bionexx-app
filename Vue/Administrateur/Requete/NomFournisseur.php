<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Fournisseur</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <section class="contact-clean">
        <form method="post"action="../../../Controlleur/NomFControlleur.php">
            <h2 class="text-center">Ajout du fournisseurs</h2>
            <div class="mb-3"><input class="form-control" type="text" name="nom_f" placeholder="Nom du fournisseur"></div>
            <div class="mb-3"><input class="form-control" type="text" name="modePay_f" placeholder="Mode de payement"></div>
            <div class="mb-3"><input class="form-control" type="text" name="echeance_f" placeholder="Echeance"></div>
            <div class="mb-3"><button class="btn btn-primary" type="submit">Passer a l'article</button></div>
        </form>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>