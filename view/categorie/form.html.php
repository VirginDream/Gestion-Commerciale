<div class="container my-4 p-4 bg-light rounded w-75 mx-auto">
    <h1 class="titre bg-dark text-light text-center py-2"><?=$title?></h1>
    <form action="index.php?url=categorie&action=save" method="POST">
        
        <!-- ID (hidden by default) -->
        <div class="mb-3 d-none">
            <label for="id" class="form-label ">ID:</label>
            <input type="text" id="id" name="id" value="<?=$categorie->getId()?>" class="form-control" <?=$disabled?>>
        </div>

        <!-- PREFIXE -->
        <div class="mb-3 row">
            <label for="prefixe" class="col-md-3 col-form-label bg-secondary text-light my-2">PREFIXE:</label>
            <div class="col-md-9">
                <input type="text" id="prefixe" name="prefixe" value="<?=$categorie->getPrefixe()?>" class="form-control" <?=$disabled?>>
            </div>
        </div>

        <!-- LIBELLE -->
        <div class="mb-3 row">
            <label for="libelle" class="col-md-3 col-form-label bg-secondary text-light my-2">LIBELLE:</label>
            <div class="col-md-9">
                <input type="text" id="libelle" name="libelle" value="<?=$categorie->getLibelle()?>" class="form-control" <?=$disabled?>>
            </div>
        </div>

        <!-- N° INITIAL -->
        <div class="mb-3 row">
            <label for="numeroInitial" class="col-md-3 col-form-label bg-secondary text-light my-2">N° INITIAL:</label>
            <div class="col-md-9">
                <input type="text" id="numeroInitial" name="numeroInitial" value="<?=$categorie->getNumeroInitial()?>" class="form-control" <?=$disabled?>>
            </div>
        </div>

        <!-- FORMAT -->
        <div class="mb-3 row">
            <label for="format" class="col-md-3 col-form-label bg-secondary text-light my-2">FORMAT:</label>
            <div class="col-md-9">
                <input type="text" id="format" name="format" value="<?=$categorie->getFormat()?>" class="form-control" <?=$disabled?>>
            </div>
        </div>

        <!-- Buttons -->
        <div class="text-center mt-4">
            <button type="reset" class="btn btn-dark text-light me-2 w-md-auto my-2" <?=$disabled?>>Annuler</button>
            <a href="index.php?url=categorie" class="btn btn-primary text-light me-2 w-md-auto my-2" <?=$disabled?>>Retour</a>
            <button type="submit" class="btn btn-success text-light w-md-auto my-2" <?=$disabled?>>Valider</button>
        </div>
    </form>
</div>