<?php
namespace App\Model;
use App\Model\EntityManager;
class TypeMouvement {
    private $id;
    private $prefixe;
    private $libelle;
    private $numeroInitial;
    private $format;

    public function __construct($data=[]){ 
            foreach($data as $key=>$valeur){
                $setter="set".ucfirst($key);
                if(method_exists($this,$setter)){
                    $this->$setter($valeur);
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
     * Get the value of prefixe
     */ 
    public function getPrefixe()
    {
        return $this->prefixe;
    }

    /**
     * Set the value of prefixe
     *
     * @return  self
     */ 
    public function setPrefixe($prefixe)
    {
        $this->prefixe = $prefixe;

        return $this;
    }

    /**
     * Get the value of numeroInitial
     */ 
    public function getNumeroInitial()
    {
        return $this->numeroInitial;
    }

    /**
     * Set the value of numeroInitial
     *
     * @return  self
     */ 
    public function setNumeroInitial($numeroInitial)
    {
        $this->numeroInitial = $numeroInitial;

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
     * Get the value of format
     */ 
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set the value of format
     *
     * @return  self
     */ 
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }
}






?>