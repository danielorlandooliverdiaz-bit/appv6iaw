<?php

class Creature {

    private $idCreature;
    private $name;
    private $abilities;
    private $avatar;

    public function __construct() {
        
    }

    public function getIdCreature() {
        return $this->idCreature;
    }

    public function getName() {
        return $this->name;
    }

    public function getAbilities() {
        return $this->abilities;
    }

    public  function getAvatar() {
        return $this->avatar;
    }

    public function setIdCreature($idCreature) {
        $this->idCreature = $idCreature;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setAvatar($avatar) {
        $this->avatar = $avatar;
    }

    function setAbilities($abilities) {
        $this->abilities = $abilities;
    }

//Función para pintar cada criatura
    function creature2HTML() {
        $result = '<div class=" col-md-4 ">';
         $result .= '<div class="card ">';
          $result .= ' <img class="card-img-top rounded mx-auto d-block avatar" src='.$this->getAvatar().' alt="Card image cap">';
            $result .= '<div class="card-block">';
                $result .= '<h2 class="card-title">' . $this->getName() . '</h2>';
                $result .= '<p class=" card-text description">'.$this->getAbilities().'</p>';                    
             $result .= '</div>';
             $result .= ' <div  class=" btn-group card-footer" role="group">';
                $result .= '<a type="button" class="btn btn-secondary" href="app/views/detail.php?id='.$this->getIdCreature().'">Detalles</a>';
                $result .= '<a type="button" class="btn btn-success" href="app/views/edit.php?id='.$this->getIdCreature().'">Modificar</a> ';
                $result .= '<a type="button" class="btn btn-danger" href="app/controllers/deleteController.php?id='.$this->getIdCreature().'">Borrar</a> ';
            $result .= ' </div>';
         $result .= '</div>';
     $result .= '</div>';
        
        
        return $result;
    }
    
    
}
