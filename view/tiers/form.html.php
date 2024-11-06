<div class="container form-container w-100 w-md-75 m-auto">
    <h1 class="titre bg-dark text-light text-center py-3"><?= $title ?></h1>
    <form class="w100" action="index.php?url=tiers&action=save" method="POST" enctype="multipart/form-data">
        <div class="d-flex justify-content-between">
            <div class="col-12 col-md-8">
                <div class="line-input mb-3">
                    <label for="id" class="form-label d-none">ID</label>
                    <input type="text" id="id" name="id" value="<?= $tiers->getId() ?>" class="form-control d-none" <?= $disabled ?>>
                </div>

                <div class="line-input mb-3">
                    <label for="typeTiers" class="form-label obligatoire">TYPE TIERS</label>
                    <?php
                    $html = "<select required id='typeTiers_id' name='typeTiers_id' class='form-select my-2 ' $disabled >";
                    $html .= "<option value=''></option>";
                    foreach ($typeTierss as $typeTiers) {
                        $id = $typeTiers->getId();
                        $libelle = $typeTiers->getLibelle();
                        $prefixe = $typeTiers->getPrefixe();
                        $selected = ($tiers->getTypeTiers_id() == $id) ? "selected" : "";
                        $html .= "<option value='$id' $selected > $prefixe - $libelle </option>";
                    }
                    $html .= "</select>";
                    echo $html;

                    ?>
                    <div class="line-input mb-3">
                        <label for="numTiers" class="lab30">N° TIERS</label>
                        <input type="numTiers" placeholder="Automatique" id="numTiers" name="numTiers" value="<?= $tiers->getNumTiers() ?>" class="form-control my-2" <?= $disabled ?>>
                    </div>
                    <div class="line-input mb-3">
                        <label for="nomTiers" class="lab30 obligatoire">NOM PRENOM</label>
                        <input type="text" required id="nomTiers" name="nomTiers" value="<?= $tiers->getNomTiers() ?>" class="form-control my-2 text-end" <?= $disabled ?>>
                    </div>
                    <div class="line-input mb-3">
                        <label for="adresseTiers" class="lab30">ADRESSE</label>
                        <input type="text" id="adresseTiers" name="adresseTiers" value="<?= $tiers->getAdresseTiers() ?>" class="form-control my-2 text-end" <?= $disabled ?>>
                    </div>

                </div>





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
        document.location.href = "index.php?url=tiers";
    }
</script>