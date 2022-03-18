<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Profil</title>
</head>

<body>
    <?php
        include ('head.html');
    ?>
    <h1 id="title-jeu-videos">Profil</h1>
    <main id="block-profile">
        <div id="block-image-info">
            <div id="block-image">
                <img src="images/compte-utilisateur-1.png" alt="image utilisateur">
                <button onclick="window.location.href = 'modifierProfil.php'" class="modif-profil">Modifier l'image</button>
            </div>
            <div id="info-profil">
                <h2 class="style-info">SheyShay</h2>
                <h2 class="style-info">David</h2>
                <h2 class="style-info">Lansonneur</h2>
                <h2 class="style-info">05/09/1995</h2>
                <p class="style-info">Hello, je m'appelle David, je suis l'un des fondateurs de se site internet trop beau ! Mais je sais pas jouer dessus</p>
                <button onclick="window.location.href = 'modifierProfil.php'" class="modif-profil">Modifier Profil</button>          
            </div>
        </div>
    </main>
    <?php
        include("footer.html");
    ?>
</body>

</html>