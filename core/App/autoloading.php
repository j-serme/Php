<?php

/**
 * 
 * fonction qui remplace les require_once en se servant des class utilisés dans le fichier
 * 
 * 
 */
spl_autoload_register(
    function(  $leNomDeLaClasseEnQuestion )
    {

        $leNomDeLaClasseEnQuestion = str_replace("\\", "/", $leNomDeLaClasseEnQuestion);

        require_once "core/{$leNomDeLaClasseEnQuestion}.php" ;
    }
);
