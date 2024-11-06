<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Public\bootstrap-5.3.3-dist\css\bootstrap.css">
  <link rel="stylesheet" href="Public\fontawesome-free-6.5.0-web\fontawesome-free-6.5.0-web\css\all.css">
  <script src="Public\bootstrap-5.3.3-dist\js\bootstrap.bundle.js" defer></script>
  <script src="Public\js\myScript.js" defer></script>
  <link rel="stylesheet" href="Public\css\style_bs.css">
    <title><?=(isset($title))?$title:"Gestion Commerciale"?></title>
</head>
<body>
    
 

    <main class="w100">
       

        <section class="w100">
            <?=$content?>
        </section>


    


    </main>


    
        <script>
            function touche(event){
                if(event.keyCode == 13){
                    chercher();
                }
            }
        </script>
    
</body>
</html>