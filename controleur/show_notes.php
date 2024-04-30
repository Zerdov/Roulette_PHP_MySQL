<?php
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    if (isset($_POST['idU'])) {
        include_once "$racine/modele/bd.notes.inc.php";

        date_default_timezone_set('Europe/Paris');
        $Note=new Note();

        $idU=$_POST['idU'];
        $notesUtilisateur=$Note->getNotesByIdU($idU);

        $txt="<ul>";
        foreach($notesUtilisateur as $v) {
            $date=new DateTime($v['dateN']);
            $txt.="<li>";
            $txt.="<input type='checkbox' value='".$v['idN']."' id='".$v['idN']."' name='notes_suppr[]' class='form-check-input ms-3'/>";
            $txt.="<label for='".$v['idN']."' class='ms-3'>".(strlen($v['valeurN'])<5 ? "0".$v['valeurN'] : $v['valeurN']).", datant du ".$date->format('d/m/Y')."</label>";
            $txt.="</li>";
        }
        $txt.="</ul>";
        echo json_encode(['success' => true, 'message' => $txt]);
    } else {
        echo json_encode(['success' => false, 'message' => 'La clé "idU" est manquante dans les données JSON.']);
    } 
} else {
    echo json_encode(['success' => false, 'message' => 'Vous ne pouvez être ici.']);
}
?>