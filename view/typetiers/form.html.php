<div class="w60 m-auto">
    <h1 class="titre bg-dark"><?=$title?></h1>
    <form action="index.php?url=typetiers&action=save" method="POST">
        <div class="line-input hide">
            <label for="id" class="lab30" obligatoire>ID:</label>
            <input type="text" id="id" name="id" value="<?=$typetiers->getId()?>" class="form-control w50 my-2" <?=$disabled?>>
        </div>
        <div class="line-input" >
            <label for="prefixe" class="lab30 obligatoire">Prefixe:</label>
            <input required type="text" id="prefixe" name="prefixe" value="<?=$typetiers->getPrefixe()?>" class="form-control w50 my-2" <?=$disabled?>>
        </div>
        <div class="line-input">
            <label for="libelle" class="lab30 obligatoire">Libellé:</label>
            <input required type="text" id="libelle" name="libelle" value="<?=$typetiers->getLibelle()?>" class="form-control w50 my-2" <?=$disabled?>>
        </div>
        <div class="line-input">
            <label for="numeroInitial" class="lab30">N° Initial:</label>
            <input type="text" id="numeroInitial" name="numeroInitial" value="<?=$typetiers->getNumeroInitial()?>" class="form-control w50 my-2" <?=$disabled?>>
        </div>
        <div class="line-input">
            <label for="format" class="lab30 obligatoire">Format:</label>
            <input required type="text" id="format" name="format" value="<?=$typetiers->getFormat()?>" class="form-control w50" <?=$disabled?>>
        </div>
        <div class="line-button">
        <button type="reset" class="btn btn-md bg-dark text-light" <?=$disabled?>>Reset</button>
        <button type="button" class="btn btn-md bg-primary text-light border border-dark" onClick="quitter()" <?=$disabled?>>Retour</button>
        <button type="submit" class="btn btn-md bg-dark text-light" <?=$disabled?>>Valider</button>
        

    </div>
    </form>
    
</div>

<script>

    function quitter(){
        document.location.href="index.php?url=typetiers";
    }

</script>



