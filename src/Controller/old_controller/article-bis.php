<?php
    require_once("service/myFCT.php");
    $action="list";
    extract($_GET);
    switch($action){
        case "list":
            $file="view/article/list-bis.html.php";
            $articles=findAll();
            $variables=[
                "title"=>" Liste des Articles",
                "articles"=>$articles,
                'disabled'=>'',
               

            ];
            generatePage($file,$variables);
            break;

            //case "create":

            //    $file="view/article/form-bis.html.php";
            //    $article=[
            //        "id"=>"0",
            //        "numArticle"=>"",
            //        "designation"=>"",
            //        "prixUnitaire"=>"0.00",
            //        "image"=>"aucne_image.jpg",
            //    ];
            //    $variables=[
            //        "title"=>"Création d'un Article",
            //        "article"=>$article,
            //        'disabled'=>'',
            //        "color"=>"",
            //        "submitted"=>0,
            //    ];
            //    $base="view/pop-center.html.php";
            //    //header("location:article-bis.php");
            //    generatePage($file,$variables,$base);

            //break;

            case "update":

               if($_POST){
                   $data=$_POST;
                   $files=$_FILES;
                   save($data,$files);
                   header("location:article-bis.php");
               }
               
                   $article=find($id);
                   $variables=['title'=>'Modification article', 
                   'article'=>$article ,
                   'disabled'=>'',
                   "color"=>""];
                   $file="view/article/form-bis.html.php";
                   $base="view/base-pop-center.html.php";
                   generatePage($file,$variables,$base);


            break;
            
            case 'save':
                extract($_POST);
                $exist = existArticle($numArticle, $id);
                if ($exist) {
                    $file = "view/accueil/message.html.php";
                    $variables = [
                        'title' => 'Message d\'erreur',
                        "message" => "Numéro d'article déjà utilisé par l'article " . $exist['designation']
                    ];
                    generatePage($file, $variables);
                } else {
                    save($_POST, $_FILES);
                    // header("location:article-bis.php");
                    $file = "view/article/form-bis.html.php";
                    $article = $_POST;
                    $variables = ['title' => "Article enregistré", 'article' => $article, 'submitted' => 1, 'disabled' => '', "color" => ""];
                    $base = "view/base-pop-center.html.php";
                    generatePage($file, $variables, $base);
                }

                break;
        

            case "show":
                $article=find($id);
                $variables=['title'=>'Affichage Article','article'=>$article,'disabled'=>'disabled',"color"=>"white"];
                $file="view/article/form-bis.html.php";
                $base="view/base-pop-center.html.php";
                generatePage($file,$variables,$base);
                break;


            case "delete":
                $exist=existOnLigneCommande($id);
                if($exist){
                   $message="Cet article est utilisé dans une commande, vous ne pouvez pas le supprimer";
                   $file="view/article/list-bis.html.php";
                   $variables=[
                    "title"=>"Suppression Article",
                    "message"=> $message,
                    'articles'=>findAll()];
                    
                    generatePage($file,$variables);
                    
                }else{
                    delete($id);
                    header("location:article-bis.php");

                }
               
               
                break;

                case "delete_bis":
                    $exist=existOnLigneCommande($id);
                    if($exist){
                        $file="view/accueil/message.html.php";
                        $variables=[
                            'title'=>"Message d\'erreur",
                            'message'=>"Cet article est utilisé dans une commande, vous ne pouvez pas le supprimer"


                        ];
                        generatePage($file,$variables);

                    } else{
                        delete($id);
                        header("location:article-bis.php");
                    }

                    case "search":
                        $article= findAll($mot);
                        $file= "view/article/list-bis.html.php";
                        $variables= [
                            "title"=>"Recherche Article",
                            "articles"=>$article,
                            
                        ];
                        generatePage($file,$variables);
                        break;
                    
                    


                    case "create":
                        $file="view/article/form-bis.html.php";
                        $article=[
                            "id"=>"0",
                            "numArticle"=>"",
                            "designation"=>"",
                            "prixUnitaire"=>"0.00",
                            "image"=>"aucne_image.jpg",
                        ];
                        $variables=[
                            "title"=>"Création d'un Article",
                            "article"=>$article,
                            "disabled"=>"",
                            'submitted'=>'0',
                            "color"=>"",
                        ];
                        $base="view/base-pop-center.html.php";
                        generatePage($file,$variables,$base);

                        break;

    }


    /*****les fonctions */




    

    function findAll($mot=""){
        $connexion=connexion();
        if($mot){
            $sql="select * from article where numArticle like ? or designation like ? order by id desc";
            $requete=$connexion->prepare($sql);
            $requete->execute(["%$mot%","%$mot%"]);



        }else{
            $sql="select * from article order by id desc";
            $requete=$connexion->prepare($sql);
            $requete->execute();


        }
        $articles=$requete->fetchAll(PDO::FETCH_ASSOC);
        return $articles;
    }

    

    function save($data, $files)
    {
    
        $connexion = connexion();
        extract($data);
        $id = (int) $id;
        if ($files['file']) {
            $name = $files['file']['name'];
            $source = $files['file']['tmp_name'];
            move_uploaded_file($source, "public/img/$name");
        } else {
            $name = "";
        }
        if ($id == 0) {
            if ($name != "") {
                //$id est pas égal à zero pour le cas de la création
                $sql = "insert into article (numArticle,designation,prixUnitaire,image) values (?,?,?,?)";
                $requete = $connexion->prepare($sql);
                $requete->execute([$numArticle, $designation, $prixUnitaire, $name]);
            } else {
    
                $sql = "insert into article (numArticle,designation,prixUnitaire) values (?,?,?)";
                $requete = $connexion->prepare($sql);
                $requete->execute([$numArticle, $designation, $prixUnitaire]);
            }
        } else {
            if ($name != "") {
                //$id est pas égal à zero pour le cas de la création
                $sql = "update article set numArticle=?,designation=?,prixUnitaire=?,image=? where id=?";
                $requete = $connexion->prepare($sql);
                $requete->execute([$numArticle, $designation, $prixUnitaire, $name, $id]);
            } else {
    
                $sql = "update article set numArticle=?,designation=?,prixUnitaire=? where id=?";
                $requete = $connexion->prepare($sql);
                $requete->execute([$numArticle, $designation, $prixUnitaire, $id]);

            }
        }
    }

    
    

        function existOnLigneCommande($id){
            $connexion=connexion();
            $sql="select * from lignecommande where article_id=?";
            $requete=$connexion->prepare($sql);
            $requete->execute([$id]);
            $exist=$requete->fetch(PDO::FETCH_ASSOC);
            return $exist;
        }

        function existArticle($numArticle,$id){
            $connexion=connexion();
            $sql="select * from article where numArticle=? and id<>?";
            $requete=$connexion->prepare($sql);
            $requete->execute([$numArticle,$id]);
            $exist=$requete->fetch(PDO::FETCH_ASSOC);
            return $exist;
        }


        function find($id){
            $connexion=connexion();
            $sql="select * from article where id=?";
            $requete=$connexion->prepare($sql);
            $requete->execute([$id]);
            $article=$requete->fetch(PDO::FETCH_ASSOC);
            return $article;
        }



        function delete($id){
           $connexion=connexion();
           $sql="delete from article where id=?";
           $requete=$connexion->prepare($sql);
           $requete->execute([$id]);
 }



?>