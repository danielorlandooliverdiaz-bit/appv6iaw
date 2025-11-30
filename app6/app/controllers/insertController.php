<?php

//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/../../persistence/DAO/CreatureDAO.php');
require_once(dirname(__FILE__) . '/../../app/models/Creature.php');
require_once(dirname(__FILE__) . '/../../app/models/validations/ValidationsRules.php');



if ($_SERVER["REQUEST_METHOD"] == "POST") {
//Llamo a la función en cuanto se redirija el action a esta página
    createAction();
}

function createAction() {
    $name = ValidationsRules::test_input($_POST["name"]);
    $abilities = ValidationsRules::test_input($_POST["abilities"]);
    $avatar = ValidationsRules::test_input($_POST["avatar"]);
    // TODOD hacer uso de los valores validados 
    $creature = new Creature();
    $creature->setName($_POST["name"]);
    $creature->setAbilities($_POST["abilities"]);
    $creature->setAvatar($_POST["avatar"]);

    //Creamos un objeto CreatureDAO para hacer las llamadas a la BD
    $creatureDAO = new CreatureDAO();
    $creatureDAO->insert($creature);
    
    header('Location: ../../index.php');
    
}
?>

