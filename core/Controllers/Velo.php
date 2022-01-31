<?php

namespace Controllers;

class Velo extends AbstractController
{
    protected $defaultModelName = \Models\Velo::class;

    /**
     * AFFICHER TOUS LES VELOS DE LA BDD
     * 
     */

    public function index() {


        $velos = $this->defaultModel->findAll();

        $pageTitle = "Tous les vélos";

        return $this->render("velos/index", compact("pageTitle", "velos"));
    }



    /**
     * AFFICHER UN VELO PAR SON ID
     * 
     */



    public function show() {

        $id = null;

        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = $_GET['id'];
        }

        if (!$id) {
            return $this->redirect(["type" => "velo",
            "action" => "index",
            "id" => "noId" ]);
        }

        $velo = $this->defaultModel->findById($id);

        if (!$velo) {
            return $this->redirect(["type" => "velo",
                                    "action" => "index",
                                    "id" => "noId"]);
        }

        $modelAvis = new \Models\Avis();

        $avis = $modelAvis->findAllByVelo($velo->getId());

        $pageTitle = "Voici la page détaillé du vélo";

        return $this->render("velos/show", compact("pageTitle", "velo", "avis"));
    }


    /**
     * AJOUTER UN VELO DANS LA BDD
     * 
     */


    public function new()
    {

        $nom = null;
        $description = null;
        $image = null;
        $prix = null;

        if (!empty($_POST['nom'])) {
            $nom = htmlspecialchars($_POST['nom']);
        }
        if (!empty($_POST['description'])) {
            $description = htmlspecialchars($_POST['description']);
        }
        if (!empty($_POST['image'])) {
            $image = htmlspecialchars($_POST['image']);
        }
        if (!empty($_POST['prix'])) {
            $prix = ctype_digit($_POST['prix']);
        }

        if ($nom && $description && $image && $prix) {

            $velo = new \Models\Velo();
            $velo->setName($nom);
            $velo->setDescription($description);
            $velo->setImage($image);
            $velo->setPrice($prix);

            $this->defaultModel->save($velo);

            return $this->redirect(["type" => "velo",
                                    "action" => "index"]);
        }

        return $this->render("velos/create", ["pageTitle" => "Nouveau velo"]);
    }


    /**
     *  SUPPRIMER UN VELO DE LA BDD
     * 
     * @return Response
     * 
     */
    public function delete(): Response
    {

        $id = null;
        if (!empty($_POST['id']) && ctype_digit($_POST['id'])) {
            $id = $_POST['id'];
        }
        

        if (!$id) {
            return $this->redirect(["type" => "velo",
            "action" => "index",
            "id" => "noId"]);
        }

        if (!$this->defaultModel->findById($id)) {
            return $this->redirect(["type" => "velo",
                                    "action" => "index"]);
        }

        

        $this->defaultModel->remove($id);

        return $this->redirect(["type" => "velo",
        "action" => "index"]);
    }


    public function update() {

        $idEdit= null;
        $nom = null;
        $description = null;
        $image = null;
        $prix = null;


        if (!empty($_POST['idEdit']) && ctype_digit($_POST['idEdit'])
        && !empty($_POST['nom']) && !empty($_POST['description']) 
        && !empty($_POST['image']) && 
        !empty($_POST['prix']) && ctype_digit($_POST['prix'])) {
            $idEdit= $_POST['idEdit'];
            $nom = htmlspecialchars($_POST['nom']);
            $description = htmlspecialchars($_POST['description']);
            $image = htmlspecialchars($_POST['image']);
            $prix = htmlspecialchars($_POST['prix']);
            
        }


        if ($idEdit && $nom && $description) {
            $this->defaultModel->change($idEdit, $nom, $description, $image, $prix);
            return $this->redirect(["type" => "info",
                                    "action" => "index"]);
        }

    

        // On récupère l'id du vélo à modifier
        // et les propriétés correspondantes de l'objet

        
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $id=$_GET['id'];
        }

        if (!$id) {
            return $this->redirect(["type" => "info",
            "action" => "index"]);
        }


        $info = $this->defaultModel->findById((int) $id);
        



        $pageTitle = "Modification du vélo";

        return $this->render("infos/edit", compact("pageTitle", "info"));

    }



}