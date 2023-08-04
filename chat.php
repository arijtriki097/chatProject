<?php
session_start();
if(!isset($_SESSION['user'])){
    //si user n'est pas connecter
    //redirection vers page de connexion
    header("location:index.php");
}
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $user ?> | CHAT</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>
<body>
    <div class="chat">
        <div class="button-email">
            <span> <?= $user ?> </span>
            <a href="deconnexion.php" class="Deconnexion_btn"> Déconnexion </a>

        </div> 
        <!-- messages -->
        <div class="message_box"> Chargement...</div>
<!-- fin messages -->
<?php
//envoi des messages
if(isset($_POST['send'])){
    //recuperons les messages
    $message = $_POST['message'];
    echo $message;
    //connexion a la base de donnees
    include("connexion_bdd.php");
    //verifiction si le champs n'est pas vide
    if(isset($message) && $message != ""){
        //inserer le message dans la base de donnees
        $stmt = $con->prepare("INSERT INTO messages VALUES (NULL, '$user' , '$message',NOW()) "); 
                            $stmt->execute();
        //on actualise la page
        header("location:chat.php");

    }else{
        //si le message est vide on actualise la page
        header("location:chat.php");
    }

}
?>
        <form action="" class="send_message" method="POST">
            <textarea name="message" cols="30" rows="2" placeholder="votre message"></textarea>
            <input type="submit" value="Envoyer" name="send">

        </form>
    </div>
<script> 
//on actualise automatiquement le chat en utilisant AJAX
var message_box = document.querySelector('.message_box');
setInterval(function(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            message_box.innerHTML = this.responseText
        }
    };
    xhttp.open("GET","messages.php", true); //recuperation de la page messages
    xhttp.send()
},500) //actualiser le chat tous le 500 ms
</script>
</body>
</html>