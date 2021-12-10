<h1 class="text-success mb-5"><?= $pageTitle ?></h1>

<?php foreach ($posts as $post) : ?>
    <div class="card mb-12 border-success">
        <h2 class="card-header"><?= $post['title'] ?></h2>
        <small class="text-grey px-3">Ecrit le : <?= $post['date'] ?></small>
        <div class="card-body">
            <p class="card-text"><?= substr($post['content'], 0, 55); ?> ...</p>
        </div>
        <div class="card-body">
            <a href="index.php?path=post&id=<?= $post['id'] ?>" class="card-link">Lire la suite</a>
            <a class="card-link" href="index.php?path=delete-post&id=<?= $post['id'] ?>" onclick="return window.confirm(`Supprimer l'article : <?= $post['title'] ?> ?`)">Supprimer</a>
        </div>
    </div>
    <br>
<?php endforeach ?>