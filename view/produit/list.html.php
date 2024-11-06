<div class="container my-4">
    <div id="entete" class="bg-dark text-light py-4 d-flex flex-column flex-md-row justify-content-between align-items-center form-container">
        <h2 class="text-center text-md-start mb-2 mb-md-0">LISTE DES PRODUITS</h2>
        <select name="categorie_id" id="categorie_id" class="form-select w-100 w-md-30" onChange="showCategorie(event)">
            <option value="0">Catégories</option>
            <?php foreach($categories as $categorie) : ?>
                <option value="<?=$categorie->getId()?>" <?= $categorie_id == $categorie->getId() ? 'selected' : '' ?>>
                    <?=$categorie->getLibelle()?>
                </option>
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
                    <th><input type="checkbox"></th>
                    <th>ID</th>
                    <th>IMAGE</th>
                    <th>CODE</th>
                    <th>DESIGNATION</th>
                    <th>PU</th>
                    <th>PR</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($produits as $produit) : ?>
                    <tr>
                        <td class="text-center"><input type="checkbox" id="<?=$produit->getId()?>" name="choix" onclick="onlyOne(this)"></td>
                        <td class="text-center"><?=$produit->getId();?></td>
                        <td class="text-center"><img src="public/img/<?=$produit->getImage()?>" alt="" class="img-fluid image"></td>
                        <td><?=$produit->getNumProduit();?></td>
                        <td><?=$produit->getDesignation();?></td>
                        <td class="text-center"><?=$produit->getPrixUnitaire();?></td>
                        <td class="text-center"><?=$produit->getPrixRevient();?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot class="border border-secondary">
                <tr class="bg-dark text-light text-center">
                    <td colspan="7">Nombre de Produits = <?=count($produits)?></td>
                </tr>
                <tr class="bg-dark text-light text-center">
                    <td colspan="7">Page : <?=$page?> / <?=$np?></td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="d-flex justify-content-center my-4">
        <?php for($i = 1; $i <= $np; $i++) : ?>
            <button class="btn btn-sm btn-secondary mx-1" id="<?=$i?>" onclick="showPage(event)"><?=$i?></button>
        <?php endfor ?>
    </div>
</div>

<script>
    function choisirCategorie() {
        document.location.href = `index.php?url=produit&action=list&page=1&categorie_id=${categorie_id}&mot=${mot.value}`;
    }

    function showCategorie(event) {
        const categorie_id = event.target.value;
        document.location.href = `index.php?url=produit&action=list&page=1&categorie_id=${categorie_id}&mot=<?=$mot?>`;
    }

    function showPage(event) {
        const page = event.target.id;
        document.location.href = `index.php?url=produit&action=list&page=${page}&categorie_id=<?=$categorie_id?>&mot=<?=$mot?>`;
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
        const response = confirm("Voulez-vous vraiment supprimer cette ligne ?");
        if (response) {
            document.location.href = `index.php?url=produit&action=delete&id=${id}`;
        }
    }

    function afficher() {
        const id = getIdChecked('choix');
        if (id == 0) {
            alert("Veuillez sélectionner une ligne à afficher");
            return;
        }
        document.location.href = `index.php?url=produit&action=read&id=${id}`;
    }

    function creer() {
        document.location.href = "index.php?url=produit&action=create";
    }

    function modifier() {
        const id = getIdChecked("choix");
        if (id == 0) {
            alert("Veuillez choisir une ligne à modifier");
            return;
        }
        document.location.href = `index.php?url=produit&action=update&id=${id}`;
    }
</script>