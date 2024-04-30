<?php
$txt="<h1 class='text-center my-3'>Bienvenue sur Roulette PHP/MySQL</h1>";
$txt.="<form action='./random' method='POST' class='ms-2'><h4>Tirer un élève :</h4>";

//Début du formulaire
$txt.="<label for='choix_classe' class='form-label'>Choisir une classe :</label><select name='choix_classe' id='choix_classe' class='form-select w-25'>";

foreach($liste_classes as $v){
    $txt.="<option value=".$v['idC'].">".$v['libelleC']."</option>";
}    

$txt.="</select><input type='submit' value='Confirmer' class='btn btn-primary mt-3'/></form>";
//Fin du formulaire

//Début des listes
//Pour chaque classe, clef => valeur
foreach($utilisateurs as $keyv => $v){
    $txt.="<article class='row my-5'>";
    //Pour chaque état, clef => valeur
    foreach($v as $keyw => $w){
        $txt.="<section class='col-sm-6'><h4>Liste des élèves ".$keyv." ".$keyw." :</h4><ul>";
        //Pour chaque élève
        foreach($w as $x){
            $txt.="<li><a href='./detail-".$x['idU']."'>".$x['nomU']." ".$x['prenomU']."</a></li>";
        }
        $txt.="</ul></section>";
    }
    $txt.="</article>";
}
//Fin des listes

//Début des options de reset
$txt.="<form action='./accueil' method='POST' class='ms-2'><h4>Autres actions :</h4>"; 
$txt.="<h6>Options reset :</h6>";
$txt.="<section class='form-check'><input type='checkbox' id='reset_passage' name='reset_opt[]' value='reset_passages' class='form-check-input'><label for='reset_passage' class='form-check-label'>Reset les passages</label></section>";
$txt.="<section class='form-check'><input type='checkbox' id='reset_note' name='reset_opt[]' value='reset_notes' class='form-check-input'><label for='reset_note' class='form-check-label'>Reset les notes</label></section>";
$txt.="<h6>Pour quelle classe :</h6>";
foreach($liste_classes as $v){
    $txt.="<section class='form-check'><input type='checkbox' id='choix_classe_".$v['libelleC']."' name='choix_classe[]' value='".$v['idC']."' class='form-check-input'>";
    $txt.="<label for='choix_classe_".$v['libelleC']."' class='form-check-label'>".$v['libelleC']."</label></section>";
}   
$txt.="<input type='submit' value='Confirmer' class='btn btn-primary mt-3'/></form>";
//Fin des options
echo $txt;