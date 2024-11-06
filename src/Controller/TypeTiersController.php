<?php
namespace App\Controller;
use App\Service\MyFct;
use App\Model\EntityManager;
use App\Model\TypeTiers;
class TypeTiersController extends MyFct{

   
    public function __construct(){
   
        $ttm=new EntityManager('typeTiers','TypeTiers');
        $action = "list";
        extract($_GET);
        switch($action){
            case "list":
                $typetierss=$ttm->findAll([],"object","order by id desc");
                $files="view/typetiers/list.html.php";
                $variables=[
                    "title"=>"Listes des catégories",
                    "typetierss"=>$typetierss,
                ];
                $this->generatePage($files,$variables);
                break;
            case "read":
                $typetiers=$ttm->find($id);
                $files="view/typetiers/form.html.php";
                $variables=[
                    "title"=>"Détail d'un Tiers",
                    "typetiers"=>$typetiers,
                    "disabled"=>"disabled",
                ];
                $base="view/base-pop-center.html.php";
                $this->generatePage($files,$variables,$base);
                break;

            case "search":
                $columns=["prefixe","libelle","format"];
                $typetierss=$ttm->searchByCondition($columns,$mot);
                $files="view/typetiers/list.html.php";
                $variables=[
                    "title"=>"Recherche dans les catégories",
                    "typetierss"=>$typetierss,
                ];
                $this->generatePage($files,$variables);
                break;
            case "create":
                $typetiers=new TypeTiers();
                $file="view/typetiers/form.html.php";
                $variables=[
                    "title"=>"Création d'une Catégorie Tiers",
                    "typetiers"=>$typetiers,
                    "disabled"=>"",
                ];
                $this->generatePage($file,$variables);
                break;
            case "update":
                $typetiers=$ttm->find($id);
                $file="view/typetiers/form.html.php";
                $variables=[
                    "title"=>"Modifier un Tiers",
                    "typetiers"=>$typetiers,
                    "disabled"=>'',
                ];
                
                $this->generatePage($file,$variables);
                break;
            case "save":
                /* $this->printr($_POST); */ 
                $ttm->save($_POST);
                header("location: index.php?url=typetiers");
                exit();
                break;
            case "delete":
                $ttm->delete($id);
                header("location: index.php?url=typetiers");
                break;

        }
    }


}


















?>