<?php
namespace App\Model;
use App\Model\EntityManager;
    class Role {
        private $id;
        private $libelle;
        private $code;

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
         * Get the value of libelle
         */ 
        public function getLibelle()
        {
                return $this->libelle;
        }

        /**
         * Set the value of libelle
         *
         * @return  self
         */ 
        public function setLibelle($libelle)
        {
                $this->libelle = $libelle;

                return $this;
        }

        /**
         * Get the value of code
         */ 
        public function getCode()
        {
                return $this->code;
        }

        /**
         * Set the value of code
         *
         * @return  self
         */ 
        public function setCode($code)
        {
                $this->code = $code;

                return $this;
        }
    }







?>