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
            if (isset($_POST['button_inscription'])) {

                //se connecter à la base de données
                include "connexion_bdd.php";
                //extraire les infos du formulaire
                extract($_POST);
                //verification si les champs sont vides
                if (isset($email) && isset($mdp1) && isset($mdp2)) {
                        //verification que les mots de passe sont conformes
                        if($mdp2 != $mdp1){
                        $error = "les Mots de passe sont différents !";
                        }else{

                            //si non, verification si l'email existe
                            $stmt = $con->prepare("SELECT * FROM utilisateurs WHERE email = '$email' ");
                            $stmt->execute();
                        if ($stmt->rowCount() == 0) {
                            //si ça n'existe pas, créons le compte
                            $stmt = $con->prepare("INSERT INTO utilisateurs VALUES (NULL, '$email' , '$mdp1') "); 
                            $stmt->execute();
                            if($stmt){
                                //si le compte a été crée, créons une variable pour afficher un message dans la page de connexion 
                                $_SESSION['message'] = "<p class='message'>Votre compte a été créer avec succés !</p>";
                            
                                //redirection vers la page de connexion
                                header("location:index.php");
                            }else{
                                
                            }
                        }else {
                            //si ça existe
                            $error = "Cet Email existe déjà !";
                        }
                        }

                }else{
                    $error = "Veuillez remplir tous les champs !";
                }
            }
            ?>
        <form action ="" method="POST" class="form_connexion_inscription" >
        <h1> INSCRIPTION </h1>
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
        <input type="password" name="mdp1" class="mdp1">
        <label> Confirmation Mots de passe </label>
        <input type="password" name="mdp2" class="mdp2">
        <input type="submit" value="Inscription" name="button_inscription">
        <p class="link"> Vous avez un compte ? <a href ="index.php"> Se connecter </a></p>

        </form>
        <!--Relier notre page a notre fichier js-->
        <script src="script.js"></script>
    </body>
</html>