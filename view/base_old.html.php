<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="Public\fontawesome-free-6.5.0-web\fontawesome-free-6.5.0-web\css\all.css">
    <script src="./public/js/myScript.js" defer></script>
    <title><?=(isset($title))?$title:"Gestion Commerciale"?></title>
</head>
<body>
    <header>
        <h1 class="gestion"><i class="fas fa-earth-americas mh-4"></i>GESTION COMMERCIALE <i class="fas fa-earth-europe mh-4"></i></h1>
        <div id="banner">
            <video src="public/img/banniere5.mp4" autoplay loop muted width="100%"></video>

        </div>
        <nav>
            <ul class="niveau-h1">
                <li><a href="index.php"><i class="fas fa-house-user mh-4"></i>Accueil</a></li>
                <li><a href="index.php?page=cv"><i class="fas fa-life-ring mh-4"></i>Mon CV</a></li>
                <li><a href="index.php?page=portfolio"><i class="fas fa-book-atlas mh-4"></i>Mon PortFolio</a></li>
                <li><a href="article.php" ><i class="fab fa-buysellads mh-4"></i>Art-AJAX</a></li>
                <li><a href="article-bis.php" ><i class="fab fa-buysellads mh-4"></i>Art-FORM</a></li>
                <li><a href="produit-bis.php" ><i class="fab fa-buysellads mh-4"></i>Produit</a></li>
                <li><a href="Client.php"><i class="fas fa-user-check mh-4"></i>Client</a></li>
                <li onclick="sousMenu(this)">
                    <a href="#" id="commande"><i class="fas fa-cash-register mh-4"></i>Commande</a>
                    <ul class="niveau-h2 hide">
                        <li><a href="commandes.php">Toutes Commandes</a></li>
                        <li><a href="">Devis</a></li>
                        <li><a href="">Facture</a></li>
                        <li><a href="">Appro</a></li>
                        <li><a href="">Livraison</a></li>
                    </ul> 
                </li>
                <li onclick="sousMenu(this)">
                    <a href="#"><i class="fas fa-wrench mh-4"></i>Paramètres &#9660;</a>
                    <ul class="niveau-h2 hide">
                        <li><a href="">User</a></li>
                        <li><a href="">Catégorie</a></li>
                        <li><a href="">Infos</a></li>
                        <li><a href="">Groupe</a></li>
                    </ul></li>
            </ul>
                 </li>


               


            </ul>


                <div class="flex align-items-center">
                <i class="fab fa-searchengin mh-4" onclick="chercher()"></i> 
                    <div class="line-input" >
                        <input onkeydown="touche(event)" type="search" placeholder="Rechercher..." id="mot" name="mot"  value="">
                        

                    </div>
                    <i class="fas fa-user mh-4"></i>
                    <div class="flex"><a href="login.html" class="login">Se Connecter</a></div>
                    
                    </div>

        </nav>



    </header>

    <main>
        <aside>
                <div id="logo">
                    <img id= "image"src="public/img/logo1.png" alt="" width="100%">

                </div>

                <h2 class="center" id="menu">MENU</h2>
                <ul class="niveau-v1">
                    <li><a href="#">Ouverture Caisse</a></li>
                    <li><a href="#">Fermeture Caisse</a></li>
                    <li><a href="#">Inventaire</a><span class="fleche-bas white">&#9660;</span>
                        <ul class="niveau-v2">
                            <li><a href="#">Biere</a></li>
                            <li><a href="#">Vin</a></li>
                            <li><a href="#">Cigarettes</a></li>
                            <li><a href="#">Alcool</a></li>
                        </ul>
                    
                    </li>
                </ul>

        </aside>

        <section class="main-image">
            <?=$content?>
        </section>


        <aside>
            <div id="image1" class="image"></div>

            <div id="image2" class="image"></div>

            <div id="image3" class="image"></div>

        </aside>


    </main>


    <footer>

        <h3 class="#ADF0D4">Copyright &copy DWWM-2024</h3>

    </footer>
        <div id="attente">
            <img src="Public/img/loader7.gif" alt="" class="" >
        </div>
        <script>
            function touche(event){
                if(event.keyCode == 13){
                    chercher();
                }
            }
        </script>
    
</body>
</html>