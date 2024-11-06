<div class="container my-4 p-4 bg-secondary text-light rounded">
    <h1 class="titre bg-dark text-center py-2"><?=strtoupper($title)?></h1>
    <form action="index.php?url=menu&action=save" method="POST">
        <!-- ID (hidden by default) -->
        <div class="mb-3 d-none">
            <label for="id" class="form-label">ID</label>
            <input type="text" id="id" name="id" value="<?=$menu->getId()?>" class="form-control">
        </div>

        <!-- LIBELLE -->
        <div class="mb-3 row">
            <label for="libelle" class="col-md-3 col-form-label">LIBELLE</label>
            <div class="col-md-9">
                <input type="text" <?=$disabled?> id="libelle" name="libelle" value="<?=$menu->getLibelle()?>" class="form-control">
            </div>
        </div>

        <!-- PARENT -->
        <div class="mb-3 row">
            <label for="parent_id" class="col-md-3 col-form-label">PARENT</label>
            <div class="col-md-9">
                <select name="parent_id" <?=$disabled?> id="parent_id" class="form-select">
                    <?php
                        $html="<option value='' ></option>";
                        foreach($parents as $parent){
                            $parent_id=$parent->getId();
                            $parent_libelle=$parent->getLibelle();
                            $selected=($parent_id==$menu->getParent_id())?"selected":"";
                            $html.="<option value='$parent_id' $selected >$parent_libelle</option>";
                        }
                        echo $html;
                    ?>
                </select>
            </div>
        </div>

        <!-- URL -->
        <div class="mb-3 row">
            <label for="url" class="col-md-3 col-form-label">URL</label>
            <div class="col-md-9">
                <input type="text" <?=$disabled?> id="url" name="url" value="<?=$menu->getUrl()?>" class="form-control">
            </div>
        </div>

        <!-- ROLE -->
        <div class="mb-3 row">
            <label for="role" class="col-md-3 col-form-label">ROLE</label>
            <div class="col-md-9">
                <select name="role" <?=$disabled?> id="role" class="form-select">
                    <?php
                        $html="<option value='' ></option>";
                        foreach($roles as $role){
                            $role_id=$role->getId();
                            $role_code=$role->getCode();
                            $selected=($role_code==$menu->getRole())?"selected":"";
                            $html.="<option value='$role_code' $selected >$role_code</option>";
                        }
                        echo $html;
                    ?>
                </select>
            </div>
        </div>

        <!-- ICONE -->
        <div class="mb-3 row">
            <label for="icone" class="col-md-3 col-form-label">ICONE</label>
            <div class="col-md-9">
                <input type="text" <?=$disabled?> id="icone" name="icone" value="<?=$menu->getIcone()?>" class="form-control">
            </div>
        </div>

        <!-- Buttons -->
        <div class="text-center mt-4">
            <button type="button" class="btn btn-primary me-2 w-90 w-md-auto my-2" onclick="retour()">Retour aux Menus</button>
            <button type="reset" class="btn btn-dark me-2 w-90 w-md-auto my-2">Annuler</button>
            <button type="submit" class="btn btn-success me-2 w-90 w-md-auto my-2">Enregistrer</button>
        </div>
    </form>
</div>

<script>
    function retour() {
        document.location.href = "index.php?url=menu";
    }
</script>