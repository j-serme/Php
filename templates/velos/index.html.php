<h1>Voici la page de l'ensemble de nos vélos</h1>

<?php foreach ($velos as $velo) { ?>

    <hr>

    <h2><?= $velo->getName() ?></h2>
    <p><?= $velo->getDescription() ?></p>
    <img src="images/<?= $velo->getImage() ?>" style="max-width:200px">
    <h4>Prix incroyable de <?= $velo->getPrice() ?> €</h4>

    <a href="?type=velo&action=show&id=<?= $velo->getId() ?>" class="btn btn-primary">VOIR PLUS DE DETAIL</a>
   <hr>


   
   <?php }  ?>


