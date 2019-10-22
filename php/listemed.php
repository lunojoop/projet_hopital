
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>prise de</title>
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>
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
                    echo "<br>Bonjour $user, vous êtes connectés";
                }
            ?>
            
    </div>
	
	<h1>Nabil Choucair</h1>
	<h2>Liste des Médecins du service</h2>
    <?php
            
    
   // appel de la classe Database pour se connecter à notre base de donnée
    require 'pdo.php';
    $db= new Database('hopital');
    $req=$db->getPDO()->query('SELECT  `nom`, `prenom` FROM `medecin` WHERE medecin.id_service=1');
    $row_cnt = $req->num_rows;

    printf("Le jeu de résultats a %d lignes.\n", $row_cnt);
?>

</body>    
</html>	
