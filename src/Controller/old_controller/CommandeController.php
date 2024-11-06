<?php
   // require_once("service/myFct.php");
   class CommandeController extends MyFct{
    function __construct()
    {
        $action="list";
        $code="TOUTE";
        $mot="";
        $categories=[
         "TOUTE"=>"Toutes catégories",
         "VTE"=>"Vente",
         "APP"=>"Appro",
         "INT"=>"Interne",
        
         
        ];
        $date= new DateTime();
        $debut=$date->format("Y-01-01");
        $fin=$date->format("Y-m-t");
        extract($_GET);
        switch($action) {
             case "list":
                 $file="view/command/liste.html.php";
                 $variables=[
                     'title'=>'Liste des Commandes',
                     'commandes'=>$this->getRows($code,$mot,$debut,$fin),
                     'code'=>$code,
                     'debut'=>$debut,
                     'fin'=>$fin,
                     'mot'=>$mot,
                     'categories'=>$categories,
                    
                 ];
                 $this->generatePage($file,$variables);
             break;
             
        }
     
        
    }
    //-----------liste fonctions---------

function getRows($code,$mot,$debut,$fin){
    $connexion=$this->connexion();
    if($mot){
        if($code!="TOUTE"){
            $condition= "where (numCommande like? or numClient like? or nomClient like? or adresseClient like?)
             and left(numCommande,3)=? and dateCommande between ? and ?";
            $values=["%$mot%","%$mot%","%$mot%","%$mot%",$code,$debut,$fin];
        }else{
            $condition= "where numCommande like? or numClient like? or nomClient like? or adresseClient like? and dateCommande between ? and ?";
            $values=["%$mot%","%$mot%","%$mot%","%$mot%",$debut,$fin];

        }
    }else{
        if($code!="TOUTE"){
            $condition= "where left(numCommande,3)=? and dateCommande between ? and ?";
            $values=[$code,$debut,$fin];
        }else{
            $condition='where dateCommande between ? and ?';
            $values=[$debut,$fin];    
        }
    }
    $sql="select * from listecommande $condition";
    $requete=$connexion->prepare($sql);
    $requete->execute($values);
    $rows=$requete->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
   

   }

  











?>