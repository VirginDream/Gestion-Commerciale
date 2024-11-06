<?php
namespace App\Model;
use App\Model\EntityManager;
 class LigneMouvement {
    private $id;
    private $mouvement_id;
    private $produit_id;
    private $quantite;
    private $prixUnitaire;

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
    public function getMouvement(){
        $m=new Manager();
        $mouvement=$m->findTable("categorie",$this->mouvement_id);
        return $mouvement;
    }

    public function getProduit(){
        $m=new Manager();
        $produit=$m->findTable("categorie",$this->produit_id);
        return $produit;
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
     * Get the value of mouvement_id
     */ 
    public function getMouvement_id()
    {
        return $this->mouvement_id;
    }

    /**
     * Set the value of mouvement_id
     *
     * @return  self
     */ 
    public function setMouvement_id($mouvement_id)
    {
        $this->mouvement_id = $mouvement_id;

        return $this;
    }

    /**
     * Get the value of produit_id
     */ 
    public function getProduit_id()
    {
        return $this->produit_id;
    }

    /**
     * Set the value of produit_id
     *
     * @return  self
     */ 
    public function setProduit_id($produit_id)
    {
        $this->produit_id = $produit_id;

        return $this;
    }

    /**
     * Get the value of quantite
     */ 
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set the value of quantite
     *
     * @return  self
     */ 
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get the value of prixUnitaire
     */ 
    public function getPrixUnitaire()
    {
        return $this->prixUnitaire;
    }

    /**
     * Set the value of prixUnitaire
     *
     * @return  self
     */ 
    public function setPrixUnitaire($prixUnitaire)
    {
        $this->prixUnitaire = $prixUnitaire;

        return $this;
    }
 }










?>