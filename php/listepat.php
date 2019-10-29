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
	</br>
	<a href="secre.php">Retour</a>
	<h1>Nabil Choucair</h1>
	<h2>Liste des patients</h2>
    <form method="post" action="">
        <label for="id_medecin">MEDECIN
        <select name="id_medecin">
            <option name="id_medecin[]" value="1">Dr Papa Dame Diop</option>
            <option name="id_medecin[]" value="2">Dr Aminata Guéye</option>
            <option name="id_medecin[]" value="3">Dr MOusa Diop</option>
            <option name="id_medecin[]" value="4">Dr Anta Guéye</option>
            <option name="id_medecin[]" value="5">Dr Chérif Aidara</option>
            <option name="id_medecin[]" value="6">Dr Sokhna Diouf</option>
            <option name="id_medecin[]" value="7">Dr Momo Diop</option>
        </select>
        </label></br>
        <label for="date_rv">Date de Rendez-vous<input type="text" name="date_rv" placeholder="année/mois/jour"></label></br>
        <input type="submit" value="Envoyer" name="envoyer">
    </form>
    <table>
    <tr><td>NOM</td><td>Prénom</td><td>Date de naissance</td><td>Téléphone</td><td>Date de Rendez-vous</td><td>Heure Rendez-vous</td></tr>
    <?php
    if (isset($_POST['envoyer']))
    {
        $id_medecin=$_POST['id_medecin'];
        $date_rv=htmlspecialchars(trim($_POST['date_rv']));
        //$date_rv  =  date ( ' Y/m/d ' );
        
            //Pour vérifier si une date est valide
        if (!preg_match('#^([0-9]{2})([/-])([0-9]{2})\2([0-9]{4})$#', $date_rv)) 
        {
            // appel de la classe Database pour se connecter à notre base de donnée
            require 'pdo.php';
            $db= new Database('hopital');
            $reponse=$db->getPDO()->query('SELECT `nom`, `prenom`, `date_de_naissance`, `telephone`, `date`, `heure` FROM `rendez-vous`WHERE id_medecin='.$id_medecin.' AND `date`="'.$date_rv.'"');
            
            while ($donnees = $reponse->fetch())
            {
                echo '<tr>'.'<td>' . htmlspecialchars($donnees['nom']) . '</td> '.'<td>' . htmlspecialchars($donnees['prenom']) . '</td>'.'<td>' . htmlspecialchars($donnees['date_de_naissance']) .'</td>'.'<td>' . htmlspecialchars($donnees['telephone']) .'</td>'.'<td>' . htmlspecialchars($donnees['date']) .'</td>'.'<td>' . htmlspecialchars($donnees['heure']) .'</td>'.'</tr>';
            }

            $reponse->closecursor();
        } else 
        {
            echo 'Veuillez mettre une date au bon format!';
        }
        
        
    
            
    }  
?>
</table>
</body>    
</html>	