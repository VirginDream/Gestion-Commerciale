<?php
namespace App\Model;
use App\Model\Manager;
    class ProduitManager extends Manager{
        public function find($id,$type="object"){
            $table="vgn_produit";
            $resultat=$this->findTable($table,$id);
            if($type=="object"){
                $resultat=new Produit($resultat);
            }
            return $resultat;
        } 
        public function findAll($conditions=[],$type="object",$order=""){
            $table="vgn_produit";
            $resultats=$this->findAllTable($table,$conditions,$order);
            if($type=="object"){
                $objects=[];
                foreach($resultats as $resultat){
                    $object=new Produit($resultat);
                    $objects[]=$object;
                }
    
                $resultats=$objects;
            }
            return $resultats;
        }
        public function searchByCondition($columns,$mot,$conditions=[],$type="object",$orderBy="",$limit=0,$offset=0){
            $table="vgn_produit";
            $resultats=$this->searchTableByCondition($table,$columns,$mot,$conditions,$orderBy,$limit,$offset);
            if($type=="object"){
                $objects=[];
                foreach($resultats as $resultat){
                    $object=new Produit($resultat);
                    $objects[]=$object;
                }
                $resultats=$objects;
            }
            return $resultats;
        } 

        public function insert($data){
            $table="vgn_produit";
            $this->insertTable($table,$data);
        }
        public function update($data){
            $table="vgn_produit";
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
            $table="vgn_produit";
            $this->deleteTable($table,$id);
        }   
        



    }



?>