<?php
    //require_once('service/myFct.php');
    class CommandeController extends MyFct{
        function __construct()
        {
            $action='list';
            extract($_GET);
            $date= new DateTime();
            $debut=$date->format("Y-01-01");
            $fin=$date->format("Y-m-t");
            switch($action){
            case 'list':
                $file='view/Command/liste.html.php';
                $listecommandes=$this->getListeCommandes();
                // printr(listecommandes)
                $variables=[
                    'title'=>'Liste des Commandes',
                    'listecommandes'=>$listecommandes,
                    'debut'=>$debut,
                    'fin'=>$fin

                ];
            $this->generatePage($file,$variables);



            break;

        case 'search':
            $file='view/Command/list.html.php';
            $listecommandes=$this->getListeCommandes();
            $variables=[
                'title'=>'Liste des Commandes',
                'listecommandes'=>$listecommandes
            ];
            $this->generatePage($file,$variables);

    }
        }
         /*--------------------Mes fonctions------------------*/

    function getListeCommandes($mot=""){
        if($mot){
            $condition="where nomClient like? or numCommande like? or nomClient like? or adresseClient like?";
            $values=["%$mot%","%$mot%","%$mot%","%$mot%"];


        }else{
            $condition='';
            $values=[];

        }
        $sql="SELECT * FROM listecommande $condition";
        $connexion=$this->connexion();
        $sql="SELECT * FROM listecommande";
        $requete=$connexion->prepare($sql);
        $requete->execute($values);
        $listecommandes=$requete->fetchAll(PDO::FETCH_ASSOC);
        return $listecommandes;

    }
    }
    


   












?>