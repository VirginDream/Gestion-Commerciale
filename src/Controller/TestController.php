<?php
namespace App\Controller;
use App\Service\MyFct;
use App\Model\Manager;
    class TestController extends Manager {
        function __construct(){
            echo"Bonjour";die;
           $action="demo1"; // index.php?url=test&action=demo1
           extract($_GET);
           switch($action){
            
                

                case 'demo6' :
                    $table="article";
                    $data=["id"=>44, "numArticle"=>"XX0026","designation"=>"Cartable Amazing","prixUnitaire"=>76.00];
                    $this->saveTable($table,$data);
                    echo "Sauvegarde Effectuée";
                    die;
                    break;
            
                case 'demo5':
            
                    $table='article';
                    $columns=["designation","numArticle"];
                    $mot="a";
                    $conditions=["left(numArticle,2)"=>"BB"];
                    $rows=$this->searchTableByCondition($table,$columns,$mot,$conditions);
                    $this->printr($rows);
                    break; 


                case 'demo4':
                    $table='article';
                    $columns=["designation","numArticle"];
                    $mot="BB";
                    $resultats=$this->searchRows ($table,$columns,$mot);
                    $this->printr($resultats);
                    die;
                    break;

            
                case 'demo3';
                    $colonnes=$this->getColumnsTable('article');
                    $this->printr($colonnes);
                    die;
                    break;
                    case 'demo2';
                    $id=5;
                    $table="article";
                    $resultat=$this->findTable($table,$id);
                    $this->printr($resultat);
                    die;

                    break;
                case 'demo1';
                    $m= new Manager();
                    $table="article";
                    $conditions=["left(numArticle,2)"=>"BB"];
                    $articles=$m->findAllTable($table,$conditions);
                    $mf=new MyFct();
                    $mf->printr($articles);
                    die;

                    break;
           
           
        }
    }
}







?>