<?php
    session_start();
   /*  session_destroy(); */
    require_once("./src/Service/extra.php");
    // spl_autoload_register("router");
    spl_autoload_register("charger");
    // use App\Controller\TestController;
    // // $tc=new App\Controller\TestController;
    // $tc=new TestController;
    use App\Service\MyFct;
    if(!$_SESSION){
        $_SESSION=[
            'username'=>'Visiteur',
            'roles'=>['ROLE_USER'],
        ];
        $myFct=new MyFct;
        $menu=$myFct->afficherMenu();
        $_SESSION['menu']=$menu;

    }

    $url="accueil";
    extract($_GET);
    $controller=ucfirst($url)."Controller";  //----ucfirt met en majuscule le premier caratère de la variable $url
    $controller_file="src/Controller/$controller.php";
    if(file_exists($controller_file)){
        $controller="App\\Controller\\$controller";
        $page=new $controller;
    }else{
        echo "<h1>Désolé! Le fichier $controller_file n'existe pas </h1>";
    }




?> 
