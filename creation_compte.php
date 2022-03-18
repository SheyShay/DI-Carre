<?php
session_start();
session_destroy();

if(isset($_POST['username']) and isset($_POST['mail']) and isset($_POST['password']) and isset($_POST['repassword'])){

    if($_POST['password'] == $_POST['repassword']){
        require_once('bdd.php');

        // $password = hash("sha256", $_POST['password']);
        $password = $_POST['password'];

        $user = register($_POST['username'], $_POST['mail'], $password);
        $pseudo = testPseudo($_POST['username']);

        if($user and !$pseudo){
            session_start();

            $_SESSION['user'] = [
                'key' => $user['utilisateur_id'],
                'pseudo' => $user['utilisateur_pseudo']
            ];

            var_dump($user, $_SESSION['user']);
            // header('location:../Welcome/');
            exit;
        } else {
            
            var_dump('Pseudo', $pseudo);
            // header('location:creation_compte.html?p');
        exit;
        }
    } else {
        var_dump('mot de passe');
        // header('location:creation_compte.html?p');
        exit;
    }
}
var_dump('fin');
// header('location:index.php');
exit;