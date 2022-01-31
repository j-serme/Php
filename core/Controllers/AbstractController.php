<?php

namespace Controllers;

abstract class AbstractController
{

    /**
     * $defautModel définit le modèle de l'objet utilisé
     * $defaultModelName définit la classe instanciée.
     */
    protected object $defaultModel;
    protected $defaultModelName;

    public function __construct()
    {
        $this->defaultModel = new $this->defaultModelName();
    }

    public function redirect(? array $url=null) {
        return \App\Response::redirect($url);
    }

    public function render(string $template, array $donnees){
        return \App\View::render($template, $donnees);
    }

    // Créer une méthode new() avec le modèle correspondant en appelant sa méthode save()
    // et génère un rendu.


    //    public function new()
    // {

    //    $nom = null;
    //    $image = null;
    //    $ingredients = null;

    //    if (!empty($_POST['nom'])) {
    //        $nom = htmlspecialchars($_POST['nom']);
    //    }
    //    if (!empty($_POST['image'])) {
    //        $image = htmlspecialchars($_POST['image']);
    //    }
    //    if (!empty($_POST['ingredients'])) {
    //        $ingredients = htmlspecialchars($_POST['ingredients']);
    //    }

    //    if ($nom && $image && $ingredients) {

    //        $this->defaultModel->save($cocktail);
    //        return $this->redirect();
    //    }

    //    return $this->render("cocktails/create", ["pageTitle" => "Nouveau cocktail"]);
    //}

}
