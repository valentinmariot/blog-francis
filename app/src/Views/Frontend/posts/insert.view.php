<h1 class="text-success mb-5"><?= $pageTitle ?></h1>
<div class="mb-6">
    <form action="index.php?path=insert-post" method="POST">
        <div class="form-group row">
            <legend>Rédiger un article</legend>
            <label class="form-label mt-4">Titre</label>
            <input class="form-control" type="text" name="title" placeholder="Robot Chicken, le retour ...">
            <label class="form-label mt-4">Votre article</label>
            <textarea class="form-control" name="content" id="" cols="30" rows="10" placeholder="Blablabla ..."></textarea>
            <input class="form-control" type="hidden" name="id_user" value="999">
            <input class="btn" type="file" id="file" name="image">
        </div>
        <div class="form-group row">
            <button type="submit" class="btn btn-primary">Envoyer !</button>
        </div>
    </form>
</div>
