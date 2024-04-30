<h1 class="text-center mt-5">Veuillez-vous connecter</h1>
<form action="./accueil" method="POST" class="d-flex flex-column justify-content-center align-items-center mt-5">
    <div class="form-group col-4">
        <label for="nomU">Identifiant :</label>
        <input type="text" class="form-control" name="nomU" id="nomU" placeholder="Identifiant"/>
    </div>
    <div class="form-group col-4">
        <label for="mdpU">Mot de passe :</label>
        <div class="input-group mb-3">
            <input type="password" class="form-control" name="mdpU" id="mdpU" placeholder="Mot de passe" aria-describedby="voir">
            <button class="btn btn-outline-secondary w-25" type="button" id="voir"><i id="eye_icon" class="bi bi-eye"></i></button>
        </div>
    </div>
    <div class="form-group col-4">
        <input type="submit" class="btn btn-success w-100" name="submit" id="submit" value="Validez">
    </div>
</form>