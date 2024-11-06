<?php
namespace App\Model;
use App\Model\EntityManager;
    class Mouvement {
        private $id;
        private $numMouvement;
        private $dateMouvement;
        private $typeMouvement_id;
        private $tiers_id;


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
         * Get the value of numMouvement
         */ 
        public function getNumMouvement()
        {
                return $this->numMouvement;
        }

        /**
         * Set the value of numMouvement
         *
         * @return  self
         */ 
        public function setNumMouvement($numMouvement)
        {
                $this->numMouvement = $numMouvement;

                return $this;
        }

        /**
         * Get the value of dateMouvement
         */ 
        public function getDateMouvement()
        {
                return $this->dateMouvement;
        }

        /**
         * Set the value of dateMouvement
         *
         * @return  self
         */ 
        public function setDateMouvement($dateMouvement)
        {
                $this->dateMouvement = $dateMouvement;

                return $this;
        }

        /**
         * Get the value of typeMouvement_id
         */ 
        public function getTypeMouvement_id()
        {
                return $this->typeMouvement_id;
        }

        /**
         * Set the value of typeMouvement_id
         *
         * @return  self
         */ 
        public function setTypeMouvement_id($typeMouvement_id)
        {
                $this->typeMouvement_id = $typeMouvement_id;

                return $this;
        }

        /**
         * Get the value of tiers_id
         */ 
        public function getTiers_id()
        {
                return $this->tiers_id;
        }

        /**
         * Set the value of tiers_id
         *
         * @return  self
         */ 
        public function setTiers_id($tiers_id)
        {
                $this->tiers_id = $tiers_id;

                return $this;
        }
    }






?>