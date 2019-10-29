<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>prise de</title>
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>
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
                    echo "<br>Bonjour $user, vous êtes connectés";
                }
            ?>
            
    </div>
	</br>
	<a href="med.php">Retour</a>
	<h1>Nabil Choucair</h1>
	<h2>Historique patient</h2>
    <form method="post" action="">
        <label for="id_medecin">MEDECIN
        <select name="id_medecin">
            <option name="id_medecin[]" value="1">Dr Papa Dame Diop</option>
            <option name="id_medecin[]" value="2">Dr Aminata Guéye</option>
            <option name="id_medecin[]" value="3">Dr MOussa Diop</option>
            <option name="id_medecin[]" value="4">Dr Anta Guéye</option>
            <option name="id_medecin[]" value="5">Dr Chérif Aidara</option>
            <option name="id_medecin[]" value="6">Dr Sokhna Diouf</option>
            <option name="id_medecin[]" value="7">Dr Momo Diop</option>
        </select>
        </label></br>
        
        <input type="submit" value="Envoyer" name="envoyer">
    </form>
    <table>
    <tr><td>NOM</td><td>Prénom</td><td>Commentaire</td></tr>
    <?php
    if (isset($_POST['envoyer']))
    {
        $id_medecin=$_POST['id_medecin'];
        $date=date('Y-m-d');
        
        //$date_rv  =  date ( ' Y/m/d ' );
        
            
        
            // appel de la classe Database pour se connecter à notre base de donnée
            require 'pdo.php';
            $db= new Database('hopital');
            $reponse=$db->getPDO()->query('SELECT `nom`, `prenom`, `commentaire` FROM `rendez-vous` WHERE id_medecin='.$id_medecin.' AND `date`="'.$date.'"');
            
            while ($donnees = $reponse->fetch())
            {
                echo '<tr>'.'<td>' . htmlspecialchars($donnees['nom']) . '</td> '.'<td>' . htmlspecialchars($donnees['prenom']) . '</td>'.'<td>' . htmlspecialchars($donnees['commentaire']) .'</td>'.'</tr>';
            }

            $reponse->closecursor();
        
        
        
    
            
    }  
?>
</table>
</body>    
</html>	