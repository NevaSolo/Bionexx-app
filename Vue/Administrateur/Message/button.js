function afficherTexte() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("texte").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "ArticleControlleur.php", true);
    xmlhttp.send();
}
<section class="contact-clean">
                    <form action="" method="post">
            <div class="mb-3"><input class="form-control" type="text" name="ar_num" placeholder="Numero d'Achat"></div>
            <div class="mb-3"><button class="btn btn-primary" type="submit" style="border-radius: 71px;background: rgb(253,145,255);">Afficher</button>
               </section>
               /*
            if(isset($_POST['ar_num'])){
                extract($_POST);
                $ar = new Article;
                $ar -> setArNum($ar_num);
                $ar -> afficher();
            }*/</form>