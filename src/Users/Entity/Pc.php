<?php
namespace App\Pc\Entity;
class Pc
{
    protected $id;
    protected $marque;
    protected $model;
    protected $os;
    protected $prix;


    public function __construct($id, $marque, $model, $os, $prix)
    {
        $this->id = $id;
        $this->marque = $marque;
        $this->model = $model;
        $this->os = $os;
        $this->prix = $prix;
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setMarque($marque)
    {
        $this->marque = $marque;
    }
    public function setModel($model)
    {
        $this->model = $model;
    }
    public function setOs($os)
    {
        $this->os = $os;
    }
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }


    public function getId()
    {
        return $this->id;
    }
    public function getMarque()
    {
        return $this->marque;
    }
    public function getModel()
    {
        return $this->model;
    }
    public function getOs()
    {
        return $this->os;
    }
    public function getPrix()
    {
        return $this->prix;
    }

    public function toArray()
    {
        $array = array();
        $array['id'] = $this->id;
        $array['marque'] = $this->marque;
        $array['model'] = $this->model;
        $array['os'] = $this->os;
        $array['prix'] = $this->prix;

        return $array;
    }
}