<?php session_start();
session_destroy();

if(isset($_POST['email']) and isset($_POST['pwd'])){
    session_start();
    require_once('../classes/FunctionSQL.php');
    require_once('../classes/LoginSQL.php');

    $login = new LoginSQL();

    $pwd = hash("sha256", $_POST['pwd']);

    $user = $login->isRegistered($_POST['email'], $pwd);
    if($user){
        $_SESSION['user'] = [
            'key' => $user['pk_login'],
            'pseudo' => $user['login-pseudo']
        ];

    } else {
        header('location:./?e');
        exit;
    }
}
header('location:../Welcome/');
exit;
