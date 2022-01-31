<?php

namespace App;


class Kernel
{

    /**
     * renseigner les propriétés $type et $action en chaine de caractère pour 
     * se retrouver sur la page d'accueil.
     * 
     */

    public static function run()
    {
        $type = "home";
        $action = "index";

        if(!empty($_GET['type'])) {$type = $_GET["type"];}
        if(!empty($_GET['action'])){ $action = $_GET["action"];}

       
        $type = ucfirst($type);
      
        $nomDeType = "\Controllers\\".$type;

        $controller = new $nomDeType();
        $controller->$action();

    }


}