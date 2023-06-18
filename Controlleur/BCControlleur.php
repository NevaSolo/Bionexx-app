<?php
require_once("../Model/BC.php");
if(isset($_POST['bc_num'])AND isset($_POST['bc_invest'])AND isset($_POST['bc_code'])AND isset($_POST['bc_date'])AND isset($_POST['bc_fournisseur'])AND isset($_POST['bc_gestionnaire'])AND isset($_POST['bc_eb'])AND isset($_POST['bc_demandeur'])AND isset($_POST['bc_affectation'])AND isset($_POST['bc_dateLiv'])AND isset($_POST['bc_achat'])AND isset($_POST['bc_incoterm'])AND isset($_POST['bc_modeExp'])AND isset($_POST['bc_delai'])){
    extract($_POST);
    $bc = new bc();
    $bc -> setBcNum($bc_num);
    $bc -> setBcInvest($bc_invest);
    $bc -> setBcCode($bc_code);
    $bc -> setBcDate($bc_date);
    $bc -> setBcFournisseur($bc_fournisseur);
    $bc -> setBcGestionnaire($bc_gestionnaire);
    $bc -> setBcEb($bc_eb);
    $bc -> setBcDemandeur($bc_demandeur);
    $bc -> setBcAffectation($bc_affectation);
    $bc -> setBcDateLiv($bc_dateLiv);
    $bc -> setBcAchat($bc_achat);
    $bc -> setBcIncoterm($bc_incoterm);
    $bc -> setBcModeExp($bc_modeExp);
    $bc -> setBcDelai($bc_delai);
    $bc -> create(); 
    $bc -> voir();

}
?>