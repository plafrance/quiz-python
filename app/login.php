<?php

require_once('modele.php');
session_start();

if(isset($_SESSION["user_id"])){
    header('Location: index.php?p=accueil');
}
else{
    
    if(isset($_POST["submit"])){
        if(empty($_POST["username"]) || empty($_POST["passwd"])){
            $erreur="Le nom d'utilisateur ou le mot de passe ne peuvent être vides.";
        }
        else
        {
            $username=$_POST["username"];
            $password=$_POST["passwd"];
            
            #            $ldap = ldap_connect("localhost") or die("Impossible de se connecter au serveur d'authentification. Veuillez contacter l'administrateur");
            #            ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);   
            #            $bind = @ldap_bind($ldap, "cn=$username,dc=local", "$password");
            #            if($bind) {

            #Connexion à la BD
            $user_info=new User();
            if($user_info->load_info($username, $password)){
            #Obtient les infos de l'utilisateur
            $_SESSION["user_id"]=$user_info->id;
            $_SESSION["username"]=$user_info->username;
            $_SESSION["active"]=$user_info->actif;
            if(!isset($_GET["p"]))
                header("Location: index.php?p=accueil");
            else
                header("Location: index.php?p=$_GET[p]&ID=$_GET[ID]");    

        }
            else {
            $erreur="Nom d'utilisateur ou mot de passe invalide.";
        }
        }
        }
            if($erreur){
            echo $erreur;
        }
            echo '
	  <html>
        <head>
              <meta charset="utf-8">
	      <link rel="stylesheet" type="text/css" href="css/style.css">
	    </head>
	    <body>
          <section class="main">
		   <div class="example-wrapper clearfix">
         <form name="login" method="POST">
             <table style="margin-left:auto;margin-right:auto;">
             <tr>
             <td>Nom d\'utilisateur</td><td><input name="username" type="text"></td>
             </tr><tr>
             <td>Mot de passe</td><td><input name="passwd" type="password"></td>
             <tr><td></td><td><a href="inscription.php">s\'inscrire</a></td></tr>
             </tr><tr>
             <td></td><td><input name="submit" type="submit" value="Connexion"></td>
             </tr>
         </form>
               </div>
             </section>
    	    </body>
	    </html>
        ';
        }
