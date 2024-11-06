<div class="w80 m-auto">
    <h1 class="titre bg-dark text-light">LISTE DES CATÉGORIES MOUVEMENT</h1>
    <div class="line-button d-print-none">
        <button class="btn btn-md btn-dark text-light" onClick="creer()">Créer</button>
        <button class="btn btn-md bg-dark text-light" onClick="afficher()">Afficher</button>
        <button class="btn btn-md bg-dark text-light" onClick="modifier()">Modifier</button>
        <button class="btn btn-md bg-secondary text-light"secondary onClick="supprimer()">Supprimer</button>
        <button class="btn btn-md bg-secondary text-light" onClick="imprimer()">Imprimer</button>
        <button class="btn btn-md bg-secondary text-light" onClick="quitter()">Quitter</button>
    </div>
    <table class="w100 table table-bordered">
        <thead>
            <tr>
                <th><input type="checkbox"></th>
                <th>ID</th>
                <th>Prefixe</th>
                <th>Libelle</th>
                <th>N° Initial</th>
                <th>Format</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($typemouvements as $typemouvement): ?>
                    <tr>
                        <td><input type="checkbox" id="<?=$typemouvement->getId()?>" name="choix" onclick="onlyOne(this)"></td>
                        <td><?=$typemouvement->getId()?></td>
                        <td><?=$typemouvement->getPrefixe()?></td>
                        <td><?=$typemouvement->getLibelle()?></td>
                        <td><?=$typemouvement->getNumeroInitial()?></td>
                        <td><?=$typemouvement->getFormat()?></td>

                    </tr>
                <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <th class="text-center bg-dark text-light" colspan="6">Nombre de Catégories Mouvement : <?=count($typemouvements)?></th>
            </tr>
        </tfoot>
    </table>
</div>


<script>

                function modifier(){
                    const id=getIdChecked("choix");
                    if(id==0){
                        alert("Veuillez choisir une ligne à modifier");
                        return;
                    }
                    alert(id);
                    /* document.location.href=`index.php?url=categorie&action=update&id=${id}`; */
                    document.location.href="index.php?url=typemouvement&action=update&id="+id;
                }

                function creer(){
                    document.location.href="index.php?url=typemouvement&action=create"
                }

                function afficher(){
                    const id=getIdChecked("choix");
                    if(id==0){
                        alert("Veuillez choisir une ligne à afficher");
                        return;
                    }
                    const url="index.php?url=typemouvement&action=read&id="+id;
                    const w=window.screen.width*0.8;
                    const h=window.screen.height*0.8;
                    popupCenter(url,`Affichage du Tiers id=${id}`,w,h);
                }

                function supprimer(){
                    const id=getIdChecked("choix");
                    if(id==0){
                        alert("Veuillez choisir une ligne à supprimer");
                        return;
                    }
                    const response = confirm("Voulez-vous vraiment supprimer ce Mouvement?");
                    if(response){
                    document.location.href=`index.php?url=typemouvement&action=delete&id=${id}`;
                    }
                }

                function imprimer(){
                    window.print();
                }

                function quitter(){
                    document.location.href="index.php";
                }
                function chercher(event){
                    document.location.href= `index.php?url=typemouvement&action=search&mot=${mot.value}`;
                }




</script>