<?php

namespace Models;

class Velo extends AbstractModel
{
    protected string $nomDeLaTable = "velos";

    private $id;

    public function getId() {
        return $this->id;
    }

    private $name;

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    private $description;

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    private $image;

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    private $price;

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

     /**
     * 
     * Ajoute un nouveau vélo dans la BDD
     * 
     * @param Velo $velo
     * 
     * @return void
     * 
     */
                            
    public function save(Velo $velo): void
    {

        
        $sql = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable}(name, description, image,price) VALUES (:nom, :description, :image, :price)");

        $sql->execute([
            "nom" => $velo->name,
            "description" => $velo->description,
            "image" => $velo->image,
            "price" => $velo->price
        ]);
    }

    /**
     * modifie un vélo dans la BDD grâce à son ID
     * 
     * @param string $nom
     * @param string $description
     * @param string $image
     * @param string $prix
     * 
     * @return void
     */

    public function change(int $id,string $nom, string $description, string $image, int $prix):void {

        $sql = $this->pdo->prepare("UPDATE {$this->nomDeLaTable} SET name = :name, description = :description, image= :image, price = :prix WHERE id = :id");

        $sql->execute(["name" => $nom,
                        "description" => $description,
                        "image" => $image,
                        "price" => $prix,
                        "id" => $idEdit
                       ]);

    }

}