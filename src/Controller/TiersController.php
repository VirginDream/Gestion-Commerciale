<?php
namespace App\Controller;
use App\Service\MyFct;
use App\Model\Tiers;
use App\Model\EntityManager;
//require_once("service/myFct.php");

    class TiersController extends MyFct{
        public function __construct(){
            $tm=new EntityManager('tiers','Tiers');
            $ttm=new EntityManager('typetiers','TypeTiers');
            $action="list";
            $page=1;
            $typeTiers_id=0;
            $mot="";
            $nlpp=NLPP;
            extract($_GET);
            switch($action){
                case "list":
                    $file="view/tiers/list.html.php";
                    $columns=["numTiers","nomTiers","adresseTiers"];
                    $type="object";
                    if($typeTiers_id==0){
                        $conditions=[];
                    }else{
                        $conditions=['typeTiers_id'=>$typeTiers_id];
                    }
                    $orderBy="order by id desc";
                    $limit=$nlpp;
                    $offset=($page-1)*$nlpp;
                    $tiers_total=$tm->searchByCondition($columns,$mot,$conditions,$type);
                    $nb_total=count($tiers_total);
                    $np=ceil($nb_total/$nlpp);
                    $variables=[
                        'title'=>'Liste des Tierss',
                        'tierss'=>$tm->searchByCondition($columns,$mot,$conditions,$type,$orderBy,$limit,$offset),
                        'typeTierss'=>$ttm->findAll(),
                        'page'=>$page,
                        'typeTiers_id'=>$typeTiers_id,
                        'mot'=>$mot,
                        'np'=>$np,
                    ];
                    $this->generatePage($file,$variables);
                    break;

                    case 'read':
                        $file="view/tiers/form.html.php";
                        $tiers= $tm->find($id);
                        $variables=[
                            'title'=>'Affichage Tiers',
                            'tiers'=> $tiers,
                            'disabled'=>'disabled',
                        ];
                        $this->generatePage($file,$variables);
                        break;

                        
                    case 'save':
                        $em=$ttm;  //  $em=  EntityManager 
                        $entity_id=$_POST['typeTiers_id'];
                        $id=(int) $_POST['id'];
                        if($id==0){
                            $numtiers=$this->createNumEntity($em,$entity_id);
                            $_POST['numTiers']=$numtiers;
                        }
                        $tm->save($_POST);
                        header("location:index.php?url=tiers");

                        break;
                               
                               
                               

            

                    case "update":
                        $file="view/tiers/form.html.php";
                        $tiers=$tm->find($id);
                        $typetierss=$ttm->findAll();
                        $variables=[
                            'title'=>'Nouveau tiers',
                            'tiers'=>$tiers,
                            'typeTierss'=>$typetierss,
                            'disabled'=>'',
                        ];
                        $this->generatePage($file,$variables);
                        break; 

                    case 'delete':
                        $tm->delete($id);
                        header("location:index.php?url=tiers");

                    break;

                    case "create":
                        $tiers = new Tiers();
                        $typetierss = $ttm->findAll();
                        $file = "view/tiers/form.html.php";
                        $variables = [
                            "title" => "Création d'un Tiers",
                            "tiers" => $tiers,
                            "typeTierss" => $typetierss,
                            "disabled" => "",
                        ];
                        $this->generatePage($file, $variables);
                        break;
                        

                case "search":
                    $columns=["numTiers","nomTiers","adresseTiers"];
                    $tm=new EntityManager('tiers','Tiers');
                    $tierss=$tm->searchByCondition($columns,$mot);
                    $file="view/tiers/list.html.php";
                    $variables=[
                        "title"=>"Recherche Tiers",
                        "tierss"=>$tierss,
                    ];
                    $this->generatePage($file,$variables);
                    break;

                
                
        }
    }
    
    
}




?>




