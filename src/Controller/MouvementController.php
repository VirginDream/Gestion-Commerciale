<?php
namespace App\Controller;
use App\Service\MyFct;
use App\Model\MouvementManager;
use App\Model\TypeMouvementManager;
use App\Model\Mouvement;

//require_once("service/myFct.php");

    class MouvementController extends MyFct{
        public function __construct(){
            $mg=new MouvementManager();
            $mmg=new TypeMouvementManager();
            $action="list";
            $page=1;
            $typeMouvement_id=0;
            $mot="";
            $nlpp=NLPP;
            extract($_GET);
            switch($action){
                case "list":
                    $file="view/mouvement/list.html.php";
                    $columns=["numMouvement","dateMouvement"];
                    $type="object";
                    if($typeMouvement_id==0){
                        $conditions=[];
                    }else{
                        $conditions=['typeMouvement_id'=>$typeMouvement_id];
                    }
                    $orderBy="order by id desc";
                    $limit=$nlpp;
                    $offset=($page-1)*$nlpp;
                    $mouvement_total=$mg->searchByCondition($columns,$mot,$conditions,$type);
                    $nb_total=count($mouvement_total);
                    $np=ceil($nb_total/$nlpp);
                    $variables=[
                        'title'=>'Liste des Mouvements',
                        'mouvements'=>$mg->searchByCondition($columns,$mot,$conditions,$type,$orderBy,$limit,$offset),
                        'typeMouvements'=>$mmg->findAll(),
                        'page'=>$page,
                        'typeMouvement_id'=>$typeMouvement_id,
                        'mot'=>$mot,
                        'np'=>$np,
                    ];
                    $this->generatePage($file,$variables);
                    break;

                    case 'read':
                        $file="view/mouvement/form.html.php";
                        $mouvement= $mg->find($id);
                        $variables=[
                            'title'=>'Affichage Mouvement',
                            'mouvement'=> $mouvement,
                            'disabled'=>'disabled',
                        ];
                        $this->generatePage($file,$variables);
                        break;

                        
                    case 'save':
                        $mg->save($_POST);
                        header("location:index.php?url=mouvement");
                        break;
                               
                               
                               

            

                    case "update":
                        $file="view/mouvement/form.html.php";
                        $mouvement=$mg->find($id);
                        $typeMouvements=$mmg->findAll();
                        $variables=[
                            'title'=>'Nouveau mouvement',
                            'mouvement'=>$mouvement,
                            'typeMouvements'=>$typeMouvements,
                            'disabled'=>'',
                        ];
                        $this->generatePage($file,$variables);
                        break; 

                    case 'delete':
                        $tm->delete($id);
                        header("location:index.php?url=mouvement");

                    break;

                    case "create":
                        $mouvement = new Mouvement();
                        $typeMouvements = $mmg->findAll();
                        $file = "view/mouvement/form.html.php";
                        $variables = [
                            "title" => "Création d'un Mouvement",
                            "mouvement" => $mouvement,
                            "typeMouvements" => $typeMouvements,
                            "disabled" => "",
                        ];
                        $this->generatePage($file, $variables);
                        break;
                        

                case "search":
                    $columns=["numMouvement","dateMouvement"];
                    $mg=new MouvementManager;
                    $mouvements=$mg->searchByCondition($columns,$mot);
                    $file="view/mouvement/list.html.php";
                    $variables=[
                        "title"=>"Recherche Mouvement",
                        "mouvements"=>$mouvements,
                    ];
                    $this->generatePage($file,$variables);
                    break;

                
                
        }
    }
    
    
}




?>




