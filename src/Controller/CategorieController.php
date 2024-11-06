<?php

    namespace App\Controller;
    use App\Service\MyFct;
    use App\Model\EntityManager;
    use App\Model\Categorie;
    class CategorieController extends MyFct{
        public function __construct()
        {   
            $cm=new EntityManager('categorie','Categorie');
            $action="list";
            extract($_GET);
            switch($action){
                
                case 'list':
                    $cm=new EntityManager('categorie','Categorie');
                    $categories=$cm->findAll([],"object","order by id desc");
                    $file="view/categorie/list.html.php";
                    $variables=[
                        "title"=>"Liste des categories",
                        "categories"=>$categories,
                    ];
                    $this->generatePage($file,$variables);
                    break;
                case 'read':
                    
                    $categorie=$cm->find($id);
                    $file="view/categorie/form.html.php";
                    $variables=[
                        "title"=>"Afficher une categorie",
                        "categorie"=>$categorie,
                        "disabled"=>"disabled",
                    
                    ];
                    $base="view/base-pop-center.html.php";
                    $this->generatePage($file,$variables,$base);


                    break;    
                case 'save':
                    $cm->save($_POST);
                    header("location:index.php?url=categorie");
                    exit();
                    break;
                case 'update':
                    $cm=new EntityManager('categorie','Categorie');
                    $categorie=$cm->find($id);
                    $file="view/categorie/form.html.php";
                    $variables=[
                        "title"=>"Modifier une categorie",
                        "categorie"=>$categorie,
                        "disabled"=>"",
                    ];
                    $this->generatePage($file,$variables);

                    break;
                case 'delete':
                    $cm->delete($id);
                    header("location:index.php?url=categorie");

                    break;

                case "create":
                        $categorie=new Categorie();
                        $file="view/categorie/form.html.php";
                        $variables=[
                            "title"=>"Création d'une Catégorie",
                            "categorie"=>$categorie,
                            "disabled"=>"",
                        ];
                        $this->generatePage($file,$variables);
                        break;
                case "search":
                    $columns=["prefixe","libelle","format"];
                    $cm=new EntityManager('categorie','Categorie');
                    $categories=$cm->searchByCondition($columns,$mot);
                    $file="view/categorie/list.html.php";
                    $variables=[
                        "title"=>"Recherche Categorie",
                        "categories"=>$categories,
                    ];
                    $this->generatePage($file,$variables);
                    break;

                
                
            }
        }
      

    }




?>