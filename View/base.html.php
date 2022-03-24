<?php

use App\Controller\AbstractController;

?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body> <?php

echo "<pre>";
var_dump([
    'user in session' => isset($_SESSION['user']),
    'user_connected' => UsersController::isUserConnected(),
]);
echo "</pre>";

?>
    <header>
        <h1>Chat en Folie</h1>
    </header>

        <nav>
            <a href="/index.php?c=home" class="link">Acceuil</a>
            <?php
            if (!AbstractController::isUserConnected()) { ?>
                <a href="/index.php?c=user" class="link">Inscription</a>
                <a href="/index.php?c=user&a=login" class="link">Connexion</a> <?php
            }
            else { ?>
                <a href="/index.php?c=user&a=profil" class="link">Pseudo : <?= $_SESSION['user']->getUsername() ?></a>
                <a href="/index.php?c=user&a=logout" class="link">Deconnexion</a> <?php
            }
            ?>
        </nav>

    <div class="container">
        <?= $html ?>
    </div>

    <script src="/assets/js/app.js"></script>
</body>
</html>