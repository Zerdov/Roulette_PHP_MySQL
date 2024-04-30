<?php
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    if (isset($_POST['notes'])) {
        $notes = $_POST['notes'];
        include_once "$racine/modele/bd.notes.inc.php";

        $Note=new Note();

        foreach ($notes as $v){
            $Note->supprNoteByIdN($v);
        }

        echo json_encode(['success' => true, 'message' => 'Les notes ont été supprimées avec succès.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'La clé "notes" est manquante dans les données JSON.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Vous ne pouvez être ici.']);
}
?>