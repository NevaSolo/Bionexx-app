<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>row</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<style>
.styled-text {
  font-family: 'Montserrat', sans-serif;
  font-size: 18px;
  color: #333;
  text-transform: uppercase;
  line-height: 1.5;
  letter-spacing: 3px;
  padding: 20px;
  background: #f9f9f9;
  border: 1px solid #ddd;
  border-radius: 5px;
  box-shadow: 0px 2px 5px #ddd;
}
</style>
<?php
require_once("Connexion.php");
class Fournisseur{
    private $f_id;
    private $f_nom;
    private $f_nom1;
    private $f_nom2;
    private $f_articleDispo;
    private $f_qte;
    private $f_prix;
    private $f_montant;
    private $f_modePay;
    private $f_echeance;

    public function __construct(){
        $this -> f_id = 0;
        $this -> f_nom = "nom du fournisseur";
        $this -> f_nom1 = "nom";
        $this -> f_nom2 = "nom";
        $this -> f_articleDispo = "les article disponible";
        $this -> f_qte = 0;
        $this -> f_prix = 0;
        $this -> f_echeance = "le montant";
        $this -> f_modePay = "modaliter de paye";
        $this -> f_montant = 0;
    }

    public function getFid(){
        return $this -> f_id;
    }
    public function getFnom(){
        return $this -> f_nom;
    }
    public function getFnom1(){
        return $this -> f_nom1;
    }
    public function getFnom2(){
        return $this -> f_nom2;
    }
    public function getFarticleDispo(){
        return $this -> f_articleDispo;
    }
    public function getFqte(){
        return $this -> f_qte;
    }
    public function getFprix(){
        return $this -> f_prix;
    }
    public function getFmontant(){
        return $this -> f_montant;
    }
    public function getFmodePay(){
        return $this -> f_modePay;
    }
    public function getFecheance(){
        return $this -> f_echeance;
    }
    public function setFid($f_id){
        $this -> f_id = $f_id;
    }
    public function setFnom($f_nom){
        $this -> f_nom = $f_nom;
    }
    public function setFnom1($f_nom1){
        $this -> f_nom1 = $f_nom1;
    }
    public function setFnom2($f_nom2){
        $this -> f_nom2 = $f_nom2;
    }
    public function setFarticleDispo($f_articleDispo){
        $this -> f_articleDispo = $f_articleDispo;
    }
    public function setFqte($f_qte){
        $this -> f_qte = $f_qte;
    }
    public function setFprix($f_prix){
        $this -> f_prix = $f_prix;
    }
    public function setFmontant($f_qte, $f_prix){
        $this -> f_montant = $f_qte*$f_prix;
    }
    public function setFmodePay($f_modePay){
        $this -> f_modePay = $f_modePay;
    }
    public function setFecheance($f_echeance){
        $this -> f_echeance = $f_echeance;
    }


    public function create(){
        $base = Connection::getConnection();
        $requete = "INSERT INTO fournisseur VALUES( null, :f_nom, :f_articleDispo, :f_qte, :f_prix, :f_montant, :f_modePay, :f_echeance);";
        $etat = $base->prepare($requete);
        $etat->execute(
            array(
                "f_nom"=>$this -> getFnom(),
                "f_articleDispo"=>$this -> getFarticleDispo(),
                "f_qte"=>$this -> getFqte(),
                "f_prix"=> $this -> getFprix(),
                "f_montant"=> $this -> getFmontant(),
                "f_modePay"=> $this -> getFmodePay(),
                "f_echeance"=> $this -> getFecheance()
            )
        );
        $etat->closeCursor();
    }
    public function comparaison(){

        //Requete somme
        $base = Connection::getConnection();
        $requete1= "SELECT f_montant,f_nom, f_articleDispo FROM fournisseur WHERE f_nom= :f_nom1";
        $etat1 = $base -> prepare($requete1);
        $etat1 -> execute(array(
            "f_nom1"=>$this -> getFnom1()
        ));
        $resultat1 = $etat1 ->fetchAll(PDO::FETCH_ASSOC);
       $requete2 = "SELECT f_montant,f_nom , f_articleDispo FROM fournisseur WHERE f_nom= :f_nom2";
       $etat2 = $base -> prepare($requete2);
       $etat2 -> execute(array(
        "f_nom2"=>$this -> getFnom2()
       ));
       $resultat2 = $etat2 -> fetchAll(PDO::FETCH_ASSOC);
        if($resultat1 == $resultat2){
        echo "Les deux fournisseurs sont Egales";
        }elseif($resultat1 > $resultat2)
        {
            ?><form action="../../Controlleur/GenerateurDmControlleur.php"><p class='styled-text'>Le 2 eme fournisseur est plus rentable ----------
            <a href="../../Vue/Administrateur/Telechargement/TelechargementCom.php">Telecharger</a></p><br></form>
            <p><a href="../../Vue/Administrateur/Message/Boite.php">Retour a la reception</a></p>
        <?php
        }
       else{
            ?><form action="../../Controlleur/GenerateurDmControlleur.php" method="post"><p class='styled-text'> Le premier fournisseur est plus rentable ----------
            <a href="../../Vue/Administrateur/Telechargement/TelechargementCom.php">Telecharger</a></p><br></form>
            <p><a href="../../Vue/Administrateur/Message/Boite.php">Retour a la reception</a></p>
           <?php
    }
    ?>
    <div class="container">
    <div class="row">
        <div class="col-md-6">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom du fournisseur</th>
                        <th>Article</th>
                        <th>Montant Totale</th>
                    </tr>
                </thead>
            <?php foreach($resultat1 as $res):
            
                ?>
                <tbody>
                    <tr>
                        <td><?=$res['f_nom']?></td>
                        <td><?=$res['f_articleDispo']?></td>
                        <td><?=$res['f_montant']?></td>
                    </tr>
                </tbody>
                <?php endforeach;?>
            </table>
        </div>
        </div>
        <div class="col-md-6">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom du fournisseur</th>
                        <th>Article</th>
                        <th>Montant Totale</th>
                    </tr>
                </thead>
            <?php foreach($resultat2 as $res):
            
                ?>
                <tbody>
                    <tr>
                        <td><?=$res['f_nom']?></td>
                        <td><?=$res['f_articleDispo']?></td>
                        <td><?=$res['f_montant']?></td>
                    </tr>
                </tbody>
                <?php endforeach;?>
            </table>
        </div>
        </div>
    </div>
</div>
<?php
}
    



    public function read() {
        $base = Connection::getConnection();
        $requete = "SELECT * FROM fournisseur;";
        $etat = $base->prepare($requete);
        $etat->execute(array());
        $resultat = $etat->fetchAll();
        $etat->closeCursor();
        return $resultat;
    }
    public function update() {
        $base = Connection::getConnection();
        $requete = "UPDATE fournisseur set f_nom=:f_nom where f_id=:f_id;";
        $etat = $base->prepare($requete);
        $etat->execute(
            array(
                "f_nom"=> $this -> getFnom(),
                "f_id"=> $this -> getFid()
            )
        );
        $etat->closeCursor();
    }
}
?>
