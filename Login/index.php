<?php session_start(); ?>

<!DOCTYPE html>

<html lang="fr">
    <head>
        <?php require_once('../res/head.html'); ?>

        <title>Connexion</title>
    </head>

    <body>
        <main>
            <a href="../Welcome/" title="Accueil">
                <img src="img/icons-accueil-96.png" alt="Accueil"/>
            </a>

            <form action="connect.php" method="POST">
                <?php if(isset($_SESSION['user'])){ ?>
                    <button type="submit">Déconnexion</button>
                    
                <?php } else {
                    if(isset($_GET['e'])){
                        echo '<p>Email / Mot de passe incorrect</p>';
                    } ?>
                    <input type="email" name="email" placeholder="Email" required autofocus/>
                    <label for="email">Email</label>
                    
                    <input type="password" name="pwd" placeholder="Mot de passe" required/>
                    <label for="pwd">Password</label>

                    <button type="submit">Connexion</button>
                    
                    <a href="register.php">S'inscrire</a>
                <?php } ?>
            </form>
        </main>
    </body>
</html>