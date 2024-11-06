<div class="w60 m-auto form-container">
    <h1 class="titre bg-dark text-light"><?=strtoupper($title)?></h1>
    <form action="index.php?url=security&action=save" method="POST" >
        <div class="line-input bg-dark text-light">
            <label for="id" class="lab30">ID</label>
            <input type="text" id="id" name="id" value="<?=$user->getId()?>" class="form-control w30" <?=$disabled?>>
        </div>
        <div class="line-input my-2 bg-dark text-light">
            <label for="username" class="lab30">IDENTIFIANT</label>
            <input type="text" id="username" name="username" value="<?=$user->getUsername()?>" class="form-control w70" <?=$disabled?>>
        </div>
        <div class="line-input bg-dark text-light">
            <label for="password" class="lab30">PASSWORD</label>
            <input type="password" id="password" placeholder="Ne rien saisir..." name="password" value="" class="form-control w70" <?=$disabled?>>
        </div>
       
       <!--  <div class="line-input my-2">
            <label for="roles" class="lab30">ROLES</label>
            <select id="roles" name="roles[]" multiple class="form-select px-2 mh-30 w70" >
           //<?php
           //    $html="";
           //    foreach($roles as $role){
           //        $id=$role->getId();
           //        $code=$role->getCode();
           //        $user_roles=$user->getRoles();
           //        $selected=(in_array($code,$user_roles))?"selected":"";
           //        $html.="<option  value='$code' $selected >$code</option>";
           //    }
           //    echo $html;
           //
           //?>
            </select>
        </div> -->
        <div class="line-input bg-dark text-light<?=isset($hide)?$hide:''?>">
            <label for="roles" class="lab30">ROLES</label>
            <ul class="mh-30 w70 border border-light">
                <?php
                    $html="";
                    foreach($roles as $role){
                        $id=$role->getId();
                        $code=$role->getCode();
                        $user_roles=$user->getRoles();
                        $checked=(in_array($code,$user_roles))?"checked":"";
                        $html.="<li><input type='checkbox' id='$id' name='roles[]' value='$code' $checked > $code</li>";
                    }
                    echo $html;
                ?>
            </ul>
        </div> 
       
        <div class="line-button ">
            <button class="btn btn-md btn-primary text-light" onclick="retour()">Retour à la liste</button>
            <button type="reset" class="btn btn-md btn-dark text-light <?=$disabled?>" >Annuler</button>
            <button type="submit" class="btn btn-md btn-dark text-light <?=$disabled?>" >Enregister</button>
        </div>
    </form>
</div> 


<script>
     function retour(){
        event.preventDefault();
        document.location.href = "index.php?url=security";
    }

</script>