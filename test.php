<?php
    require_once('classes/FunctionSQL.php');
    require_once('classes/LoginSQL.php');
    require_once('classes/LeaderBoardSQL.php');

    echo '<p>JEUX</p>';
    $test = new FunctionSQL();
    $return = $test->selectAll('jeux');
    var_dump($return);

    echo '<p>LOGIN</p>';
    $test2 = new LoginSQL();
    $return = $test2->isRegistered('pat@te', '42Ye59Y3eKP3x9T');
    var_dump($return);

    echo '<p>LEADERBOARD</p>';
    $leaderBoard = new LeaderBoardSQL();
    $return = $leaderBoard->getAllForGame(3);
    var_dump($return);
?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="./test.css">

        <title>Document</title>
    </head>

    <body>
        <!-- <div class="dropdown">
            <button class="dropbtn">Dropdown</button>
            
            <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div>
        </div> -->

        <a href="./test.php">reload</a>

        <form action="" method="POST">
            <input type="text" name="jeu-nom" placeholder="Game name">
            <button type="submit">Submit game</button>
        </form>

        <form action="" method="POST">
            <input type="text" name="pseudo" placeholder="Pseudo">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit">Register</button>
        </form>
        
        <?php
            function sqlAddJeu($value){
                $db = connect();

                $sql = "INSERT INTO `jeux`(`jeu-nom`) VALUES ('$value')";

                return $db->exec($sql);
            }
            if(isset($_POST['jeu-nom'])){
                $return = $_POST['jeu-nom'];
                var_dump($return);
            }

            if(isset($_POST['pseudo'])){
                $return = $test2->register($_POST['pseudo'], $_POST['email'], $_POST['pwd']);
                var_dump($return);
            }
            $test2->testPseudo('black');
        ?>
    </body>
</html>
