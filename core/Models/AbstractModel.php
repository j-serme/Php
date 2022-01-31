<?php

namespace Models;

// Require_once pour appeler la méthode getPdo() pour se connecter à la BDD 
// afin que les modèles héritent des méthodes findById(), findAll() et remove().

require_once "core/Database/PdoMySQL.php";

abstract class AbstractModel
{

    protected string $nomDeLaTable;

    protected $pdo;

    public function __construct()
    {

        $this->pdo = \Database\PdoMySql::getPdo();
    }

    /**
     * 
     * trouver un element par son id
     * renvoie un tableau contenant un element
     * 
     * @param integer $id
     * @return array|bool
     * 
     */
    public function findById(int $id)
    {

        // cette méthode permet de retourner un tableau d'un élèment d'une table
        // grâce à son ID


        $maRequete = $this->pdo->prepare("SELECT * 
                        FROM {$this->nomDeLaTable} WHERE id = :id");

        $maRequete->execute(
            [
                "id" => $id
            ]

        );

        $maRequete->setFetchMode(\PDO::FETCH_CLASS, get_class($this));


        $element = $maRequete->fetch();

        return $element;
    }



    /**
     * 
     * retourne un tableau contenant TOUS les elements
     * 
     * @return array $elements
     * 
     * 
     */
    public function findAll(): array
    {



        $requete = $this->pdo->query("SELECT * FROM {$this->nomDeLaTable}");

        $elements = $requete->fetchAll(\PDO::FETCH_CLASS, get_class($this));

        return $elements;
    }

    /**
     * Supprime de la base de données un element grâce à son ID
     * 
     * 
     * @param integer $id
     * @return void
     * 
     */

    public function remove(int $id): void
    {



        $requeteSuppression = $this->pdo->prepare("DELETE FROM {$this->nomDeLaTable} WHERE id = :id");

        $requeteSuppression->execute([
            "id" => $id
        ]);
    }
    
}
