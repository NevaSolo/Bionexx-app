function afficherTexte() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("texte").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "texte.php", true);
    xmlhttp.send();
}