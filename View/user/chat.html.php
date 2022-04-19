<h2>Discuter avec des gens du monde entier !</h2>

<div class="font">
    <div class="messages">
        <?php
            if (isset($_POST['save'])) { ?>
                <p><?= $_SESSION['user'] ?></p> <?php
            }
        ?>
    </div>

    <div class="foot">
        <div class="text">
            <input type="text" name="message" id="message" placeholder="Votre message ici">
        </div>

        <input type="submit" name="save" value="Envoyer" id="send">
    </div>
</div>
