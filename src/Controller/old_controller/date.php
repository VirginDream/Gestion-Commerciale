<?php
    require_once("service/myFct.php");
    date_default_timezone_set("Europe/Paris");



    //---------Affichage de chiffre--------------------------------
    $x=12354844455.128;

    $x=number_format($x,2,"." " ");
    echo " <h1> </h1>";









    $date="2024-08-20";






    //---------debut et fin de mois-----------
    $date=new DateTime();
    $debutMois=$date->format("01-m-Y");
    $finMois=$date->format("t-m-Y");

    echo "debut=$debutMois fin=$finMois";

//--------creation de date objet a partir d'un texte-------
    $date1="2024-04-12";
    $date2="2024-01-15";



    $date1=new DateTime($date1);
    $date2=new DateTime($date2);
   
    $j=$date1->diff($date2)->d;
    $h=$date1->diff($date2)->h;
    $m=$date1->diff($date2)->m;

    echo "<h1> j= $j h=$h m=$m  </h1>";


    //----------fomrat de'affichage d'une date-------------
    $date=new DateTime();
    echo $date->format("d/m/Y/H:i:s");
    printr($date);
    
