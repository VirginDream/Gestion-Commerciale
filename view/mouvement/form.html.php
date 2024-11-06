<div class="w60 m-auto form-container">
    <h1 class="titre bg-dark text-light"><?=$title?></h1>
    <form class="w100" action="index.php?url=mouvement&action=save" method="POST" enctype="multipart/form-data">
        <div class="d-flex justify-content-between">
            <div class="w70">
                <div class="line-input">
                    <label for="id" class="lab30 hide">ID</label>
                    <input type="text" id="id" name="id" value="<?=$mouvement->getId()?>" class="form-control w30 hide" <?=$disabled?>>
                </div>
             
                <div class="line-input">
                    <label for="typeMouvement" class="lab30 obligatoire">MOUVEMENT</label>
                    <?php
                        $html="<select required id='typeMouvement_id' name='typeMouvement_id' class='form-select w70 my-2' $disabled >";
                        $html.="<option value=''></option>";
                        foreach($typeMouvements as $typeMouvement){
                            $id=$typeMouvement->getId();
                            $libelle=$typeMouvement->getLibelle();
                            $prefixe=$typeMouvement->getPrefixe();
                            $selected=($mouvement->getTypeMouvement_id()==$id)?"selected":"";
                            $html.="<option value='$id' $selected > $prefixe - $libelle </option>";
                        }
                        $html.="</select>";
                        echo $html;
                    
                    ?>
                    <div class="line-input">
                        <label for="numMouvement" class="lab30 obligatoire">N° MOUVEMENT</label>
                        <input type="numMouvement"  id="numMouvement" name="numMouvement" value="<?=$mouvement->getNumMouvement()?>" class="form-control w70 my-2" <?=$disabled?>>
                    </div>
                    <div class="line-input">
                        <label for="date" class="lab30 obligatoire">DATE</label>
                        <input type="text" required id="date" name="date" value="<?=$mouvement->getDateMouvement()?>" class="form-control w70 my-2 text-end" <?=$disabled?>>
                    </div>
                    

                </div>
                    
                    
                    
        
        
        <div class="line-button">
            <button type="reset" class="btn btn-medium border-black bg-dark text-light" <?=$disabled?>  >Annuler</button> 
            <button class="btn btn-md btn-primary" onclick="retour()">Retour à la liste</button>
            <button type="submit" class="btn btn-medium border-black bg-dark text-light" <?=$disabled?> >Valider</button>
        </div>
        
        
     
        

    </form> 


</div>

<script>
    function choisirImage(event)
{
    event.preventDefault();
    image.click();
} 


   function retour(){
        event.preventDefault();
        document.location.href = "index.php?url=mouvement";
    }

</script>