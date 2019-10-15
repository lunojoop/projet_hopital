<html>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="connectadmin.css" media="screen" type="text/css" />
    </head>
    <body style='background:#fff;'>
        <div id="content">
            
            <a href='admin.php?deconnexion=true'><span>Déconnexion</span></a>
            
            <!-- tester si l'utilisateur est connecté -->
            <?php
                session_start();
                if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      header("location:connectadmin.php");
                   }
                }
                else if($_SESSION['username'] !== ""){
                    $user = $_SESSION['username'];
                    // afficher un message
                    echo "<br>Bonjour $user, vous êtes connectés";
                }
            ?>
            
        </div>
        <div>
            <table>
                <tr>
                    <td>MEDECIN</td><td><a class="bouton" href="ajoutmed.php">Ajouter</a></td><td><a class="bouton" href="modifmed.php">Modifier</a></td><td><a class="bouton" href="supmed.php">Supprimer</a></td>
                </tr>
                <tr>
                    <td>SECRETAIRE</td><td><a class="bouton" href="ajoutsec.php">Ajouter</a></td><td><a class="bouton" href="modifsec.php">Modifier</a></td><td><a class="bouton" href="suppsec.php">Supprimer</a></td>
                </tr>
            </table>
        </div>
    </body>
</html>
