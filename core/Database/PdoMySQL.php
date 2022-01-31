<?php

namespace Database;

class PdoMySql
{


    /**
     * Retourne un objet PDO pour intéragir avec la base de données
     * 
     * @return \PDO
     * 
     * 
     */
    public static function getPdo(): \PDO
    {
        // Pour appeler la méthode getPdo(), il faut lui passer la classe PDO avec des paramètres
        // 1er le host + nom de la BDD + encodage de la BDD, 
        // 2eme paramètre le nom d'user pour accéder à la BDD
        // 3eme parametre est le mdp pour accéder a la BDD
        // 4eme est un tableau de parametre pour afficher les erreurs et préciser que le retour de fetch sont des objets

        $pdo = new \PDO("mysql:host=localhost;dbname=magasinVelo;charset=utf8", "jeannie", "Longo11!", [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ
        ]);

        return $pdo;
    }
}
