<?php
namespace App\Users\Entity;
class User
{
    protected $id;
    protected $nom;
    protected $prenom;
    protected $age;
    protected $telephone;


    public function __construct($id, $nom, $prenom, $age, $telephone)
    {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->age = $age;
        $this->telephone = $telephone;
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    public function setAge($age)
    {
        $this->age = $age;
    }
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }


    public function getId()
    {
        return $this->id;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getAge()
    {
        return $this->age;
    }
    public function getTelephone()
    {
        return $this->telephone;
    }

    public function toArray()
    {
        $array = array();
        $array['id'] = $this->id;
        $array['nom'] = $this->nom;
        $array['prenom'] = $this->prenom;
        $array['age'] = $this->age;
        $array['telephone'] = $this->telephone;

        return $array;
    }
}