<?php
    if (isset($_POST['modifier']))
    {
        $id_secretaire = htmlspecialchars(trim($_POST['id_secretaire']));
        $nom = htmlspecialchars(trim($_POST['nom']));
        $prenom = htmlspecialchars(trim($_POST['prenom']));
        $email = htmlspecialchars(trim($_POST['email']));
        $login = htmlspecialchars(trim($_POST['login']));
        $mopass = htmlspecialchars(trim(md5($_POST['mopass'])));
        $id_service = htmlspecialchars(trim($_POST['id_service']));
        $id_admin = htmlspecialchars(trim($_POST['id_admin']));
                
               /* header('location:0.php');*/
        if (preg_match("/^[a-zA-Z\S ]+$/", $nom))
        {
			if (preg_match("/^[a-zA-Z\S ]+$/", $prenom))
            {
                if (!empty($login) AND !empty($mopass))
                {

                    // appel de la classe Database pour se connecter à notre base de donnée
                    require 'pdo.php';
                    $db= new Database('hopital');
                    $req='REPLACE INTO `secretaire`(`id_secretaire`,`nom`, `prenom`, `email`, `login`, `mopass`, `id_service`, `id_admin`) VALUES (?,?,?,?,?,?,?,?)';
                    $inser=$db->getPDO()->prepare($req);
                    $inser->execute(array($id_secretaire,$nom,$prenom,$email,$login,$mopass,$id_service,$id_admin));
                    //$req='UPDATE `secretaire` SET `nom`='.$nom.',`prenom`='.$prenom.',`email`='.$email.',`login`='.$login.',`mopass`='.$mopass.',`id_service`='.$id_service.',`id_admin`='.$id_admin.' WHERE `id_secretaire`= '.$id_secretaire.'';
                   // $inser=$db->getPDO()->query($req);
                    
                   // $inser->execute(array($id_secretaire,$nom,$prenom,$email,$login,$mopass,$id_service,$id_admin));
                    
                }
                else
                {
                    echo "veuillez remplir tous les champs!";
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
	<title>Ajout Medecin</title>
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>
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
            
    </div></br>
	<a href="admin.php">Retour</a>
	
	<h1>Nabil Choucair</h1>
	<h2>Modifier une Secrétaire</h2>
    
	<form method="post" action="">
        <table>
            <tr><td><label for="id_secretaire">ID<input type="ID" name="id_secretaire" d></label></br></br></br></td></tr>
            <tr><td><label for="nom">Nom<input type="Text" name="nom"></label></br></br></br></td></tr>
            
            <tr><td><label for="prenom">Prénom<input type="Text" name="prenom"></label></br></br></br></td></tr>
        
            
            <tr><td><label for="email">Email<input type="email" name="email"></label></br></br></br></td></tr>
            
            <tr><td><label for="login">Login<input type="text" name="login"></label></br></br></br></td></tr>
            
            <tr><td><label for="mopass">Mot de passe<input type="password" name="mopass" ></label></br></br></br></td><tr>
            <tr><td><label for="id_service">Service
                <select name="id_service" id="id_service">
                    <option name="id_service[]" value="1">Cardiologie</option>
                    <option name="id_service[]" value="2">Gastroentérologie</option>
                    <option name="id_service[]" value="3">dermatologie</option>
                    <option name="id_service[]" value="4">Neurologie</option>
                    <option name="id_service[]" value="5">Allergologie</option>
                    <option name="id_service[]" value="6">Sexlogie</option>
                </select>
                </label></br></br></br></td><tr>
            <tr><td><label for="id_admin[]">Administrateur
            <select name="id_admin" id="id_admin">
                <option name="id_admin[]" value="1">Admin123</option>
            </select></label></br></br></br></td><tr>
            
            <tr><td><input type="submit" name="modifier" value="Modifier"></td><tr>
        </table>
	</form>


</body>
</html>