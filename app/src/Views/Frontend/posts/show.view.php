<h1 class="text-success mb-5"><?= $post['title'] ?></h1>
<small>Ecrit le <?= $post['date'] ?></small>
<!-- <p class="text-white"><?= $post['introduction'] ?></p> -->
<hr>
<div class="text-white">
    <?= $post['content'] ?>
</div>

<?php if (count($commentaries) === 0) : ?>
    <h2>Aucun commentaire n'a été posté pour le moment.</h2>
<?php else : ?>
    <h5 class="text-success">Nombre de commentaires : <?= count($commentaries) ?></h5>
    <?php foreach ($commentaries as $commentary) : ?>
        <div class="card text-white bg-primary my-3" style="max-width: 70rem;">
            <div class="card-header">Par : <?= $commentary['firstname'] ?> <?= $commentary['lastname'] ?></div>
            <div class="card-body">
                <blockquote>
                    <em><?= $commentary['content'] ?></em>
                </blockquote>
                <small>Le <?= $commentary['date'] ?></small>
                <div class="d-flex flex-row-reverse">
                    <a class="btn btn-outline-danger" href="index.php?path=delete-comment&id=<?= $commentary['id'] ?>" onclick="return window.confirm(`Supprimer le commentaire ?`)">Supprimer</a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
<?php endif ?>

<div class="mb-6">
    <form action="index.php?path=insert-comment" method="POST">
        <div class="form-group row">
            <legend>Rédiger un commentaire</legend>
            <label class="form-label mt-4">Votre pseudo</label>
            <input class="form-control" type="text" name="user" placeholder="Francis Huster">
            <label class="form-label mt-4">Votre commentaire</label>
            <textarea class="form-control" name="content" id="" cols="30" rows="10" placeholder="Blablabla ..."></textarea>
            <input class="form-control" type="hidden" name="post_id" value="<?= $post_id ?>">
        </div>
        <div class="form-group row">
            <button class="btn btn-primary">Envoyer !</button>
        </div>
    </form>
</div>