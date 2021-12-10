<h1 class="text-success mb-5"><?= $pageTitle ?></h1>

<div class="mb-6">
    <form action="index.php?controller=commentaryController&task=insert" method="POST">
        <div class="form-group row">
            <legend>Rédiger un article</legend>
            <label class="form-label mt-4">Votre pseudo</label>
            <input class="form-control" type="text" name="author" placeholder="Francis Huster">
            <label class="form-label mt-4">Votre article</label>
            <textarea class="form-control" name="content" id="" cols="30" rows="10" placeholder="Blablabla ..." name="author"></textarea>
            <input class="form-control" type="hidden" name="article_id" value="<?= $post_id ?>">
            <input class="btn" type="file" id="file" name="image">
        </div>
        <div class="form-group row">
            <button class="btn btn-primary">Envoyer !</button>
        </div>
    </form>
</div>

