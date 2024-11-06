 <div class="container my-4">
     <div id="entete" class="bg-dark text-light py-4 d-flex flex-column flex-md-row justify-content-between align-items-center form-container"
         onChange='choisirtypeTiers()'>
         <h2 class="text-center text-md-start mb-2 mb-md-0 mx-4">LISTE DES TIERS</h2>


         <select name="typeTiers_id" id="typeTiers_id" class="form-select w-100 w-md-30" onchange="showTypeTiers(event)">
             <option value="0">Catégories Tiers</option>

             <?php foreach ($typeTierss as $typeTiers) : ?>
                 <?php if ($typeTiers_id == $typeTiers->getId()) : ?>
                     <option value="<?= $typeTiers->getId() ?>" selected><?= $typeTiers->getLibelle() ?></option>
                 <?php else : ?>
                     <option value="<?= $typeTiers->getId() ?>"><?= $typeTiers->getLibelle() ?></option>
                 <?php endif ?>
             <?php endforeach ?>

         </select>
     </div>

     <div class="d-flex flex-wrap justify-content-center justify-content-md-between my-2 d-print-none">
         <button class="btn btn-dark mx-2 my-1" onclick="creer()">Créer</button>
         <button class="btn btn-dark mx-2 my-1" onclick="afficher()">Afficher</button>
         <button class="btn btn-dark mx-2 my-1" onclick="modifier()">Modifier</button>
         <button class="btn btn-secondary mx-2 my-1" onclick="supprimer()">Supprimer</button>
         <button class="btn btn-secondary mx-2 my-1" onclick="window.print()">Imprimer</button>
         <button class="btn btn-secondary mx-2 my-1" onclick="quitter()">Quitter</button>

     </div>

     <div class="table-responsive">
         <table class="table table-bordered">
             <thead class="border border-secondary">
                 <tr class="bg-black text-light text-center">
                    <th class="border-light text-center w10"><input type="checkbox"></th>
                     <th class="border-light w20">ID</th>
                     <th class="border-light text-center w10">N° TIERS</th>
                     <th class="border-light w40 text-center">ADRESSE</th>
                     <th class="border-light w20 text-start">NOM PRENOM</th>
                </tr>
            </thead>
                 




             <tbody>
                 <?php foreach ($tierss as $tiers) : ?>
                     <tr>
                         <td class="text-center w10"><input type="checkbox" id="<?= $tiers->getId() ?>" name="choix" onclick="onlyOne(this)"></td>
                         <td class="text-center w10"><?= $tiers->getId(); ?></td>
                         <td class="w20"><?= $tiers->getNumTiers(); ?></td>
                         <td class="w20"><?= $tiers->getNomTiers(); ?></td>
                         <td class="text-center w40"><?= $tiers->getAdresseTiers(); ?></td>



                     </tr>
                 <?php endforeach ?>

             </tbody>
             <tfoot class="border border-secondary">
                 <div>
                     <tr class="bg-dark text-light text-center">
                         <td colspan="5">Nombre de Tiers= <?= count($tierss) ?></td>
                     </tr>
                     <tr>
                         <td colspan="5" class="bg-dark text-light text-center">Page : <?= $page ?>/<?= $np ?></td>
                     </tr>

                 </div>

             </tfoot>

         </table>
     </div>
     <div class="line-button d-flex justify-content-center align-items-center my-4">
         <?php for ($i = 1; $i <= $np; $i++) : ?>
             <button class="btn btn-sm btn-secondary mx-2" id="<?= $i ?>" onclick="showPage(event)"><?= $i ?></button>

         <?php endfor ?>





     </div>







     <script>
         function chercher(event) {
             document.location.href = `index.php?url=tiers&action=list&page=1&typeTiers_id=<?= $typeTiers_id ?>&mot=${mot.value}`;
         }

         function showTypeTiers(event) {
             const typeTiers_id = event.target.value;
             document.location.href = `index.php?url=tiers&action=list&page=1&typeTiers_id=${typeTiers_id}&mot=<?= $mot ?>`;

         }

         function showPage(event) {
             const page = event.target.id;
             document.location.href = `index.php?url=tiers&action=list&page=${page}&typeTiers_id=<?= $typeTiers_id ?>&mot=<?= $mot ?>`;
         }

         function imprimer() {
             window.print();
         }

         function quitter() {
             document.location.href = "index.php";
         }

         function supprimer() {
             const id = getIdChecked("choix");
             if (id == 0) {
                 alert("Veuillez choisir une ligne à supprimer");
                 return;
             }
             const response = confirm("Voulez-vous vraiment supprimer cette ligne?");
             if (response) {
                 document.location.href = `index.php?url=tiers&action=delete&id=${id}`;
             }
         }

         function afficher() {
             const id = getIdChecked('choix');
             if (id == 0) {
                 alert("Veuillez selectionner une ligne à afficher");
                 return;
             }
             document.location.href = `index.php?url=tiers&action=read&id=${id}`;
         }

         function creer() {

             document.location.href = "index.php?url=tiers&action=create"
         }

         function modifier() {
             const id = getIdChecked("choix");
             if (id == 0) {
                 alert("Veuillez choisir une ligne à modifier");
                 return;
             }
             document.location.href = `index.php?url=tiers&action=update&id=${id}`;
         }
     </script>