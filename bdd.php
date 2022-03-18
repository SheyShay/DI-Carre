<?php

function connect(){
    try{
        $db = new PDO(
            'mysql:host=localhost;dbname=cubeweb;charset=utf8','root','',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }catch(Exception $e){
        die("erreur de connexion PDO : ".$e->getMessage());
    }
    return $db;
}

function printleaderboard($id) {
    $db = connect();
    $requete = "SELECT * FROM score 
    NATURAL JOIN jeux
    NATURAL JOIN utilisateur
    where jeux_id = $id
    ORDER BY score_score DESC
    ";
    $listescore = $db->query($requete)->fetchAll(PDO::FETCH_ASSOC);
    $i=0;
    foreach($listescore as $score){
        $i = $i + 1;
        echo"
        <tr class='list__row'>
            <td class='list__cell'><span class='list__value'>$i</span></td>
            <td class='list__cell'><span class='list__value'>{$score['utilisateur_pseudo']}</span><small class='list__label'>Utilisateur</small></td>
            <td class='list__cell'><span class='list__value'>{$score['score_date']}</span><small class='list__label'>Date</small></td>
            <td class='list__cell'><span class='list__value'>{$score['score_score']}</span><small class='list__label'>Points</small></td>
          </tr>";
    }
}

function printarticle() {
    $db = connect();
    $requete = "SELECT * FROM forum_article 
    NATURAL JOIN jeux
    NATURAL JOIN utilisateur
    ";
    $listeforum = $db->query($requete)->fetchAll(PDO::FETCH_ASSOC);
    foreach($listeforum as $article){
        echo "<a href='forumtopic.php?id={$article['article_id']}'><div class='block-file-forum'>
        <div id='block-ligne1'>
            <div class='forum-sujet'>Sujet : {$article['article_sujet']}</div>
            <div class='forum-id'>Id : {$article['article_id']}</div>
            <div class='forum-nom-jeu'>{$article['jeux_nom']}</div>
        </div>
        <div id='block-ligne2'>
            <div class='forum-qui'>Posté par : {$article['utilisateur_pseudo']}</div>
            <div class='forum-quand'>Date création :{$article['article_date']}</div>
        </div>
        <div id='block-ligne3'>
            <div class='forum-quoi'>{$article['article_msg']}
            </div>
        </div>
    </div></a>";
    } 
}
function printOnearticle($id) {
    $db = connect();
    $requete = "SELECT * FROM forum_article 
    NATURAL JOIN jeux
    NATURAL JOIN utilisateur
    where article_id = $id;
    ";
    $listeforum = $db->query($requete)->fetchAll(PDO::FETCH_ASSOC);
    foreach($listeforum as $article){
        echo "<a href='forumtopic.php?id={$article['article_id']}'><div class='block-file-forum'>
        <div id='block-ligne1'>
            <div class='forum-sujet'>Sujet : {$article['article_sujet']}</div>
            <div class='forum-id'>Id : {$article['article_id']}</div>
            <div class='forum-nom-jeu'>{$article['jeux_nom']}</div>
        </div>
        <div id='block-ligne2'>
            <div class='forum-qui'>Posté par : {$article['utilisateur_pseudo']}</div>
            <div class='forum-quand'>Date création :{$article['article_date']}</div>
        </div>
        <div id='block-ligne3'>
            <div class='forum-quoi'>{$article['article_msg']}
            </div>
        </div>
    </div></a>";
    } 
}
function printmsg($idarticle) {
    $db = connect();
    $requete = "SELECT * FROM forum_msg
    NATURAL JOIN utilisateur
    where article_id = $idarticle;
    ";
    $listemsg = $db->query($requete)->fetchAll(PDO::FETCH_ASSOC);
    foreach($listemsg as $msg){
        echo "<div class='block-file-forum'>
        <div id='block-ligne1'>
            <div class='forum-id'>Id : {$msg['msg_id']}</div>
        </div>
        <div id='block-ligne2'>
            <div class='forum-qui'>Posté par : {$msg['utilisateur_pseudo']}</div>
            <div class='forum-quand'>Date création :{$msg['msg_date']}</div>
        </div>
        <div id='block-ligne3'>
            <div class='forum-quoi'>{$msg['msg_msg']}
            </div>
        </div>
    </div>";
    } 
}

function sendMsgForm($msg, $articleid, $utilisateurid) {
    $db = connect();
    date_default_timezone_set('Europe/Paris');
    $today = date('d/m/Y', time());
    $s = "INSERT INTO forum_msg (msg_msg,msg_date,article_id,utilisateur_id)
    VALUES(:msg,:dates,:artid,:usid)";
    $req = $db->prepare($s);
    
    $req->BindValue('msg',$msg,PDO::PARAM_STR);
    $req->BindValue('dates',$today,PDO::PARAM_STR);
    $req->BindValue('artid',$articleid,PDO::PARAM_STR);
    $req->BindValue('usid',$utilisateurid,PDO::PARAM_STR);
    $req->execute();
    header("location:forumtopic.php?id=$articleid");
  }
  
  function sendForumForm($sujet,$msg,$jeuxid,$utilisateurid) {
    $db = connect();
    date_default_timezone_set('Europe/Paris');
    $today = date('d/m/Y', time());
    $s = "INSERT INTO forum_article (article_sujet,article_date,article_msg,utilisateur_id,jeux_id)
    VALUES(:sujet,:dates,:msg,:usid,:jeuxid)";
    $req = $db->prepare($s);
    
    $req->BindValue('sujet',$sujet,PDO::PARAM_STR);
    $req->BindValue('dates',$today,PDO::PARAM_STR);
    $req->BindValue('msg',$msg,PDO::PARAM_STR);
    $req->BindValue('usid',$utilisateurid,PDO::PARAM_STR);
    $req->BindValue('jeuxid',$jeuxid,PDO::PARAM_INT);
    $req->execute();
    echo "$sujet,$today,$msg,$utilisateurid,$jeuxid";
    header("location:forum.php");
  }

  function sendContactForm($nom,$mail,$msg,$utilisateurid) {
    $db = connect();
    date_default_timezone_set('Europe/Paris');
    $today = date('d/m/Y', time());
    $s = "INSERT INTO contact (contact_nom,contact_mail,contact_msg,contact_date,utilisateur_id)
    VALUES(:nom,:mail,:msg,:dates,:usid)";
    $req = $db->prepare($s);
    
    $req->BindValue('nom',$nom,PDO::PARAM_STR);
    $req->BindValue('mail',$mail,PDO::PARAM_STR);
    $req->BindValue('msg',$msg,PDO::PARAM_STR);
    $req->BindValue('dates',$today,PDO::PARAM_STR);
    $req->BindValue('usid',$utilisateurid,PDO::PARAM_INT);
    $req->execute();
    header("location:contact.php?id=1");
  }
  function printsharticle($recherche) {
    $db = connect();
    $requete = "SELECT * FROM forum_article 
    NATURAL JOIN jeux
    NATURAL JOIN utilisateur
    WHERE article_sujet  LIKE :recherche or article_msg LIKE :recherche or utilisateur_pseudo LIKE :recherche
    ";
    $liste = $db->prepare($requete);
    $liste->BindValue('recherche',"%$recherche%",PDO::PARAM_STR);
    $liste->execute();
    foreach($liste as $article) {
        echo "<a href='forumtopic.php?id={$article['article_id']}'><div class='block-file-forum'>
        <div id='block-ligne1'>
            <div class='forum-sujet'>Sujet : {$article['article_sujet']}</div>
            <div class='forum-id'>Id : {$article['article_id']}</div>
            <div class='forum-nom-jeu'>{$article['jeux_nom']}</div>
        </div>
        <div id='block-ligne2'>
            <div class='forum-qui'>Posté par : {$article['utilisateur_pseudo']}</div>
            <div class='forum-quand'>Date création :{$article['article_date']}</div>
        </div>
        <div id='block-ligne3'>
            <div class='forum-quoi'>{$article['article_msg']}
            </div>
        </div>
    </div></a>";
    }
}

function printutilisateur() {
    $db = connect();
    $requete = "SELECT * FROM utilisateur 
    NATURAL JOIN info;";
    $listuser = $db->query($requete)->fetchAll(PDO::FETCH_ASSOC);
    foreach($listuser as $user){
        //src = 
        echo "<div class='info-user'>
        <img src='images/compte-utilisateur-1.png' alt='image utilisateur'>
        <h3>{$user['utilisateur_pseudo']}</h3>
        <h3>{$user['info_prenom']}</h3>
        <h3>{$user['info_nom']}</h3>
        <p>{$user['info_description']}</p>
        <h3>{$user['info_date_naissance']}</h3>
        <h3>{$user['info_date_inscription']}</h3>
    </div>
        ";
    }

}


/*
function getGamebyId($id){
    $db = connect();

    $s = "SELECT jeux_nom FROM jeux WHERE jeux_id = $id";

    $results = $db->query($s);
    var_dump($results);
    return $results;
}
function getNamebyId($id){
    $db = connect();

    $s = "SELECT utilisateur_pseudo FROM utilisateur WHERE info_id = $id";

    $results = $db->query($s);
    return $results;
}
function getLastDatemsg($id) {
    $db = connect();

    $s = "SELECT MAX(msg_date) FROM forum_msg WHERE article_id = $id";

    $results = $db->query($s);
    return $results;
}
*/






// Ilan JAGLIN

/**
* @param $username string
* @param $password string
* @return array
**/
function isRegistered($username, $password){
    $db = connect();
    $sql = "SELECT * FROM `utilisateur` WHERE `utilisateur_pseudo` = :username AND `utilisateur_password` = :password";

    $request = $db->prepare($sql);
    $request->bindvalue(':username', $username, PDO::PARAM_STR);
    $request->bindvalue(':password', $password, PDO::PARAM_STR);

    $request->execute();
    $return = $request->fetch();
    
    if($return){
        return $return;
    }
    return false;
}
/**
* @param $pseudo string
* @param $email string
* @param $pwd string
* @return array
**/
function register($pseudo, $mail, $password){
    $db = connect();
    $sql = "INSERT INTO `utilisateur`(`utilisateur_pseudo`, `utilisateur_mail`, `utilisateur_password`) VALUES (:pseudo, :mail, :password)";

    $request = $db->prepare($sql);
    $request->bindvalue(':pseudo', $pseudo, PDO::PARAM_STR);
    $request->bindvalue(':mail', $mail, PDO::PARAM_STR);
    $request->bindvalue(':password', $password, PDO::PARAM_STR);

    $return = $request->execute();

    if($return){
        return isRegistered($pseudo, $password);
    }
    return false;
}
?>