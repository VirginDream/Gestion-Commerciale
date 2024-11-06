<?php
namespace App\Model;
use App\Model\User;
require_once("config/parametre.php");





class Manager{
    //creation fonction insertTable----------//
    public function insertTable($table, $data){
        $columns=[];//- initiation d'une variable
        $values=[];//- initiation d'une variable
        $pis=[];//- tableau contenant des ?
        foreach ($data as $key => $value) {
            if($key != 'id'){
                $columns[] = $key; //--rajouter dans la variable $columns le contenu de $key
                $values[] = $value;
                $pis[] = "?";

        }
    }
    $columns=implode(",",$columns);
    $pis=implode(",",$pis);
    $connexion=$this->connexion();
    $sql = "insert into $table ($columns) values ($pis)";
    $requete=$connexion->prepare($sql);
    $requete->execute($values);



}
public function findAllTable($table, $conditions=[],$order=""){
    $connexion=$this->connexion();
    $condition="";
    $values=[];
    foreach($conditions as $key=>$value){
        if($condition==""){
            $condition.=" $key=? ";
        }else{
            $condition.=" and $key=? ";
        }
        $values[]=$value;
    }
    $condition=($condition=="")?'true':$condition;
    $sql="select * from $table where $condition $order ";
    $requete=$connexion->prepare($sql);
    $requete->execute($values);
    $resultats=$requete->fetchAll(\PDO::FETCH_ASSOC);
    return $resultats;

} 
public function findAllTable_old($table,$conditions=[],$order=""){
    $columns=[];
    $values=[];
    foreach($conditions as $key=>$value){
        $columns[] = "$key=?";
        $values[] = $value;
    }
    if($columns){
        $columns=implode(" and ",$columns);

    }else{
        $columns="true";

    }
    $connexion=$this->connexion();
    $sql="select * from $table where $columns $order";
    $requete=$connexion->prepare($sql);
    $requete->execute($values);
    $resultats=$requete->fetchAll(\PDO::FETCH_ASSOC);
    return $resultats;

}



public function saveTable($table,$data){
    $id= (int) $data['id'];
    if($id>0){
        $this->updateTable($table,$data);
    }else{
        $this->insertTable($table,$data);
    }
}





public function searchTableByCondition($table,$columns,$mot,$conditions=[],$orderBy="",$limit=0,$offset=0){
    $condition="";
    $values=[];
    foreach($columns as $value){
        if($condition==""){
            $condition.="$value like ?";
        }else{
            $condition.=" or $value like ?";
        }
        $values[]="%$mot%";
    }
    $condition=" ($condition) ";
    foreach($conditions as $key=>$value){
        $condition.=" AND $key=?";
        $values[]=$value;
    }
    $condition.=" $orderBy ";
    if($limit){
        $condition.=" limit $limit "; 
    }
    if($offset){
        $condition.=" offset $offset ";
    }
    $connexion=$this->connexion();
    $sql="select * from $table where $condition";
    $stmt=$connexion->prepare($sql);
    $stmt->execute($values);
    $rows=$stmt->fetchAll(\PDO::FETCH_ASSOC);
    return $rows;

} 






public function searchRows($table,$columns,$mot){
    $conditions=[];
    $values=[];
    foreach($columns as $key=>$value){
        if($key<(count($columns)-1)){
            $conditions[]="$value like ? or";
        }else{
            $conditions[]="$value like ?";
        }
        $values[]="%$mot%";
    }
    $conditions=implode(" ",$conditions);
    
    $connexion=$this->connexion();
    $sql="select * from $table where $conditions";
    $stmt=$connexion->prepare($sql);
    $stmt->execute($values);
    $rows=$stmt->fetchAll(\PDO::FETCH_ASSOC);
    return $rows;

} 


public function getColumnsTable($table){
    $connexion=$this->connexion();
    $sql="desc $table";
    $requete=$connexion->query($sql);
    $requete->execute();
    $resultat=$requete->fetchAll(\PDO::FETCH_COLUMN);
    
    
    return $resultat;
}

  



public function findTable($table,$id){
    $connexion=$this->connexion();
    $sql="select * from $table where id=?";
    $requete=$connexion->prepare($sql);
    $requete->execute([$id]);
    $resultat=$requete->fetch(\PDO::FETCH_ASSOC);
    return $resultat;
}


public function findOneTable($table,$conditions=[],$order=""){
    $columns=[];
    $values=[];
    foreach($conditions as $key=>$value){
        $columns[] = "$key=?";
        $values[] = $value;
    }
    if($columns){
        $columns=implode(" and ",$columns);

    }else{
        $columns="true";

    }
    $connexion=$this->connexion();
    $sql="select * from $table where $columns $order"; /* echo $sql;die; */
    $requete=$connexion->prepare($sql);
    $requete->execute($values);
    $resultat=$requete->fetch(\PDO::FETCH_ASSOC);
    return $resultat;

}


    public function updateTable($table,$data){
        $sets=[];
        $values=[];
        $connexion=$this->connexion();
        foreach ($data as $key => $value) {
            if($key!= 'id'){
                $sets[] = "$key =?";
                $values[] = $value;
            }
    
        }
        $values[]=$data['id'];
        $sets=implode(",",$sets);
        $sql="update $table set $sets where id=?";
        $requete=$connexion->prepare($sql);
        $requete->execute($values);


    }

    public function deleteTable($table,$id){
        $connexion=$this->connexion();
        $sql= "delete from $table where id=?";
        /* $values=[$id]; */
        $requete=$connexion->prepare($sql);
        $requete->execute([$id]);
    }

    function generatePage($file, $variables = [], $base = "./view/base.html.php")
    {
        if (file_exists($file)) {
            ob_start(); //ouverture de la memoire tampon
            extract($variables); // création des variables locales à utiliser dans le fichier
            require_once($file); //chargement du fichier representé par la variable $file
            $content = ob_get_clean(); //récupération du contenu de la memoire tampon
    
            ob_start(); //Reouverture de la memoire tampon pour le fichier base.html.php 
            require_once($base); //chargement du fichier representé par la variable $base (son contenu est rempli par $content)
            $page = ob_get_clean(); //fermeture de la memoire tampon et transforme son contenu en texte et lee mettre dans la variable $page
    
            echo $page;
        } else {
            echo "<h1 style='color:red;text-align:center;'>Fichier $file introuvable!</h1>";
            die;
        }
    }
    function printr($tableau)
    {
        echo "<pre>";
        print_r($tableau);
        echo "</pre>";
    }
    
    function connexionsql()
    {
        $dsn = "mysql:host=localhost;dbname=DWWM_2024;charset=utf8";
        try {
            $connexion = new \PDO($dsn, "root", "");
            return $connexion;
        } catch (\exception $e) {
    
            echo "<h1 style='color:red;text-align:center;'>Erreur de connexion à la base de données! </h1>";
        }
    }
    
    function connexion($host = HOST, $dbname = DBNAME, $user = USER, $password = PASSWORD)
    {
    
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
        try {
            $connexion = new \PDO($dsn, "$user", "$password");
            return $connexion;
        } catch (\Exception $e) {
            echo "<h1 style='color:red;text-align:center'>Erreur de connexion à la base de données</h1>";
            die;
        }
    }
    
    function dateFrs($cdate)
    {
        $date = new \DateTime($cdate);
        $dateFrs = $date->format('d-m-Y');
        return $dateFrs;
    }
    
    
    
    }
    










?>