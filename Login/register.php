<?php session_start();
session_destroy();

if(!empty($_POST)){
    if(isset($_POST['pseudo']) and isset($_POST['email']) and isset($_POST['pwd'])){
        require_once('../classes/FunctionSQL.php');
        require_once('../classes/LoginSQL.php');

        $login = new LoginSQL();

        $pwd = hash("sha256", $_POST['pwd']);

        $user = $login->register($_POST['pseudo'], $_POST['email'], $pwd);var_dump($user);

        if($user){
            session_start();

            $_SESSION['user'] = [
                'key' => $user['pk_login'],
                'pseudo' => $user['login-pseudo']
            ];

            header('location:../Welcome/');
            exit;
        } else {
            $pseudo = $login->testPseudo($_POST['pseudo']);
            $email = $login->testEmail($_POST['email']);
        }
    }
}
?>

<!DOCTYPE html>

<html lang="fr">
    <head>
        <?php require_once('../res/head.html'); ?>

        <title>S'inscrire</title>
    </head>

    <body>
        <a href="../Welcome/" title="Accueil">
            <img src="img/icons-accueil-96.png" alt="Accueil"/>
        </a>

        <form action="" method="POST">
            <input type="text" name="pseudo" placeholder="Pseudo" required>
                <?php if(isset($pseudo)){ ?>
                    <label for="pseudo" class="error">Pseudo déjà utilisé</label>
                    
                <?php } else { ?>
                    <label for="pseudo">Pseudo</label>

                <?php } ?>

            <input type="email" name="email" placeholder="Email" required>
                <?php if(isset($email)){ ?>
                    <label for="email" class="error">Email déjà utilisé</label>

                <?php } else { ?>
                    <label for="email">Email</label>

                <?php } ?>

            <input type="password" name="pwd" placeholder="Mot de passe" required>
                <label for="pwd">Mot de passe</label>

            <button type="submit">S'inscrire</button>
        </form>
    </body>
</html>