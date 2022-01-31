<h1>VOICI LA PAGE D'UN SEUL VELO</h1>

<hr class="mt-5">

    <h2><?= $velo->getName() ?></h2>
    <p><?= $velo->getDescription() ?></p>
    <img src="images/<?= $velo->getImage() ?>" style="max-width:200px">
    <h4>Prix incroyable de <?= $velo->getPrice() ?>€</h4>



    <form action="?type=velo&action=delete" method="post">
        <button type="submit" name="id" value="<?= $velo->getId() ?>" class="btn btn-danger">SUPPRIMER</button>
    </form>

<hr class="mb-5">


        <form class="ms-5" action="?type=avis&action=new" method="post">
        <div class="form-group"><input placeholder="Ecrivez votre nom" type="text" name="author"></div>
        <div class="form-group"><textarea placeholder="Ecrivez votre avis" type="text" name="content" id=""></textarea></div>
        <div class="form-group"><button name='veloId' value="<?= $velo->getId() ?>" class="btn btn-success">Poster</button></div>
        </form>



<?php foreach ($avis as $comment) { ?>
    <div class="row bg-info mt-2 mb-2">
        <h3>
            <p><strong><?= $comment->getAuthor() ?></strong></p>
        </h3>
        <p class="ms-5"><?= $comment->getContent() ?></p>

        


        <form action="?type=avis&action=delete&id=" method="post">
            <button type="submit" class="btn btn-danger" name="id" value="<?= $comment->getId() ?>">Supprimer</button>
        </form>

    </div>
<?php } ?>

