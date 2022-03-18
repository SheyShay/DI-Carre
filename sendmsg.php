<?php
    require_once('bdd.php');
  if(isset($_POST)) {
    if($_POST['msg']=='')header("location:forumtopic.php?id=$articleid");
    else{
      $msg = $_POST['msg'];
      $articleid = $_POST['articleid'];
      //$utilisateurid = $_SESSION['utilisateur_id'];
      $utilisateurid = 2;
      echo $articleid;
      sendMsgForm($msg,$articleid,$utilisateurid);
    } 
  }
?>