<?php
    //require_once("service/myFct.php");
    namespace App\Controller;
    use App\Service\MyFct;
    class AccueilController extends MyFct{
    function __construct(){
        $page="accueil";
        extract($_GET);
        switch($page){
            case 'accueil':
                $file="view/accueil/accueil.html.php";
                $variables=[];
                $this->generatePage($file);
                break;
            case 'cv':
                $file="view/accueil/CV VIRGIN/index1.html";
                $variables=[];
                $this->generatePage($file);
                break;
            case 'portfolio':
                $file="view/accueil/portfolio.html.php";
                $variables=[];
                $this->generatePage($file);
                break;
            
                case 'message_write' : 
                    $data = $_POST;
                    $files = $_FILES;
                    extract($data);
                    $lus = json_decode($lus);
                    $lus = implode(',',$lus);
                    $lus = "($lus)";
                    if($message){
                        $this->save($data,$files);
                    }
                    $this->updateMessageLus($lus);
                    $response = json_encode($data); 
                    //echo $response;
                    break; 
    
            case "message_read":
                $messages=$this->getMessages();
                $nonLu=0;
                foreach($messages as $message){
                    extract($message);
                    if($lu==false){
                        $nonLu++;
                    }
                    
                }
                $response =[ 
                "nonLu" => $nonLu,
                "messages" => $messages
    
                ];
                $response= json_encode(value: $response);
                echo $response;
                break;

            case "error":
                $file="view/accueil/error.html.php";
                $message="Vous ne pouvez pas accéder à cette page!";
                $variables=[
                    'title'=>"Message d'erreur !!",
                    "message"=>$message,
                ];
                $this->generatePage($file,$variables);
                break;
    
    
               
    
    
    
    
              
        }
    }
    function getMessages(){
        $connexion=$this->connexion();
        $sql='select * from message order by id desc limit 10 offset 0';
        $requete=$connexion->prepare($sql);
        $requete->execute();
        $messages=$requete->fetchAll(\PDO::FETCH_ASSOC);
        return $messages;
    }

 


    function save($data, $files){
        $connexion = $this->connexion();
        extract($data);
        if($files){
            $name = $files['file']['name'];
            $tmp_name = $files['file']['tmp_name'];
            $destination = "./Public/file/$name";
            $sql = "insert into message (auteur, message, file) values (?,?,?)";
            $values = [$auteur, $message, $name];
            move_uploaded_file($tmp_name, $destination); 
        }else{
            $sql= 'insert INTO message (auteur, message) values (? , ?)';
            $values = [$auteur, $message];

        }
        $stmt = $connexion->prepare($sql);
        $stmt->execute($values);
    }


        
    

    function updateMessageLus($lus) {
        $connexion = $this->connexion();
        $sql = "update message set lu = true where id in $lus";
        $stmt = $connexion->prepare($sql);
        $stmt->execute();
    } 


  
   }
    
 







   





    ?>

  





   
