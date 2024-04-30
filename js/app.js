// vueLogin
const pass=$('#mdpU');
const voir=$('#voir');
const oeil=$('#eye_icon');

voir.on('click', function() {
    (pass.attr('type')=='password')? (pass.attr('type','text'), oeil.attr('class','bi bi-eye-slash')) : (pass.attr('type','password'), oeil.attr('class','bi bi-eye'));
});

// Montre les notes d'un utilisateur par rapport à son ID
function showNotesUtilisateur(idU) {
    return new Promise(function (resolve, reject) {
        $.ajax({
            url: "index.php",
            type: "POST",
            data: {
                action: "showNotes",
                idU: idU,
            },
            success: function(response) {
                response=JSON.parse(response);
                console.log("Réponse de la requête AJAX :", response.success);
                $("#liste_notes").html(response.message);
                resolve(response.success);
            },
            error: function (xhr, status, error) {
                console.log("Erreur de la requête AJAX :", error);
                reject("Erreur d'accès à la base de données. Détails : " + JSON.stringify({ xhr, status, error }));
            }
        })
        .done(function(){
            console.log('Requête effectuée');
        })
        .fail(function(){
            console.log('Erreur lors de la réalisation de la requête');
        })
    });
}

//vueDetail
const buttonSuppr=$('#buttonSuppr');
const modal=$('#modalSuppr');

function supprNotes(inputs) {
    var notesIds = inputs.map(function() {
        return this.value;
    }).get();

    return new Promise(function (resolve, reject) {
        $.ajax({
            url: "index.php",
            type: "POST",
            data: {
                action: "suppression",
                notes: notesIds, 
            },
            success: function (response) {
                response=JSON.parse(response);
                console.log("Réponse de la requête AJAX :", response.success);
                resolve(response.success);
            },
            error: function (xhr, status, error) {
                console.log("Erreur de la requête AJAX :", error);
                reject("Erreur d'accès à la base de données. Détails : " + JSON.stringify({ xhr, status, error }));
            }
        })
        .done(function(){
            console.log('Requête effectuée');
        })
        .fail(function(){
            console.log('Erreur lors de la réalisation de la requête');
        })
    });
}

buttonSuppr.on('click', function () {
    const idU=$('#idU').attr('name');
    const inputs=$('input[name="notes_suppr[]"]:checked');
    if(inputs.length){
        supprNotes(inputs)
            .then(function (result) {
                $('#MSTitle').text("Erreur !");
                $('#MSText').text("Il y a eu un problème, les notes n'ont pas pu être supprimées");
                if(result){
                    $('#MSTitle').text("Succès !");
                    $('#MSText').text("Les notes on été supprimées");
                } 
                modal.modal('show');
                showNotesUtilisateur(idU);
            })
            .catch(function (error) {
                $('#MSTitle').text("Erreur !");
                $('#MSText').text("Erreur de la requête! : "+error);
                modal.modal('show');
            })
    }
});