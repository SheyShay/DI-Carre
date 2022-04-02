<?php
    require_once('bdd.php');
  if(isset($_POST)) {
    $nom = $_POST['name'];
    $mail = $_POST['email'];
    $msg = $_POST['msg'];
    //$utilisateurid = $_SESSION['utilisateur_id'];
    $utilisateurid = 1;
    sendContactForm($nom,$mail,$msg,$utilisateurid);
    }
?>