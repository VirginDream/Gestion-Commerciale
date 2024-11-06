<div class="container-fluid my-4">
    <h1 class="titre bg-dark text-light text-center py-2"><?= strtoupper($title) ?></h1>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr class="bg-dark text-light">
                    <th class="text-center border border-secondary"><input class="hide" type="checkbox"></th>
                    <th class="text-center border border-secondary">LIBELLE</th>
                    <th class="text-center border border-secondary">URL</th>
                    <th class="text-center border border-secondary">ROLE</th>
                    <th class="text-center border border-secondary">ICONE</th>
                </tr>
            </thead>
            <tbody id="tbody_menu">
                <?= $rows ?>
            </tbody>
            <tfoot>
                <tr class="text-center bg-dark text-light border border-secondary">
                    <th colspan="5">Menu</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<div id="contextmenu" class="contextmenu position-absolute bg-white border shadow">
    <ul>
        <li><a href="javascript:creer()" class="nav-link"><i class="fab fa-creative-commons-remix mx-2"></i>Créer</a></li>
        <li><a href="javascript:afficher()" class="nav-link"><i class="fab fa-readme mx-2"></i>Afficher</a></li>
        <li><a href="javascript:modifier()" class="nav-link"><i class="fas fa-pen-fancy mx-2"></i>Modifier</a></li>
        <li><a href="javascript:supprimer()" class="nav-link"><i class="fas fa-eraser mx-2"></i>Supprimer</a></li>
    </ul>

</div>

<script>
    tbody_menu.addEventListener('contextmenu', (event) => {
        activerMenuContextuel(event);


    })

    function modifier() {
        const id = getIdChecked('choix');
        if (id == 0) {
            alert("Veuillez selectionner un menu!");
            return;
        }
        document.location.href = "index.php?url=menu&action=update&id=" + id;
    }

    function creer() {
        document.location.href = "index.php?url=menu&action=create";
    }

    function afficher() {
        const id = getIdChecked('choix');
        if (id == 0) {
            alert("Veuillez selectionner un menu!");
            return;
        }
        document.location.href = "index.php?url=menu&action=read&id=" + id;
    }

    function supprimer() {
        const id = getIdChecked("choix");
        if (id == 0) {
            alert("Veuillez choisir une ligne à supprimer");
            return;
        }
        const response = confirm("Voulez-vous vraiment supprimer cette ligne?");
        if (response) {
            document.location.href = `index.php?url=menu&action=delete&id=${id}`;
        }
    }
</script>