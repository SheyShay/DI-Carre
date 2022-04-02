<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Modifier Profil</title>
</head>

<body>
    <?php
        include ('head.html');
    ?>
    <h1 id="title-jeu-videos" class="title-page">Modifier le Profil</h1>
    <main id="block-profile">
        <div id="block-image-info">
            <div id="block-image">
                <img src="images/compte-utilisateur-1.png" alt="image utilisateur">
                <select name="nom" size="1" id="">
                        <option selected>Profil Anonyme</option>
                        <option> Profil Homme</option>
                        <option> Profil Femme</option>
                        <option> Profil Non Binaire</option>
                </select>
                <input type="submit" class="btn" value="Enregistrer" id="valide"/>
            </div>
            <form id="formModifier" action="" method="POST">
                <input type="text" name="Pseudo" value="" placeholder="Pseudo" required class="txtBox" />
                <input type="text" name="Prenom" value="" placeholder="Prénom" required class="txtBox"/>
                <input type="text" name="Nom" value="" placeholder="Nom" required class="txtBox"/>
                <input type="date" name="datenaissance" value=""/>
                <textarea name="text" placeholder="Description" id="taille-text"></textarea>
                <div id="validation">
                    <input onclick="window.location.href = 'profil.php'" type="reset" class="btn" value="Annuler" id="annulation" class="valid-profil"/>
                    <input type="submit" class="btn" value="Enregistrer"id="enregistrement"/>
                </div>             
            </form>
            </div>
        </div>
    </main>
    <?php
        include('footer.html');
    ?>
</body>

</html>