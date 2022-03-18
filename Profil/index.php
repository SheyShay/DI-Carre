<?php session_start();

if(!isset($_SESSION['user'])){
    header('location:../Welcome/');
    exit;
}
?>

<!DOCTYPE html>

<html lang="fr">
    <head>
        <?php require_once('../res/head.html'); ?>

        <title>Profil</title>
    </head>

    <body>
        <?php require_once('../res/header.php'); ?>

        <form action="../Login/connect.php" method="POST">
            <button type="submit">Déconnexion</button>
        </form>
    </body>
</html>
