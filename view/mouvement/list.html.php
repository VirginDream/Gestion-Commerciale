<div class="w60 m-auto">
    <div id="entete" class="center bg-dark text-light py-4 d-flex justify-content-between align-items-center form-container"
        onChange='choisirtypeMouvement()'>
        <h2 class="mx-4">LISTE DES MOUVEMENTS</h2>
        

        <select name="typeMouvement_id" id="typeMouvement_id" class="w30 form-select mx-4" onchange="showTypeMouvement(event)">
        <option value="0">Catégories Mouvement</option>

           <?php foreach($typeMouvements as $typeMouvement) :?>
            <?php if($typeMouvement_id==$typeMouvement->getId()) :?>
                <option value="<?=$typeMouvement->getId()?>" selected ><?=$typeMouvement->getLibelle()?></option>
            <?php else :?>
                <option value="<?=$typeMouvement->getId()?>"          ><?=$typeMouvement->getLibelle()?></option>
            <?php endif ?>
        <?php endforeach?>
       
        </select>
    </div>

    <div class="d-flex justify-content-between my-2 d-print-none">
        <button class="btn btn-medium bg-dark text-light border-black" onclick="creer()">Créer</button>
        <button class="btn btn-medium bg-dark text-light border-black" onclick="afficher()">Afficher</button>
        <button class="btn btn-medium bg-dark text-light border-black" onclick="modifier()">Modifier</button>
        <button class="btn btn-medium bg-secondary text-light border-black" onclick="supprimer()">Supprimer</button>
        <button class="btn btn-medium bg-secondary text-light border-black" onclick="window.print()">Imprimer</button>
        <button class="btn btn-medium bg-secondary text-light border-black" onclick="quitter()">Quitter</button>

    </div>


    <table class="w100 scroll  table table-bordered">

        <thead class="border border-secondary">
            <tr class="bg-black text-light ">
                <th class="border-light text-center w10"><input type="checkbox"></th>
                <th class="border-light text-center w10">ID</th>
                <th class="border-light w20">N° MOUVEMENT</th>
                <th class="border-light w20 text-start">DATE</th>
               
              
                
            </tr>
            </thead>

        <tbody>
            <?php foreach($mouvements as $mouvement) :?>
                <tr>
                    <td class="text-center w10"><input type="checkbox" id="<?=$mouvement->getId()?>" name="choix" onclick ="onlyOne(this)"></td>
                    <td class="text-center w10"><?=$mouvement->getId();?></td>
                    <td class="w20"><?=$mouvement->getNumMouvement();?></td>
                    <td class="w20"><?=$mouvement->getDateMouvement();?></td>
                    
                    
                    
                    
                </tr>
                <?php endforeach?>

        </tbody>
        <tfoot class="border border-secondary">
            <div>
            <tr class="border border-secondary">
                <td colspan="5" class="d-flex justify-content-center align-items center py-4 bg-dark text-light border-secondary">Nombre de Mouvement=
                    <?=count($mouvements)?> 
                </td>
            </tr>
            <tr>
                <td colspan="5" class="d-flex justify-content-center align-items center py-4 bg-dark text-light border-secondary">Page : <?=$page?>/<?=$np?></td>
            </tr>
            


        </tfoot>

        </table>

        <div class="line-button d-flex justify-content-center align-items-center my-4">
        <?php for($i=1;$i<=$np;$i++) :?>
            <button class="btn btn-sm btn-secondary mx-2" id="<?=$i?>" onclick="showPage(event)" ><?=$i?></button>

        <?php endfor ?>





</div>







<script>
    function chercher(event){
        document.location.href=`index.php?url=mouvement&action=list&page=1&typeMouvement_id=<?=$typeMouvement_id?>&mot=${mot.value}`;
    }
    function showTypeMouvement(event){
        const typeMouvement_id=event.target.value;
        document.location.href=`index.php?url=mouvement&action=list&page=1&typeMouvement_id=${typeMouvement_id}&mot=<?=$mot?>`;
        
    } 

    function showPage(event){
        const page=event.target.id;
        document.location.href=`index.php?url=mouvement&action=list&page=${page}&typeMouvement_id=<?=$typeMouvement_id?>&mot=<?=$mot?>`;
    }
    function imprimer(){
        window.print();
    }
    function quitter(){
        document.location.href="index.php";
    }
    function supprimer(){
        const id=getIdChecked("choix");
        if(id==0){
            alert("Veuillez choisir une ligne à supprimer");
            return;
        } 
        const response=confirm("Voulez-vous vraiment supprimer cette ligne?");
        if(response){
            document.location.href=`index.php?url=mouvement&action=delete&id=${id}`;
        }
    } 
    function afficher(){
        const id=getIdChecked('choix');
        if(id==0){
            alert("Veuillez selectionner une ligne à afficher");
            return;
        }
        document.location.href=`index.php?url=mouvement&action=read&id=${id}`;
    } 
    
    function creer(){
        
        document.location.href="index.php?url=mouvement&action=create"
    }
    function modifier(){
        const id= getIdChecked("choix");
        if(id==0){
            alert("Veuillez choisir une ligne à modifier");
            return;
        }
        document.location.href=`index.php?url=mouvement&action=update&id=${id}`;
    }

</script>