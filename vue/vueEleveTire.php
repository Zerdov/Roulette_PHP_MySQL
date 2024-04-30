<?php 
$txt="<h1 class='text-center'>Et l'élève tiré est... ".$random['nomE']." ".$random['prenomE']."!</h1>";
$txt.="<form action=./?action=envoie method='POST' class='ms-2'>";
$txt.="<label for='note' class='form-label'>Note attribuée :</label><input type='number' id='note' name='note' class='form-control w-25' value='0' min='0' max='20' step='0.5'>";
$txt.="<input type='hidden' name='idE' value='".$random['idE']."'>";
$txt.="<input type='submit' class='btn btn-primary mt-3 mb-5' value='Confirmer'></form>";
$txt.="<a href='./?action=accueil' class='ms-2'>Retournez à la page d'accueil ?</a>";
echo $txt;
?>