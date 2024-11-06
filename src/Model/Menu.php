<?php
namespace App\Model;
use App\Model\EntityManager;
    class Menu{
        private $id;
        private $parent_id;
        private $libelle;
        private $url;
        private $role;
        private $icone;

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
        public function getParent(){
                $mm=new EntityManager('menu','Menu');
            $parent=$mm->find($this->parent_id);
            return $parent;
        }

        public function getEnfants(){
                $mm=new EntityManager('menu','Menu');
            $conditions=['parent_id'=>$this->id];
            $type='object';
            $order="order by parent_id asc";
            $enfants=$mm->findAll($conditions,$type,$order);
            return $enfants;
        }


        /**
         * Get the value of icone
         */ 
        public function getIcone()
        {
                return $this->icone;
        }

        /**
         * Set the value of icone
         *
         * @return  self
         */ 
        public function setIcone($icone)
        {
                $this->icone = $icone;

                return $this;
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
         * Get the value of parent_id
         */ 
        public function getParent_id()
        {
                return $this->parent_id;
        }

        /**
         * Set the value of parent_id
         *
         * @return  self
         */ 
        public function setParent_id($parent_id)
        {
                $this->parent_id = $parent_id;

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
         * Get the value of url
         */ 
        public function getUrl()
        {
                return $this->url;
        }

        /**
         * Set the value of url
         *
         * @return  self
         */ 
        public function setUrl($url)
        {
                $this->url = $url;

                return $this;
        }

        /**
         * Get the value of role
         */ 
        public function getRole()
        {
                return $this->role;
        }

        /**
         * Set the value of role
         *
         * @return  self
         */ 
        public function setRole($role)
        {
                $this->role = $role;

                return $this;
        }
    }