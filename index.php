<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Connexion | Chat</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
        if(isset($_POST['button_con'])){
            //se connecter à la base de données
            include "connexion_bdd.php";
            //extraire les infos du formulaire
            extract($_POST);
            //verification si les champs sont vides
            if(isset($email) && isset($mdp1)){
                //verifications si les identifiants sont justes
                $stmt = $con->prepare("SELECT * FROM utilisateurs WHERE email = '$email' AND mdp1 = '$mdp1' ");
                $stmt->execute(); 
               if ($stmt->rowCount() > 0) {
                //creattion d'une session qui contient l'email
                    $_SESSION['user'] = $email;

                    //redirection vers la page chat
                    header("Location:chat.php");
                    //detruire la variable du message d'inscription
                    unset($_SESSION['message']);
                }else{
                    $error = "Email ou Mots de passe incorrecte(s) !";
                }
            }else{
                //si les champs sont vides
                $error = "Veuillez remplir tous les champs !";
            }
        }
        ?>
        <form action ="" method="POST" class="form_connexion_inscription">
        <h1> CONNEXION </h1>
        <?php 
        //affichage message de creation d'un compte avec succès
        if(isset($_SESSION['message'])){
            echo $_SESSION['message'];
        }
        ?>
        <p class="message_error">
            <?php 
            //affichons l'erreur
            if(isset($error)){
                echo $error;
            }
            ?>
            
        </p>
        <label> Adresse Mail </label>
        <input type="email" name="email">
        <label> Mots de passe </label>
        <input type="password" name="mdp1">
        <input type="submit" value="Connexion" name="button_con">
        <p class="link"> Vous n'avez pas de compte ? <a href ="inscription.php"> Créer un compte </a></p>

        </form>

        
    </body>
</html>