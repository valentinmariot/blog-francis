<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://bootswatch.com/5/vapor/bootstrap.css">
    <title>Bloblyblog - <?= $pageTitle ?></title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">B.B.B</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Tous les articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?path=newpost">Rédiger un article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?path=userlist">Liste des utilisateurs</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?path=signup">Inscription</a>
                    </li>
                    <li class="d-flex nav-item">
                        <a class="nav-link" href="index.php?path=connection">Connexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <?= $pageContent ?>
    </div>

    <footer>
        <div class="d-flex flex-row-reverse p-3">
            <hr>
            <small>Powered by Carine Grisot & Valentin Mariot - WEBP2023</small>
        </div>
    </footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>