<?php

namespace App;

class Response
{
// ? pour signaler que $parametres est un parametre optionnel et 
// = null et qu'il est null par défaut.

/**
 * 
 *  redirige vers l'url passée en parametre
 * 
 * @param string $url
 * 
 * @return void
 * 
 */

public static function redirect(? array $parametres=null):void{

    $url ="index.php";

    if ($parametres) {
        $url = "?";

        foreach ($parametres as $cle => $valeur) {

            $nouveauParam = $cle."=".$valeur."&";

            $url .= $nouveauParam;
            

        }
    }
        header("Location: $url");
        exit();
    
    
    
}

}