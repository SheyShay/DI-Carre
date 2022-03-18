<header id="main_header">
    <link rel="stylesheet" href="../res/header.css">

    <a href="../Welcome">
        <img id="logo_header" src="../res/img/logo_di-carre.png" alt="Logo DI²"/>
    </a>

    <nav>
        <a href="../Welcome">Accueil</a>
    </nav>

    <div>
        <?php if(isset($_SESSION['user'])){ ?>
            <a href="../Profil/"><?php echo $_SESSION['user']['pseudo']; ?></a>

        <?php } else { ?>
            <a href="../Login/">Connexion</a>

        <?php } ?>
    </div>
</header>