<h1 class="text-success mb-5"><?= $pageTitle ?></h1>

<?php foreach ($users as $user) : ?>
    <div class="card border-primary mb-3" style="max-width: 80rem;">
        <div class="card-header">Mail : <?= $user['mail'] ?></div>
        <div class="card-body">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Nom :</label>
                <div class="col-sm-10">
                    <input type="text" readonly="" class="form-control-plaintext" id="staticEmail" value="<?= $user['firstname'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Prénom :</label>
                <div class="col-sm-10">
                    <input type="text" readonly="" class="form-control-plaintext" id="staticEmail" value="<?= $user['lastname'] ?>">
                </div>
            </div>
        </div>
        <form action="index.php?path=update-user" method="POST">
            <fieldset class="form-group">
                <div class="btn-group p-3" role="group" aria-label="Basic radio toggle button group">
                    <input 
                        type="radio"
                        class="btn-check"
                        name="isAdmin"
                        id="btnradio1"
                        autocomplete="off"
                        <?php if ($user['is_admin'] == false) : ?>
                        checked=""
                        <?php endif ?>
                    >
                    <label class="btn btn-outline-primary" for="btnradio1">Simple utilisateur</label>
                    <input
                        type="radio"
                        class="btn-check"
                        name="isAdmin"
                        id="btnradio2"
                        autocomplete="off"
                        <?php if ($user['is_admin'] == true) : ?>
                        checked=""
                        <?php endif ?>
                    >
                    <label class="btn btn-outline-primary" for="btnradio2">Administrateur</label>
                </div>
                <input class="form-control" type="hidden" name="user_id" value="<?= $user['id'] ?>">
            </fieldset>
            <!-- <div class="form-group p-3">
                <a class="btn btn-success" href="index.php?path=update-user&id=<?= $user['id'] ?>">Enregistrer les modifications</a>
            </div> -->
            <div class="form-group p-3">
                <button class="btn btn-success">Enregistrer les modifications</button>
            </div>
        </form>

        <div class="d-flex flex-row-reverse p-3">
            <a class="btn btn-danger" href="index.php?path=delete-user&id=<?= $user['id'] ?>" onclick="return window.confirm(`Supprimer l'utilisateur <?= $user['mail'] ?> ?`)">Supprimer l'utilisateur</a>
        </div>

    </div>
<?php endforeach ?>