<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Email</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <section class="contact-clean">
        <form method="post"action="../Controlleur/MessageControlleur.php">
            <h2 class="text-center">Envoyer un E-mail</h2>
            <div class="mb-3"><input class="form-control" type="text" name="name" placeholder="Votre Nom"></div>
            <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Votre email" inputmode="email"></div>
            <div class="mb-3"><input class="form-control" type="text" name="nom" placeholder="Nom destinataire"></div>
            <div class="mb-3"><input class="form-control" type="email" name="destinataire" placeholder="Email destinataire" inputmode="email"></div>
            <div class="mb-3"><input class="form-control" type="text" name="subject" placeholder="Sujet"></div>
            <div class="mb-3"><textarea class="form-control" name="message" placeholder="Message" rows="14"></textarea></div>
            <div class="mb-3"><button class="btn btn-primary" type="submit">send </button></div>
        </form>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>