<?php

namespace Models;

require_once "AbstractModel.php";


class Avis extends AbstractModel
{
    private $author;

    public function getAuthor(){
        return $this->author;
    }

    public function setAuthor($author){
        $this->author = $author;
    }

    private $content;

    public function getContent(){
        return $this->content;
    }

    public function setContent($content){
        $this->content= $content;
    }

    private $id;

    public function getId(){
        return $this->id;
    }

    private $velo_id;

    
    public function getVeloId(){
        return $this->velo_id;
    }

    public function setVeloId($velo_id){
        $this->velo_id = $velo_id;
    }

    

    protected string $nomDeLaTable = "avis";


    /**
     * trouve tous les avis associés à un vélo
     * 
     * @param int $velo_id
     *
     * @return array|bool 
     * 
     */
    public function findAllByVelo(int $velo_id)
    {


        $maRequete = $this->pdo->prepare("SELECT * FROM avis
                WHERE velo_id = :velo_id");

        $maRequete->execute([
            "velo_id" => $velo_id
        ]);

        $avis = $maRequete->fetchAll(\PDO::FETCH_CLASS, get_class($this));

        return $avis;
    }


        /**
     * 
     * enregistre un commentaire dans la base de données
     * 
     * @param Avis $avis
     */
    public function save(Avis $avis): void
    {


        $maRequeteCreation = $this->pdo->prepare("INSERT INTO avis
    (author, content, velo_id ) 
    VALUES(:author, :content, :velo_id)");

        $maRequeteCreation->execute([
            "author" => $avis->author,
            "content" => $avis->content,
            "velo_id" => $avis->velo_id
        ]);
    }


}
