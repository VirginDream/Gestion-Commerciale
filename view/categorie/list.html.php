<div class="container my-4">
    <h1 class="text-center text-md-start mb-2 mb-md-0 bg-dark text-light">LISTE DES CATEGORIES</h1>
    <div class="d-flex flex-wrap justify-content-center justify-content-md-between my-2 d-print-none">
        <div class="btn btn-dark mx-2 my-1" onclick="creer()">Créer</div>
        <div class="btn btn-dark mx-2 my-1" onclick="afficher()">Afficher</div>
        <div class="btn btn-dark mx-2 my-1" onclick="modifier()">Modifier</div>
        <div class="btn btn-secondary mx-2 my-1" onclick="supprimer()">Supprimer</div>
        <div class="btn btn-secondary mx-2 my-1" onclick="quitter()">Quitter</div>
        <div class="btn btn-secondary mx-2 my-1" onclick="imprimer()">Imprimer</div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center"><input type="checkbox"></th>
                    <th class="text-center">ID</th>
                    <th class="text-center">PREFIXE</th>
                    <th class="text-center">LIBELLE</th>
                    <th class="text-center">N° INITIAL</th>
                    <th class="text-center">FORMAT</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($categories as $categorie) : ?>
                    <tr>
                        <td class="text-center"><input type="checkbox" id="<?= $categorie->getId() ?>" name="choix" onclick="onlyOne(this)"></td>
                        <td class="text-center"><?= $categorie->getId(); ?></td>
                        <td><?= $categorie->getPrefixe(); ?></td>
                        <td><?= $categorie->getLibelle(); ?></td>
                        <td class="text-center"><?= $categorie->getNumeroInitial(); ?></td>
                        <td><?= $categorie->getFormat(); ?></td>
                    </tr>
                <?php endforeach ?>

            </tbody>

            <tfoot>
                <tr>
                    <th class="bg-black text-light text-center" colspan="6">Nombre de Catégories: <?= count($categories) ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>



<script>
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
        const response = confirm("Voulez-vous bien supprimer cette ligne?");
        if (response) {
            document.location.href = `index.php?url=categorie&action=delete&id=${id}`;
        }
    }

    function afficher() {
        const id = getIdChecked("choix");
        if (id == 0) {
            alert("Veuillez choisir une ligne à afficher");
            return;
        }
        const url = "index.php?url=categorie&action=read&id=" + id;
        const w = window.screen.width * 0.8;
        const h = window.screen.height * 0.8;
        popupCenter(url, `Affichage de la catégorie id=${id}`, w, h);
    }

    function creer() {
        document.location.href = "index.php?url=categorie&action=create"
    }

    function modifier() {
        const id = getIdChecked("choix");
        if (id == 0) {
            alert("Veuillez choisir une ligne à modifier");
            return;
        }
        document.location.href = "index.php?url=categorie&action=update&id=" + id;
    }
</script>
















