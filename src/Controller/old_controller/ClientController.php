<?php
    //require_once("service/myFct.php");
    class ClientController extends MyFct{
        function __construct()
        {
            $action="list";
    extract($_GET);
    switch ($action) {

        case "search":
            $mot="";
            extract($_POST);
          //$connexion= $this->connexion();
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

            $clients=$this->listerClient($mot);
            $rows=json_encode($clients);
            echo $rows;



            break;

        case "list":
           //$connexion = $this->connexion();
           //$sql = "SELECT * FROM article";
           //$requete=$connexion->prepare($sql);
           //$requete->execute();
           //$articles = $requete->fetchAll(PDO::FETCH_ASSOC);
           $mot="";
           $clients=$this->listerClient($mot);
           $file="view/client/list.html.php";
           $variables=["clients"=>$clients];
           $this->generatePage($file,$variables);
           break;


        case "show":
           //$connexion= $this->connexion();
           //$sql="SELECT * FROM article WHERE id = ?";
           //$requete=$connexion->prepare($sql);
           //$requete->execute([$id]);
           //$article=$requete->fetch(PDO::FETCH_ASSOC);

            $client=afficher($id);
            $client=json_encode($client);//transformé en json
            echo $client; //envoie le json
            break;



        case "update";
        $data=$_POST;


       //  extract($_POST);
       //  $id=(int) $id;
       //  $connexion=$this->connexion();
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
        //$connexion=$this->connexion();
        //$sql="DELETE FROM article WHERE id=?";
        //$requete=$connexion->prepare($sql);
        //$requete->execute([$id]);
        //supprimer([$id])
         supprimer($id);
         $response="Suppression effectuée avec succès";
         echo $response ;
            break;

        }
            
        }
        function listerClient($mot=""){
            $connexion= $this->connexion();
          if($mot){
              $sql="select * from client where numClient like ? or nomClient like ?  or adresseClient like ? or telephone like ?" ;
              $requete=$connexion->prepare($sql);
              $requete->execute(["%$mot%","%$mot%","%$mot%","%$mot%"]);
          }else{
              $sql="select * from client ";
              $requete=$connexion->prepare($sql);
              $requete->execute();
          }
          $clients=$requete->fetchAll(PDO::FETCH_ASSOC);
          return $clients;

            
        }

    function lister($mot=""){
        $connexion = $this->connexion();
        $sql = "SELECT * FROM client";
        $requete=$connexion->prepare($sql);
        $requete->execute();
        $clients = $requete->fetchAll(PDO::FETCH_ASSOC);
     
        return $clients;
        
    }

    function afficher($id){
        $connexion= $this->connexion();
        $sql="SELECT * FROM client WHERE id = ?";
        $requete=$connexion->prepare($sql);
        $requete->execute([$id]);
        $client=$requete->fetch(PDO::FETCH_ASSOC);
        return $client;

}
    function supprimer($id){
     
        $connexion=$this->connexion();
        $sql="DELETE FROM client WHERE id=?";
        $requete=$connexion->prepare($sql);
        $requete->execute([$id]);
       
    }

    function enregistrer($data){

        extract($data);
         $id=(int) $id;
         $connexion=$this->connexion();
         if ($id==0){
            $sql="INSERT INTO client (numClient,nomClient,adresseClient,telephone) values (?,?,?,?)";
            $requete=$connexion->prepare($sql);
            $requete->execute([$numClient,$nomClient,$adresseClient,$telephone]);
            $response="Client ajouté avec succès";
            
         }else{
            $sql="UPDATE client SET numClient=?, nomClient=?, adresseClient=?, telephone=? WHERE id=?";
            $requete=$connexion->prepare($sql);
            $requete-> execute([$numClient,$nomClient,$adresseClient,$telephone,$id]);
            $response="Client modifié avec succès";

    }
    }

    }
    

        

?>