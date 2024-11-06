<div class="w50 m-auto form-container">
    <h1 class="titre bg-dark"><?=$title?></h1>
    <div class="line-button">
        <button class="btn btn-md btn-dark" onclick="creer()">Créer</button>
        <button class="btn btn-md btn-dark" onclick="afficher()">Afficher</button>
        <button class="btn btn-md btn-dark" onclick="modifier()">Modifier</button>
        <button class="btn btn-md btn-secondary" onclick="supprimer()">Supprimer</button>
        <button class="btn btn-md btn-secondary" onclick="imprimer()">Imprimer</button>
        <button class="btn btn-md btn-secondary" onclick="quitter()">Quitter</button>
    </div>
    <table class="w100 table table-bordered">
        <thead class="bg-dark">
            <tr class="">
                <th class="text-center bg-dark text-light border border-light"><input type="checkbox"></th>
                <th class="text-center bg-dark text-light border border-light">ID</th>
                <th class="text-center bg-dark text-light border border-light">CODE</th>
                <th class="text-center bg-dark text-light border border-light">LIBELLE</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $html="";
                foreach($roles as $role){
                    $html.="<tr>";
                        $id=$role->getId();
                        $code=$role->getCode();
                        $libelle=$role->getLibelle();
                        $html.="<td><input type='checkbox' id='$id' name='choix' onclick='onlyOne(this)' ></td>";
                        $html.="<td>$id</td>";
                        $html.="<td>$code</td>";
                        $html.="<td>$libelle</td>";
                    $html.="</tr>";
                }
                echo $html;
            ?>
        </tbody>
        <tfoot>
            <tr class="bg-success">
                <th colspan="4" class="text-center text-light">Nombre de roles: <?=count($roles)?></th>
            </tr>
        </tfoot>
    </table>
</div> 

<script>
    function creer(){
        document.location.href="index.php?url=role&action=create";
    }

    function modifier(){
        const id=getIdChecked('choix');
        if(id==0){
           alert('Veuillez selectionner un role');
           return;
        
            
        }
        document.location.href="index.php?url=role&action=update&id="+id;
    }

    function afficher() {
        const id=getIdChecked('choix');
        if(id==0){
            alert('Veuillez selectionner un role');
            return;
            
        }
        document.location.href="index.php?url=role&action=read&id="+id;
    }

    function supprimer() {
        const id=getIdChecked('choix');
        if(id==0){
            alert('Veuillez selectionner un role');
            return;
            
        }
        const reponse=confirm('Voulez-vous supprimer ce role?');
        if(reponse){
            document.location.href="index.php?url=role&action=delete&id="+id;
        }
    }


</script>