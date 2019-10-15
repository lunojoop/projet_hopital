    <html>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="connectsec.css" media="screen" type="text/css" />
    </head>
    <body style='background:#fff;'>
        <div id="content">
            
            <a href='secre.php?deconnexion=true'><span>Déconnexion</span></a>
            
            <!-- tester si l'utilisateur est connecté -->
            <?php
                session_start();
                if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      header("location:connectsecretaire.php");
                   }
                }
                else if($_SESSION['username'] !== ""){
                    $user = $_SESSION['username'];
                    // afficher un message
                    echo "<br>Bonjour  $user, vous êtes connectés";
                }
            ?>
            
        </div>
        <div>
            <a href="ajoutrv.php">Prise de Rendez-vous</a></br>
            <a href="">Liste Medecin du service</a></br>
            <a href="">Liste Patient</a>
        
        </div>
    </body>
</html>
