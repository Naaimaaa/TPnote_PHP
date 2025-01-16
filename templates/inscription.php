<!DOCTYPE html>
<html lang="fr">
<?php include('global/head.php'); ?>
<body>
    <?php include('global/header.php'); ?>
    <main>
        <section class="inscription">
            <div class="form-container">
                <h1>Inscription</h1>
                <form action="inscription.php" method="POST">
                    <label for="name">Nom</label>
                    <input type="text" id="name" name="name" placeholder="Votre nom" required>

                    <label for="name">Prénom</label>
                    <input type="text" id="prenom" name = "prenom" placeholder="Votre prénom" required>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Votre email" required>

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>

                    <input type="submit" id="subscribe-submit" value="S'inscrire" >
                </form>
            </div>
        </section>
    </main>
    <?php include('global/footer.php'); ?>
</body>
</html>