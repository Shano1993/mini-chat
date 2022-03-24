<h1>Formulaire d'inscription</h1>

<form action="/index.php?c=user&a=register" method="post">
    <div>
        <label for="email">Votre Email</label>
        <input type="email" name="email" id="email">
    </div>
    <div>
        <label for="password">Votre mot de passe</label>
        <input type="password" name="password" id="password">
    </div>
    <div>
        <label for="password-repeat">Répéter le mot de passe</label>
        <input type="password" name="password-repeat" id="password">
    </div>
    <div>
        <label for="username">Votre pseudo</label>
        <input type="text" name="username" id="username">
    </div>
    <input type="submit" name="save" value="Valider">

</form>