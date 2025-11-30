<?php

//dirname(__FILE__) Es el directorio del archivo actual
require_once(dirname(__FILE__) . '/../conf/PersistentManager.php');

class CreatureDAO {

    //Se define una constante con el nombre de la tabla
    const CREATURE_TABLE = 'creatures';

    //Conexión a BD
    private $conn = null;

    //Constructor de la clase
    public function __construct() {
        $this->conn = PersistentManager::getInstance()->get_connection();
    }

    public function selectAll() {
        $query = "SELECT * FROM " . CreatureDAO::CREATURE_TABLE;
        $result = mysqli_query($this->conn, $query);
        $creatures = array();
        while ($creatureBD = mysqli_fetch_array($result)) {

            $creature = new Creature();
            $creature->setIdCreature($creatureBD["idCreature"]);
            $creature->setName($creatureBD["name"]);
            $creature->setAbilities($creatureBD["abilities"]);
            $creature->setAvatar($creatureBD["avatar"]);
            
            array_push($creatures, $creature);
        }
        return $creatures;
    }

    public function insert($creature) {
        $query = "INSERT INTO " . CreatureDAO::CREATURE_TABLE .
                " (name, abilities, avatar) VALUES(?,?,?)";
        $stmt = mysqli_prepare($this->conn, $query);
        $name = $creature->getName();
        $abilitities = $creature->getAbilities();
        $avatar = $creature->getAvatar();
        
        mysqli_stmt_bind_param($stmt, 'sss', $name, $abilitities, $avatar);
        return $stmt->execute();
    }

    public function selectById($id) {
        $query = "SELECT name, abilities, avatar FROM " . CreatureDAO::CREATURE_TABLE . " WHERE idCreature=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $name, $abilitities, $avatar);

        $creature = new Creature();
        while (mysqli_stmt_fetch($stmt)) {
            $creature->setIdCreature($id);
            $creature->setName($name);
            $creature->setAbilities($abilitities);
            $creature->setAvatar($avatar);
       }

        return $creature;
    }

    public function update($creature) {
        $query = "UPDATE " . CreatureDAO::CREATURE_TABLE .
                " SET name=?, abilities=?, avatar=?"
                . " WHERE idCreature=?";
        $stmt = mysqli_prepare($this->conn, $query);
        $name = $creature->getName();
        $abilities= $creature->getAbilities();
        $avatar = $creature->getAvatar();
        $id = $creature->getIdCreature();
        mysqli_stmt_bind_param($stmt, 'sssi', $name, $abilities, $avatar, $id);
        return $stmt->execute();
    }
    
    public function delete($id) {
        $query = "DELETE FROM " . CreatureDAO::CREATURE_TABLE . " WHERE idCreature=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        return $stmt->execute();
    }

        
}

?>
