<html>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="connectadmin.css" media="screen" type="text/css" />
    </head>
    <body style='background:#fff;'>
        <div id="content">
            
            <a href='med.php?deconnexion=true'><span>Déconnexion</span></a>
            
            <!-- tester si l'utilisateur est connecté -->
            <?php
                session_start();
                if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      header("location:connectmedecin.php");
                   }
                }
                else if($_SESSION['username'] !== ""){
                    $user = $_SESSION['username'];
                    // afficher un message
                    echo "<br>Bonjour Docteur $user, vous êtes connectés";
                }
            ?>
            
        </div>
        <div>
            <a href="">Liste Patient</a></br>
            <a href="">Historique Patient</a>
        </div>
    </body>
</html>
