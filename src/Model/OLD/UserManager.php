<?php
namespace App\Model;
use App\Model\Manager;
    class UserManager extends Manager{
        public function find($id,$type="object"){
            $table="vgn_user";
            $resultat=$this->findTable($table,$id);
            if($type=="object"){
                $resultat=new User($resultat);
            }
            return $resultat;
        } 
        public function findAll($conditions=[],$type="object",$order=""){
            $table="vgn_user";
            $resultats=$this->findAllTable($table,$conditions,$order);
            if($type=="object"){
                $objects=[];
                foreach($resultats as $resultat){
                    $object=new User($resultat);
                    $objects[]=$object;
                }
    
                $resultats=$objects;
            }
            return $resultats;
        }
        public function findOne($conditions=[],$type="object",$order=""){
            $table="vgn_user";
            $resultat=$this->findOneTable($table,$conditions,$order);
            if($type=="object"){
                $object=new User($resultat);
                $resultat=$object;
            }
            return $resultat;
        } 
        public function searchByCondition($columns,$mot,$conditions=[],$type="object",$orderBy="",$limit=0,$offset=0){
            $table="vgn_user";
            $resultats=$this->searchTableByCondition($table,$columns,$mot,$conditions,$orderBy,$limit,$offset);
            if($type=="object"){
                $objects=[];
                foreach($resultats as $resultat){
                    $object=new User($resultat);
                    $objects[]=$object;
                }
                $resultats=$objects;
            }
            return $resultats;
        } 

        public function insert($data){
            $table="vgn_user";
            $this->insertTable($table,$data);
        }
        public function update($data){
            $table="vgn_user";
            $this->updateTable($table,$data);
        }

        public function save($data){
            $id=(int) $data['id'];
            if($id==0){
                $this->insert($data);
            }else{
                $this->update($data);
            }
        } 

        public function delete($id){
            $table="vgn_user";
            $this->deleteTable($table,$id);
        }   
        



    }



?>