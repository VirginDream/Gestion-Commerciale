<?php
namespace App\Model;
use App\Model\EntityManager;
    class Tiers {
        private $id;
        private $numTiers;
        private $nomTiers;
        private $adresseTiers;
        private $typeTiers_id;

        public function __construct($data=[]){
            if($data){
                foreach($data as $key=>$valeur){
                    $setter="set".ucfirst($key);
                    if(method_exists($this,$setter)){
                        $this->$setter($valeur);
                    }
                }
            
    
            }
            
        }
        public function getTiers(){
            $m=new Manager();
            $tiers=$m->findTable("categorie",$this->typeTiers_id);
            return $tiers;
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of numTiers
         */ 
        public function getNumTiers()
        {
                return $this->numTiers;
        }

        /**
         * Set the value of numTiers
         *
         * @return  self
         */ 
        public function setNumTiers($numTiers)
        {
                $this->numTiers = $numTiers;

                return $this;
        }

        /**
         * Get the value of nomTiers
         */ 
        public function getNomTiers()
        {
                return $this->nomTiers;
        }

        /**
         * Set the value of nomTiers
         *
         * @return  self
         */ 
        public function setNomTiers($nomTiers)
        {
                $this->nomTiers = $nomTiers;

                return $this;
        }

        /**
         * Get the value of adresseTiers
         */ 
        public function getAdresseTiers()
        {
                return $this->adresseTiers;
        }

        /**
         * Set the value of adresseTiers
         *
         * @return  self
         */ 
        public function setAdresseTiers($adresseTiers)
        {
                $this->adresseTiers = $adresseTiers;

                return $this;
        }

   

        /**
         * Get the value of typeTiers_id
         */ 
        public function getTypeTiers_id()
        {
                return $this->typeTiers_id;
        }

        /**
         * Set the value of typeTiers_id
         *
         * @return  self
         */ 
        public function setTypeTiers_id($typeTiers_id)
        {
                $this->typeTiers_id = $typeTiers_id;

                return $this;
        }
    }







?>