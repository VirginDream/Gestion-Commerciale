<div class="container form-container w-100 w-md-75 m-auto">
    <h1 class="titre bg-dark text-light text-center py-3"><?= $title ?></h1>

    <form action="index.php?url=produit&action=save" method="POST" enctype="multipart/form-data">
        <div class="row">
            <!-- Partie gauche du formulaire -->
            <div class="col-12 col-md-8">
                <div class="line-input mb-3">
                    <label for="id" class="form-label d-none">ID</label>
                    <input type="text" id="id" name="id" value="<?= $produit->getId() ?>" class="form-control d-none" <?= $disabled ?>>
                </div>

                <div class="line-input mb-3">
                    <label for="numProduit" class="form-label">CODE</label>
                    <input type="text" placeholder="Automatique" id="numProduit" name="numProduit" value="<?= $produit->getnumProduit() ?>" class="form-control" disabled>
                </div>

                <div class="line-input mb-3">
                    <label for="categorie" class="form-label obligatoire">CATEGORIE</label>
                    <?php
                    $html = "<select required id='categorie_id' name='categorie_id' class='form-select my-2' $disabled>";
                    $html .= "<option value=''></option>";
                    foreach ($categories as $categorie) {
                        $id = $categorie->getId();
                        $libelle = $categorie->getLibelle();
                        $prefixe = $categorie->getPrefixe();
                        $selected = ($produit->getCategorie_id() == $id) ? "selected" : "";
                        $html .= "<option value='$id' $selected > $prefixe - $libelle </option>";
                    }
                    $html .= "</select>";
                    echo $html;
                    ?>
                </div>

                <div class="line-input mb-3">
                    <label for="designation" class="form-label obligatoire">DESIGNATION</label>
                    <input type="text" required id="designation" name="designation" value="<?= $produit->getDesignation() ?>" class="form-control my-2" <?= $disabled ?>>
                </div>

                <div class="line-input mb-3">
                    <label for="prixUnitaire" class="form-label obligatoire">PRIX UNITAIRE</label>
                    <input type="text" required id="prixUnitaire" name="prixUnitaire" value="<?= $produit->getPrixUnitaire() ?>" class="form-control my-2 text-end" <?= $disabled ?>>
                </div>

                <div class="line-input mb-3">
                    <label for="prixRevient" class="form-label">PRIX REVIENT</label>
                    <input type="text" id="prixRevient" name="prixRevient" value="<?= $produit->getPrixRevient() ?>" class="form-control my-2 text-end" <?= $disabled ?>>
                </div>
            </div>

            <!-- Partie droite du formulaire : image -->
            <div class="col-12 col-md-4 text-center">
                <img src="./Public/img/<?= $produit->getImage() ?>" alt="" class="img-fluid border-dark mb-3" id="view_image_id">
                <input type="file" class="d-none" name="image" id="image" onchange="previewImage(this,'view_image_id')">
                <button class="btn btn-secondary w-100 mb-2" onclick="choisirImage(event)" <?= $disabled ?>>Sélectionner une image</button>
            </div>
        </div>

        <!-- Boutons de validation -->
        <div class="text-center my-4 bouton" style="max-width:540px">
            <button type="reset" class="btn btn-dark me-2 w-90 w-md-auto my-2" <?= $disabled ?>>Annuler</button>
            <button class="btn btn-primary me-2 w-90 w-md-auto my-2" onclick="retour()">Retour à la liste</button>
            <button type="submit" class="btn btn-dark w-90 w-md-auto my-2" <?= $disabled ?>>Valider</button>
        </div>
    </form>
</div>

<script>
    function choisirImage(event) {
        event.preventDefault();
        image.click();
    }

    function retour() {
        event.preventDefault();
        document.location.href = "index.php?url=produit";
    }
</script>