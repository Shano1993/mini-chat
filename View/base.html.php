<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acceuil</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <header>
        <div class="logo"></div>
        <div class="title">
            <h1>Chat pour adultes 🔥</h1>
        </div>
    </header>

    <div>
        <?= $html ?>
    </div>

    <div class="enter">
        <div>
            <input type="text" name="username" id="username" placeholder="Votre pseudo">
        </div>
        <div>
            <input type="number" name="age" id="age" placeholder="Votre âge">
        </div>
        <input type="submit" name="submit" id="submit" value="Entrer 😘">
    </div>
    <script src="/assets/js/app.js"></script>
</body>
</html>