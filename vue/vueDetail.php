<?php
$txt="<h1 class='text-center my-3'>Détail de ".$utilisateur['nomU']." ".$utilisateur['prenomU']."</h1>";
$txt.="<article class='mb-5'><h4>Liste des notes de ".$utilisateur['nomU']." ".$utilisateur['prenomU']." :</h4>";
$txt.="<section><ul>";
foreach($notes_utilisateur as $v){
    $date=new DateTime($v['dateN']);
    $txt.="<li>".(strlen($v['valeurN'])<5 ? "0".$v['valeurN'] : $v['valeurN']).", datant du ".$date->format('d/m/Y')."</li>";
}
$txt.="</article>";
$txt.="<a href='./accueil' class='ms-2'>Retournez à la page d'accueil ?</a>";
echo $txt;
?>