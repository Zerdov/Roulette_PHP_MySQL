<!-- Modal -->

<div class="modal fade" id="modalSuppr" tabindex="-1" aria-labelledby="MSTitle" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="MSTitle"></h1>
      </div>
      <div class="modal-body">
        <p id="MSText"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

<?php
$txt="<h1 id='idU' name='".$utilisateur['idU']."' class='text-center my-3'>Détail de ".$utilisateur['nomU']." ".$utilisateur['prenomU']."</h1>";
$txt.="<article class='mb-5'><h4>Liste des notes de ".$utilisateur['nomU']." ".$utilisateur['prenomU']." :</h4>";
$txt.="<section id='liste_notes'><ul>";
foreach($notes_utilisateur as $v){
	$date=new DateTime($v['dateN']);
	$txt.="<li>";
	$txt.=($prof) ? "<input type='checkbox' value='".$v['idN']."' id='".$v['idN']."' name='notes_suppr[]' class='form-check-input ms-3'/>" : "";
	$txt.="<label for='".$v['idN']."' class='ms-3'>".(strlen($v['valeurN'])<5 ? "0".$v['valeurN'] : $v['valeurN']).", datant du ".$date->format('d/m/Y')."</label>";
	$txt.="</li>";
}
$txt.="</ul></section></article>";
$txt.=($prof) ? "<button type='button' id='buttonSuppr' class='btn btn-danger w-25 my-3'>Supprimer les notes sélectionnées ?</button>" : "";
echo $txt;
?>