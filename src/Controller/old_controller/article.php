<?php
    require_once("service/myFct.php");
    $action="list";
    extract($_GET);
    switch ($action) {

        case "search":
            $mot="";
            extract($_POST);
          //$connexion= connexion();
          //if($mot){
          //    $sql="select * from article where numArticle like ? or designation like ?";
          //    $requete=$connexion->prepare($sql);
          //    $requete->execute(["%$mot%","%$mot%"]);
          //}else{
          //    $sql="select * from article ";
          //    $requete=$connexion->prepare($sql);
          //    $requete->execute()
          //}
          //$articles=$requete->fetchAll(PDO::FETCH_ASSOC);

            $articles=listerArticle($mot);
            $rows=json_encode($articles);
            echo $rows;



            break;

        case "list":
           //$connexion = connexion();
           //$sql = "SELECT * FROM article";
           //$requete=$connexion->prepare($sql);
           //$requete->execute();
           //$articles = $requete->fetchAll(PDO::FETCH_ASSOC);
           //$mot="";
          // $articles=listerArticle($mot);
          // $variables=["articles"=>$articles];
           $file="view/article/list.html.php";
           generatePage($file);
           break;


        case "show":
           //$connexion= connexion();
           //$sql="SELECT * FROM article WHERE id = ?";
           //$requete=$connexion->prepare($sql);
           //$requete->execute([$id]);
           //$article=$requete->fetch(PDO::FETCH_ASSOC);

            $article=afficher($id);
            $article=json_encode($article);//transformé en json
            echo $article; //envoie le json
            break;



        case "update";
        $data=$_POST;


       //  extract($_POST);
       //  $id=(int) $id;
       //  $connexion=connexion();
       //  if ($id==0){
       //     $sql="INSERT INTO article (numArticle,designation,prixUnitaire) values (?,?,?)";
       //     $requete=$connexion->prepare($sql);
       //     $requete->execute([$numArticle,$designation,$prixUnitaire]);
       //     $response="Article ajouté avec succès";
       //     
       //  }else{
       //     $sql="UPDATE article SET numArticle=?, designation=?, prixUnitaire=? WHERE id=?";
       //     $requete=$connexion->prepare($sql);
       //     $requete-> execute([$numArticle,$designation,$prixUnitaire,$id]);
       //     $response="Article modifié avec succès";

           enregistrer($data);
           echo "Enregistré avec succès";
            


         
         
         break;




        case "delete";
         extract($_POST);
        //$connexion=connexion();
        //$sql="DELETE FROM article WHERE id=?";
        //$requete=$connexion->prepare($sql);
        //$requete->execute([$id]);
        //supprimer([$id])
         supprimer($id);
         $response="Suppression effectuée avec succès";
         echo $response ;
            break;

        }

        function listerArticle($mot=""){
            $connexion= connexion();
          if($mot){
              $sql="select * from article where numArticle like ? or designation like ?";
              $requete=$connexion->prepare($sql);
              $requete->execute(["%$mot%","%$mot%"]);
          }else{
              $sql="select * from article ";
              $requete=$connexion->prepare($sql);
              $requete->execute();
          }
          $articles=$requete->fetchAll(PDO::FETCH_ASSOC);
          return $articles;

            
        }

    function lister($mot=""){
        $connexion = connexion();
        $sql = "SELECT * FROM article";
        $requete=$connexion->prepare($sql);
        $requete->execute();
        $articles = $requete->fetchAll(PDO::FETCH_ASSOC);
     
        return $articles;
        
    }

    function afficher($id){
        $connexion= connexion();
        $sql="SELECT * FROM article WHERE id = ?";
        $requete=$connexion->prepare($sql);
        $requete->execute([$id]);
        $article=$requete->fetch(PDO::FETCH_ASSOC);
        return $article;

}
    function supprimer($id){
     
        $connexion=connexion();
        $sql="DELETE FROM article WHERE id=?";
        $requete=$connexion->prepare($sql);
        $requete->execute([$id]);
       
    }

    function enregistrer($data){

        extract($data);
         $id=(int) $id;
         $connexion=connexion();
         if ($id==0){
            $sql="INSERT INTO article (numArticle,designation,prixUnitaire) values (?,?,?)";
            $requete=$connexion->prepare($sql);
            $requete->execute([$numArticle,$designation,$prixUnitaire]);
            $response="Article ajouté avec succès";
            
         }else{
            $sql="UPDATE article SET numArticle=?, designation=?, prixUnitaire=? WHERE id=?";
            $requete=$connexion->prepare($sql);
            $requete-> execute([$numArticle,$designation,$prixUnitaire,$id]);
            $response="Article modifié avec succès";

    }
    }


?>