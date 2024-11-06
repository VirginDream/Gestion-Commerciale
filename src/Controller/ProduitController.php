<?php
namespace App\Controller;
use App\Service\MyFct;
use App\Model\EntityManager;
use App\Model\Produit;
//require_once("service/myFct.php");ty

    class ProduitController extends MyFct{
        public function __construct(){
            $pm=new EntityManager('produit','Produit');
            $cm=new EntityManager('categorie','Categorie');
            $action="list";
            $page=1;
            $categorie_id=0;
            $mot="";
            $nlpp=NLPP;
            extract($_GET);
            switch($action){
                case "list":
                    $file="view/produit/list.html.php";
                    $columns=["numProduit","designation"];
                    $type="object";
                    if($categorie_id==0){
                        $conditions=[];
                    }else{
                        $conditions=['categorie_id'=>$categorie_id];
                    }
                    $orderBy="order by id desc";
                    $limit=$nlpp;
                    $offset=($page-1)*$nlpp;
                    $produit_total=$pm->searchByCondition($columns,$mot,$conditions,$type);
                    $nb_total=count($produit_total);
                    $np=ceil($nb_total/$nlpp);
                    $variables=[
                        'title'=>'Liste des Produits',
                        'produits'=>$pm->searchByCondition($columns,$mot,$conditions,$type,$orderBy,$limit,$offset),
                        'categories'=>$cm->findAll(),
                        'page'=>$page,
                        'categorie_id'=>$categorie_id,
                        'mot'=>$mot,
                        'np'=>$np,
                    ];
                    $this->generatePage($file,$variables);
                    break;

                    case "read":
                        $file="view/produit/form.html.php";
                        $produit=$pm->find($id);
                        $categories=$cm->findAll();
                        $variables=[
                            'title'=>'Affichage produit',
                            'produit'=>$produit,
                            'categories'=>$categories,
                            'disabled'=>'disabled',
                        ];
                       
                        $base="view/base-pop-center.html.php";
                        $this->generatePage($file,$variables,$base);
                        break;

                        case "save":
                            //$this->printr ($_FILES);die;
                            if($_FILES['image']['name']){
                                $file=$_FILES['image'];
                                $name=$file['name'];
                                $tmp_name=$file['tmp_name'];
                                $copy=move_uploaded_file($tmp_name,"./Public/img/$name");
                                if($copy){
                                    $_POST['image']=$name;
                                }
                            }
                            $em=$cm;  //  $em=  EntityManager 
                            $entity_id=$_POST['categorie_id'];
                            $id=(int) $_POST['id'];
                            if($id==0){
                                $numProduit=$this->createNumEntity($em,$entity_id);
                                $_POST['numProduit']=$numProduit;
                            }
                            $pm->save($_POST);
                            header("location:index.php?url=produit");
                            break;

            

                    case "update":
                        $file="view/produit/form.html.php";
                        $produit=$pm->find($id);
                        $categories=$cm->findAll();
                        $variables=[
                            'title'=>'Nouveau produit',
                            'produit'=>$produit,
                            'categories'=>$categories,
                            'disabled'=>'',
                        ];
                        $this->generatePage($file,$variables);
                        break; 

                case 'delete':
                    $pm->delete($id);
                    header("location:index.php?url=produit");

                    break;

                    case "create":
                        $produit = new Produit();
                        $produit->setImage('aucne_image.jpg');
                        $categories = $cm->findAll();
                        $file = "view/produit/form.html.php";
                        $variables = [
                            "title" => "Création d'un Produit",
                            "produit" => $produit,
                            "categories" => $categories,
                            "disabled" => "",
                        ];
                        $this->generatePage($file, $variables);
                        break;

                case "search":
                    $columns=["numProduit","designation"];
                    $pm=new EntityManager('produit','Produit');
                    $produits=$pm->searchByCondition($columns,$mot);
                    $file="view/produit/list.html.php";
                    $variables=[
                        "title"=>"Recherche Produit",
                        "produits"=>$produits,
                    ];
                    $this->generatePage($file,$variables);
                    break;

                
                
        }
    }
    
    
}









