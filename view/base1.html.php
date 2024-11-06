<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Public\bootstrap-5.3.3-dist\css\bootstrap.css">
  <link rel="stylesheet" href="Public\fontawesome-free-6.5.0-web\fontawesome-free-6.5.0-web\css\all.css">
  <script src="Public\bootstrap-5.3.3-dist\js\bootstrap.bundle.js" defer></script>
  <script src="Public\js\myScript.js" defer></script>
  <link rel="stylesheet" href="Public\css\style_bs.css">
  <title>
    <?= isset($title) ? $title : "Gestion Commerciale" ?>
  </title>
</head>

<body>
  <?php
     $session_username=$_SESSION['username'];
  ?>
  <div class="container-fluid">
    <header class="d-print-none">
      <h1 class="text-center bg-dark text-light fw-bold">GESTION COMMERCIALE</h1>
      <div id="banner">
        <video autoplay loop muted src="./public/img/banniere5.mp4" width="100%"></video>
      </div>
      <nav class="navbar navbar-expand-md bg-dark text-light my-2">
        <a href="#" class="text-light mx-2"><i class="fa fa-laptop fa-2x"></i></a>
        <a href="#nav" class="btn bg-light text-dark mx-2 navbar-toggler" data-bs-toggle="collapse"><i
            class="fa fa-bars"></i></a>
        <div class="collapse navbar-collapse justify-content-between" id="nav">
          <ul class="nav navbar-nav">
            <li class="nav-item mx-2"><a href="index.php?url=accueil" class="nav-link text-light fs-5"><i
                  class="fas fa-house-user me-2"></i>Accueil</a>
            </li>
            <?php if(MyFct::isGranted('ROLE_APPRO')):?>
            <li class="nav-item mx-2"><a href="index.php?url=produit" class="nav-link text-light fs-5"><i
                  class="fas fa-newspaper me-2"></i>Produit</a>
            </li>
            <?php endif ?>
            <?php if(MyFct::isGranted('ROLE_APPRO')):?>
            <li class="nav-item mx-2"><a href="index.php?url=tiers" class="nav-link text-light fs-5"><i
                  class="fas fa-users me-2"></i>Tiers</a>
            </li>
            <?php endif ?>


            </li>

            <?php if(MyFct::isGranted('ROLE_VENTE')):?>
            <li class="nav-item mx-2 dropdown"><a href="" class="nav-link text-light fs-5 dropdown-toggle"
                data-bs-toggle="dropdown" data-bs-auto-close="outside"><i
                  class="fas fas fa-boxes-packing me-2"></i>Commande</a>
              <ul class="dropdown-menu custom-dropdown-menu">
                <li class="nav-item "><a href="index.php?url=mouvement" class="nav-link">Toutes Commandes</a></li>
                <li class="nav-item dropend"><a href="" class="nav-link dropdown-toggle "
                    data-bs-toggle="dropdown">Vente</a>
                  <ul class="dropdown-menu">
                    <li class="nav-item"><a href="" class="nav-link">Au Comptant</a></li>
                    <li class="nav-item"><a href="" class="nav-link">A Crédit</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Offert</a></li>
                  </ul>
                </li>
                <li class="nav-item"><a href="" class="nav-link">Appro</a></li>
                <li class="nav-item"><a href="" class="nav-link">Interne</a></li>
              </ul>
            </li>


            <?php endif ?>
            <?php if(MyFct::isGranted('ROLE_ADMIN')):?>
            <li class="nav-item dropdown"><a href="" class="nav-link text-light fs-5 dropdown-toggle"
                data-bs-toggle="dropdown"><i class="fas fa-gears me-2"></i>Parametre</a>

              <ul class="dropdown-menu">
                <li class="nav-item"><a href="index.php?url=categorie" class="nav-link">Categorie</a></li>
                <li class="nav-item"><a href="index.php?url=typeTiers" class="nav-link">Type Tiers</a></li>
                <li class="nav-item"><a href="index.php?url=typeMouvement" class="nav-link">Type Mouvement</a></li>
                <li class="nav-item"><a href="index.php?url=security" class="nav-link">User</a></li>
                <li class="nav-item"><a href="index.php?url=role" class="nav-link">Role</a></li>
              </ul>
            </li>
            <?php endif ?>




            </li>
          </ul>
          <div class="d-flex position-relative">
            <a href="" class="nav-link text-light dropdown-toggle fs-5 my-1 mx-2" data-bs-toggle="dropdown"><i
                class="fas fa-comments"></i><sup id="id_nonLu"></sup></a>
            <ul class="dropdown-menu w100">
              <li class="nav-item w100">
                <table class="w100 scroll-sm">
                  <thead>
                    <tr class="bg-dark text-light">
                      <th class="border border-white w20 text-center">Auteur</th>
                      <th class="border border-white w30 text-center">Message</th>
                      <th class="border border-white w20 text-center">Fichier</th>
                      <th class="border border-white w20 text-center">Date</th>
                      <th class="border border-white w10 text-center">Lu<br><input type="checkbox" id="allCheck"
                          name="allCheck" class="mx-2"></th>
                    </tr>
                  </thead>
                  <tbody id="tbody_message" class="bg-dark text-light text-center">
                  </tbody>
                  <tfoot>
                    <tr>
                      <td class="w20"><input type="text" id="auteur" name="auteur" class="form-control mx-1"
                          onkeydown="touche1(event)"></td>
                      <td class="w30"><input type="text" id="message" name="message" class="form-control mx-2"
                          onkeydown="touche2(event)"></td>
                      <td colspan="2" class="w40"><input type="file" id="file" name="file" class="form-control mx-2">
                      </td>
                      <td class="w10 text-center"><button class="btn btn-sm btn-dark w80"
                          onclick="envoyerMessage()"><i class="fa fa-paper-plane"></i></button></td>
                    </tr>
                    </tr>
                    </tr>
                  </tfoot>
                </table>
              </li>
            </ul>
            <button id="etat" class="border-0" onclick="changerEtat()"></button>
            <div class="input-group">
              <input type="text" onkeydown="touche(event)" id="mot" name="mot" class="form-control" autocomplete="off"
                placeholder="Mot à chercher">
              <button class="btn bg-light mx-2" onclick="chercher(event)"><i class="fa fa-search"></i></button>
              <?php if($session_username=="Visiteur") :?>
              <div class="relative">
                <a href="javascript:void()" class="nav-link text-light fs-4 dropdown-toggle"
                  data-bs-toggle="dropdown"><i class="fa fa-user mx-2"></i>
                  <?=$session_username?>
                </a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a href="index.php?url=security&action=login" class="nav-link">Se connecter</a>
                  </li>
                  <li class="nav-item"><a href="index.php?url=security&action=register" class="nav-link">S'inscrire</a>
                  </li>
                </ul>
              </div>
              <?php else :?>
              <div class="relative">
                <a href="javascript:void()" class="nav-link text-light fs-4 dropdown-toggle"
                  data-bs-toggle="dropdown"><i class="fa fa-user mx-2"></i>
                  <?=$session_username?>
                </a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a href="index.php?url=security&action=logout" class="nav-link">Se
                      deconnecter</a></li>
                  <li class="nav-item"><a href="" class="nav-link">Profil</a></li>
                  <li class="nav-item"><a href="" class="nav-link">Changer le mot de passe</a></li>
                </ul>
              </div>
              <?php endif ?>



            </div>
          </div>
        </div>
      </nav>
    </header>
    <main class="container-fluid">

      <div class="row">

        <aside class="col-md-2 d-print-none">
          <div class="card">
            <div class="card-header">
              <div class="clignote">
                <h2 class="text-center"><span class="badge bg-dark">ABONNE-TOI</span></h2>
              </div>
            </div>
            <img src="Public\img\femme5.jpg" alt="">
            <ul class="list-group list-group-flush">
              <li class="list-group-item text-center text-2x">
                <h3><span class="badge bg-dark">Réservation en Ligne</span></h3>
              </li>
              <li class="list-group-item text-center">
                <h3><span class="badge bg-dark">Live Cam</span></h3>
              </li>
              <li class="list-group-item text-center">
                <h3><span class="badge bg-dark">Tchat en direct</span></h3>
              </li>


            </ul>
          </div>

        </aside>

        <section class="col-md-8">
          <?= $content ?>
        </section>

        <aside class="col-md-2">

          <div class="card text-light">
            <img src="Public\img\femme6.jpg" class="card-img">
            <div class="card-img-overlay">

              <h5 class="cart-title text-center"><span class="badge bg-dark">Elle t'attends...</span></h5>
              <p class="card-text">Profite de ta période d'essai!!</p>

              <div class="card-header">
                <div class="clignote">
                  <h2 class="text-center"><span class="badge bg-dark">7 JOURS D'ESSAI</span></h2>
                </div>
              </div>



            </div>
          </div>






        </aside>




      </div>








    </main>

    <footer class="bg-dark text-white d-flex justify-content-center align-items-center d-print-none">
      <h3>Copyright &copy DWWM-2024</h3>



    </footer>



    <div id="attente">
      <img src="./public/img/loader7.gif" alt="">
    </div>
  </div>
  <script>
    window.setInterval(verifierEtat, 5000);
    getMessage();

    /*   function chercher(event){
        document.location.href=`index.php?url=categorie&action=search&mot=${mot.value}`;
      }
   */
    function verifierEtat() {
      if (etat.classList.contains('bg-success')) {
        getMessage();
      }
    }


    function getMessage() {
      fetch("index.php?url=accueil&page=message_read")
        .then(response => response.json())
        .then(response => {
          let html = "";
          const nonLu = response.nonLu;
          let messages = response.messages;
          messages = messages.reverse(); //inversion ordre tableau//
          messages.forEach(message => {
            const fichier = (message.file) ? `<a href="./Public/file/${message.file}" download><i class="fas fa-paperclip"></i></a>` : '';
            let color = (!message.lu) ? 'text-danger' : '';
            html += ` 
                    <tr class="${color}">
                        <td class="w20">${message.auteur}</td>
                        <td class="w30">${message.message}</td>
                        <td class="w30 text-center">${fichier}</td>
                        <td class="w10 text-center">${message.reception}</td>
                        <td class="w10 text-center"><input type="checkbox" id="${message.id}" name="lu"></td>
                    </tr>
                    `

          });
          if (nonLu != 0) {
            id_nonLu.innerHTML = `(${nonLu})`;
          } else {
            id_nonLu.innerHTML = '';
          }

          tbody_message.innerHTML = html;
          tbody_message.scrollTop = tbody_message.scrollHeight;
          hideLoader();
        })
    }
    allCheck.addEventListener('change', function () {
      let checkboxes = document.getElementsByName('lu');
      checkboxes.forEach((checkbox) => checkbox.checked = this.checked);
    });






    function changerEtat() {
      etat.classList.toggle("bg-success");

    }


    function touche1(event) {
      if (event.keyCode == 13) {
        message.focus();

      }
    }

    function touche2(event) {
      if (event.keyCode == 13) {
        envoyerMessage();

      }
    }

    function envoyerMessage() {
      showLoader();
      let lus = [];
      let elements = document.getElementsByName("lu");
      elements.forEach((element) => {
        if (element.checked == true) {
          lus.push(element.id);
        }
      })
      let data = new FormData();
      data.append('auteur', auteur.value);
      data.append('message', message.value);
      data.append('file', file.files[0]);
      data.append('lus', JSON.stringify(lus));
      fetch("index.php?url=accueil&page=message_write", {

        method: "POST",
        body: data
      })

        .then(response => response.text())
        .then(response => {
          message.value = "";
          getMessage();
        })
        .catch(function (error) {
          console.log(error);
          alert("Erreur de connexion au serveur");
        })
    }


    function envoyerMessage_old() {
      let data = new FormData();
      data.append('auteur', auteur.value);
      data.append('message', message.value);
      fetch("index.php?url=accueil&page=message_write", {

        method: "POST",
        body: data
      })

        .then(function (response) {
          return response.text();
        })
        .then(function (data) {
          alert(data);
        })
        .catch(function (error) {
          console.log(error);
          alert("Erreur de connexion au serveur");
        })
    }
  </script>

</body>

</html>