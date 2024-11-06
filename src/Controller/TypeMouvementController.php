<?php

namespace App\Controller;
use App\Service\MyFct;
use App\Model\EntityManager;
use App\Model\TypeMouvement;
class TypeMouvementController extends MyFct{

   
    public function __construct(){
   
        $tmm=new EntityManager('typemouvement','TypeMouvement');
        $action = "list";
        extract($_GET);
        switch($action){
            case "list":
                $typemouvements=$tmm->findAll([],"object","order by id desc");
                $files="view/typemouvement/list.html.php";
                $variables=[
                    "title"=>"Listes des catégories",
                    "typemouvements"=>$typemouvements,
                ];
                $this->generatePage($files,$variables);
                break;
            case "read":
                $typemouvement=$tmm->find($id);
                $files="view/typemouvement/form.html.php";
                $variables=[
                    "title"=>"Détail d'un Mouvement",
                    "typemouvement"=>$typemouvement,
                    "disabled"=>"disabled",
                ];
                $base="view/base-pop-center.html.php";
                $this->generatePage($files,$variables,$base);
                break;

            case "search":
                $columns=["prefixe","libelle","format"];
                $typemouvements=$tmm->searchByCondition($columns,$mot);
                $files="view/typemouvement/list.html.php";
                $variables=[
                    "title"=>"Recherche dans les catégories",
                    "typemouvements"=>$typemouvements,
                ];
                $this->generatePage($files,$variables);
                break;
            case "create":
                $typemouvement=new TypeMouvement();
                $file="view/typemouvement/form.html.php";
                $variables=[
                    "title"=>"Création d'une Catégorie Mouvement",
                    "typemouvement"=>$typemouvement,
                    "disabled"=>"",
                ];
                $this->generatePage($file,$variables);
                break;
            case "update":
                $typemouvement=$tmm->find($id);
                $file="view/typemouvement/form.html.php";
                $variables=[
                    "title"=>"Modifier un Mouvement",
                    "typemouvement"=>$typemouvement,
                    "disabled"=>'',
                ];
                
                $this->generatePage($file,$variables);
                break;
            case "save":
                /* $this->printr($_POST); */ 
                $tmm->save($_POST);
                header("location: index.php?url=typemouvement");
                exit();
                break;
            case "delete":
                $tmm->delete($id);
                header("location: index.php?url=typemouvement");
                break;

        }
    }


}


















?>