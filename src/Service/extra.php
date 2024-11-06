<?php

 


    function router($class){
        $fichierModel="model/$class.php";
        $fichierController="controller/$class.php";
        $fichierService="service/$class.php";
        $fichiers=[$fichierModel,$fichierController,$fichierService];
        foreach($fichiers as $fichier){
            if(file_exists($fichier)){
                require_once($fichier);
                break;
            }
        }
        

    }

    function charger($class){
        /** App\Model\Article */
    
    $file=str_replace("App","src",$class);
    // src\Model\Article
    $file=str_replace("\\","/",$file);
    $file="$file.php";
    if(file_exists($file)){
        require_once($file);
    }

    }





 // function printr($array){
 // echo "<pre>";
 // print_r($array);
 // echo "</pre>";
//}//





?>