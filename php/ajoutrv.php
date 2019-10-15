<?php
            
    if (isset($_POST['ajouter']))
    {
        
        $nom = htmlspecialchars(trim($_POST['nom']));
        $prenom = htmlspecialchars(trim($_POST['prenom']));
        $bday = htmlspecialchars(trim($_POST['bday']));
        $tel = htmlspecialchars(trim($_POST['tel']));
        $date_rv = htmlspecialchars(trim(md5($_POST['date_rv'])));
        $heure_rv = htmlspecialchars(trim($_POST['heure_rv']));
        $com = htmlspecialchars(trim($_POST['com']));
        $id_secretaire = htmlspecialchars(trim($_POST['id_secretaire']));
        $id_medecin = htmlspecialchars(trim($_POST['id_medecin']));
        
         $date_rv->format("Y-m-d");     
               /* header('location:0.php');*/
        if (preg_match("/^[a-zA-Z\S ]+$/", $nom))
        {
            if (preg_match("/^[a-zA-Z\S ]+$/", $prenom))
            {
                if (preg_match("#^7[0|5|6|7|8][0-9]{7}#",$tel))
                {
                    
                    //if ( $date_rv > strtotime( 'now' ) )
                   // {

                        if /*(*/($heure_rv >="08:00" || $heure_rv<="13:00") //OR ($heure_rv >= "15:00" || $heure_rv<="17:00"))
                        {

                        
                            if (!empty($bday) AND !empty($tel) AND !empty($date_rv) AND !empty($heure_rv) AND !empty($com) AND !empty($id_secretaire) AND !empty($id_medecin))
                            {

                                // appel de la classe Database pour se connecter à notre base de donnée
                                require 'pdo.php';
                                $db= new Database('hopital');
                                $req='INSERT INTO `rendez-vous`(`nom`, `prenom`, `date_de_naissance`, `telephone`, `date`,`heure`, `commentaire`,`id_secretaire`, `id_medecin`) VALUES (?,?,?,?,?,?,?,?,?)';
                                $inser=$db->getPDO()->prepare($req);
                                $inser->execute(array($nom,$prenom,$bday,$tel,$date_rv,$heure_rv,$com,$id_secretaire,$id_medecin));
                                
                            }
                            else
                            {
                                echo "veuillez remplir tous les champs!";
                            }
                        }
                        else 
                        {
                            echo 'veuillez mettre une heure comprise entre 08h et 13h ou entre 15h et 17h!';
                        }
                    /*} 
                    else
                    {
                        echo 'veuillez mettre une date valide!';
                    }*/
                }
                else
                {
                    echo " veuillez entrer un numéro de telephone valide !";
                }   
            }
            else
            {
                 echo "le prénom ne doit contenir que des lettres!";
            }
        }
        else
        {
            echo "le prénom ne doit contenir que des lettres!";
        }
                
			
                
            
        
        
    }

?>
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
                      header("location:connectsec.php");
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
	<h2>Ajout d'un Rendez-Vous</h2>
    
	<form method="post" action="">
        <table>
            <tr><td><label for="nom">Nom<input type="Text" name="nom"></label></br></br></br></td></tr>
            
            <tr><td><label for="prenom">Prénom<input type="Text" name="prenom"></label></br></br></br></td></tr>
        
            
            <tr><td><label for="bday">Date de Naissance<input type="date" name="bday"></label></br></br></br></td></tr>
            
            
            
            <tr><td><label for="tel">Téléphone<input type="text" name="tel" ></label></br></br></br></td><tr>
         
            <tr><td><label for="date_rv">Date du Rendez-Vous<input type="date" name="date_rv" ></label></br></br></br></td><tr>
            
            <tr><td><label for="heure_rv">Heure du Rendez-Vous<input type="time" name="heure_rv" ></label></br></br></br></td><tr>
            <tr><td><label for="com">commentaire<input type="text" name="com" ></label></br></br></br></td><tr>
            <tr><td><label for="id_secretaire">Secrétaire
                <select name="id_secretaire" id="id_secretaire">
                    <option name="id_secretaire[]" value="1">Fatou Diop</option>
                    <option name="id_secretaire[]" value="2">Seynabou Fall</option>
                    <option name="id_secretaire[]" value="3">Daba Séye</option>
                    <option name="id_secretaire[]" value="4">Thioro Guéye</option>
                    <option name="id_secretaire[]" value="5">Fatoumata Ndiaye</option>
                    <option name="id_secretaire[]" value="6">Rama Lo</option>
                </select>
                </label></br></br></br></td><tr>
            <tr><td><label for="id_medecin">Médecin
                <select name="id_medecin" id="id_medecin">
                    <option name="id_medecin[]" value="1">Dr Papa Dame Diop</option>
                    <option name="id_medecin[]" value="2">Dr Aminata Guéye</option>
                    <option name="id_medecin[]" value="3">Dr Moussa Diop</option>
                    <option name="id_medecin[]" value="4">Dr Anta Guéye</option>
                    <option name="id_medecin[]" value="5">Dr Chérif Aidara</option>
                    <option name="id_medecin[]" value="6">Dr Sokhna Diouf</option>
                    <option name="id_medecin[]" value="6">Dr Momo Diop</option>
                </select>
                </label></br></br></br></td><tr>
            
            
            <tr><td><input type="submit" name="ajouter" value="Ajouter"></td>
            <tr>
        </table>
	</form>