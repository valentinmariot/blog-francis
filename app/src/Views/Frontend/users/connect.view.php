<h1 class="text-success mb-5"><?= $pageTitle ?></h1>

<form class="m-4" style="max-width: 50rem;" method="POST" action="index.php?path=connect">
  <fieldset>
    <legend>Connexion</legend>
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Adresse e-mail</label>
      <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="monmail@mail.com" name="mail">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Mot de passe</label>
      <input type="password" class="form-control" placeholder="Mot de passe top secret" name="pwd">
    </div>
    <div class="form-group mt-4">
    <button class="btn btn-primary">Connexion</button>
    </div>
  </fieldset>
</form>

