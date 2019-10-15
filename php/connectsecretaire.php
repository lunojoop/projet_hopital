<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Nabil Choucair</title>
	<link rel="stylesheet" type="text/css" href="connectsec.css">
</head>
<body>
	<!-- <nav class="navbar">
		<ul class="aligne">
			<li><a href="hopital.php">Nabil Choucair</a></li>
			<li class="decale"><a href="hopital.php">ACCUEIL</a></li>
			<li class="decale"><a href="rendez-vous.php">Prendre un rendez-vous</a></li>
			<li class="decale"><a href="inscrire.php">S'inscrire</a></li>
			<li class="decale"><a href="connecter.php">Se connecter</a></li>
		</ul>
	</nav> -->
	<h1>Espace Secrétaire</h1>
	<p>La plateforme Nabil houcair est une plateforme qui permet la gestion de la prise de rendez vous d'un hopital</p>
	<div id="container">
            <!-- zone de connexion -->
            
            <form action="verifsecre.php" method="POST">
                <h1>Connexion</h1>
                
                <?php
                require 'formulaire.php';
                
                $form= new Form($_POST);
                echo $form->label('username');
                echo $form->input('username');
                echo $form->label('password');
                echo $form->input_mopass('password');
                echo $form->submit();
                
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
            </form>
        </div>
</body>
</html>