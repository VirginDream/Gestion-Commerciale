<div class="w60 m-auto">
    <h1 class="titre"><?=$title?></h1>
    <form action="index.php?url=role&action=save" method="post" >
        <div class="line-input">
            <label for="id" class="lab30 hide">ID</label>
            <input type="text" id='id' name='id' value='<?=$role->getId()?>' class='form-control w20 hide' <?=$disabled?> >
        </div>
        <div class="line-input">
            <label for="code" class="lab30">CODE</label>
            <input type="text" id='code' name='code' value='<?=$role->getCode()?>' class='form-control w50' <?=$disabled?> >
        </div>
        <div class="line-input">
            <label for="libelle" class="lab30">LIBELLE</label>
            <input type="text" id='libelle' name='libelle' value='<?=$role->getLibelle()?>' class='form-control w70' <?=$disabled?> >
        </div>

        <div class="line-button">
            <button class="btn btn-md btn-primary" onclick="retour()">Retour à la liste</button>
            <button type="reset" class="btn btn-md btn-primary" >Annuler</button>
            <button type="submit" class="btn btn-md btn-primary" <?=$disabled?> >Enregistrer</button>
        </div>
    </form>
</div> 
<script>
    function retour() {
        event.preventDefault();
        document.location.href = 'index.php?url=role';
    }
</script>