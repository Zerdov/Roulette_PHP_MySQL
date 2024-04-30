<?php
$txt="<article class='container-fluid'>";
$txt.="<h1 class='text-center display-1'>".$title."</h1>"; 
$txt.="<p class='text-center my-2 fw-lighter'>La boulette...</p>";
$txt.=$description;
$txt.="<p class='text-center fs-3'>Il vous est cependant possible de revenir à l'accueil en suivant la flèche</p>";
$txt.="<p class='text-center my-5 display-1'><i class='bi bi-arrow-down'></i></p>";
$txt.="<p class='text-center my-5 fs-3'><a href='./accueil'>Exactement !</a></p>";
$txt.="</article>";
echo $txt;
?>