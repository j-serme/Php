<?php

namespace Controllers;


class Avis extends AbstractController
{

    protected $defaultModelName = \Models\Avis::class;


    /**
     * 
     * insérer dans la BDD un commentaire pour un vélo existant
     * 
     * @return void
     * 
     */

    public function new()
    {
        $veloId = null;
        $author = null;
        $content = null;

        if (!empty($_POST['veloId']) && ctype_digit($_POST['veloId'])) {

            $veloId = $_POST['veloId'];
        }
        if (!empty($_POST['author'])) {

            $author = htmlspecialchars($_POST['author']);
        }

        if (!empty($_POST['content'])) {

            $content = htmlspecialchars($_POST['content']);
        }



        if (!$veloId || !$content || !$author) {

            return $this->redirect(["type" => "velo",
            "action" => "index",
            "id" => $veloId]);
            
        }


        // on vérifie si le vélo existe bien avant de le commenter

        $modelVelo = new \Models\Velo();

        $velo = $modelVelo->findById($veloId);

        $avis = new \Models\Avis();
        $avis->setAuthor($author);
        $avis->setContent($content);
        $avis->setVeloId($veloId);

        if (!$velo) {
            return $this->redirect(["type" => "velo",
            "action" => "index",
            "id" => "noId"]);
        }

        $this->defaultModel->save($avis);



        return $this->redirect(["type" => "velo",
        "action" => "show",
        "id"=> $veloId]);
    }


    /**
     * suppression de la BDD d'un commentaire 
     * 
     * 
     * @return Response
     * 
     */

    public function delete(): Response
    {

        $veloId =null;
        if (!empty($_POST['veloId']) && ctype_digit($_POST['veloId'])) {
            $veloId = $_POST['veloId'];
        }


        $id = null;
        if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
            $id = $_POST['id'];
        }

        if (!$id) {
            die("Erreur sur l'ID. Pars .");
        }


        //verifier que l'avis existe


        $avis = $this->defaultModel->findById($id);

        if (!$avis) {

            return $this->redirect(["type" => "velo",
            "action" => "index",
            "id" => "noId"]);
        }

        $this->defaultModel->remove($id);

        return $this->redirect(["type" => "velo",
        "action" => "show",
        "id" => $velo_id]);
    }
}
