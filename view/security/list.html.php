<div class="w60 m-auto form-container">
    <h1 class="titre bg-dark"><?=strtoupper($title)?></h1>
    <div class="line-button">
        <button class="btn btn-md btn-dark text-center" onclick="creer()">Créer</button>
        <button class="btn btn-md btn-dark text-center" onclick="afficher()">Afficher</button>
        <button class="btn btn-md btn-dark text-center" onclick="modifier()">Modifier</button>
        <button class="btn btn-md btn-secondary " onclick="supprimer()">Supprimer</button>
        <button class="btn btn-md btn-secondary text-light" onclick="imprimer()">Imprimer</button>
        <button class="btn btn-md btn-secondary " onclick="quitter()">Quitter</button>
    </div>


</div> 
<table class="w100 scroll table table-bordered">
    <thead>
        <tr class="bg-success">
            <th class="w05 text-center text-dark border border-secondary"><input type="checkbox"></th>
            <th class="w05 text-center text-dark border border-secondary">ID</th>
            <th class="w40 text-center text-dark border border-secondary">USERNAME</th>
            <th class="w10 text-center text-dark border border-secondary">PASSWORD</th>
            <th class="w40 text-center text-dark border border-secondary">ROLES</th>
        </tr>
    </thead>
    <tbody>
            <?php
                $html="";
                foreach($users as $user){
                    $id=$user->getId();
                    $username=$user->getUsername();
                    $password="*****";
                    $roles=$user->getRoles();
                    $json_roles=$user->getJsonRoles();
                    $role_select="<select class='form-select my-2'  title='$json_roles'>";
                    foreach($roles as $role){
                        $role_select.="<option>$role</option>";
                    }
                    $role_select.="</select>";
                    $html.="<tr>";
                         $html.="<td class='border-secondary text-center w05'><input type='checkbox' id='$id' name='choix' onclick='onlyOne(this)'> </td>";
                         $html.="<td class='border-secondary text-center w05'>$id</td>";
                         $html.="<td class='border-secondary text-center w40'>$username</td>";
                         $html.="<td class='border-secondary text-center w10'>$password</td>";
                         $html.="<td class='border-secondary text-center w40 px-2'>$role_select</td>";
                    $html.="</tr>";
                }
                echo $html;
            ?>

        </tbody>
        <tfoot>
            <tr>
                <th colspan="5"class="text-center w100"></th>

            </tr>
        </tfoot> 

</table>
<script>
    function chercher(){
        document.location.href=`index.php?url=security&action=list&mot={mot.value}`;
    }
    function modifier(){
        const id=getIdChecked('choix');
        if(id==0){
            alert('Veuillez selectionner un utilisateur');
        }else{
            document.location.href=`index.php?url=security&action=update&id=${id}`;
        }
    }
    function creer(){
        document.location.href="index.php?url=security&action=create";
    }
    function afficher(){
        const id=getIdChecked('choix');
        if(id==0){
            alert("Veuillez selectionner une ligne à afficher");
        }else{
            document.location=`index.php?url=security&action=read&id=${id}`;
        }        
    } 
    function supprimer(){
        const id=getIdChecked('choix');
        if(id==0){
            alert("Veuillez selectionner une ligne à supprimer");
        }else{
            if(confirm("Voulez-vous supprimer cet utilisateur?")){
                document.location=`index.php?url=security&action=delete&id=${id}`;
            }
        }
    }

</script>