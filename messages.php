<?php
session_start();
if(isset($_SESSION['user'])){
    //si l'utilisateur s'est connecté
    //connexion à la base de donnée
    include "connexion_bdd.php";
    //requete pour afficher les messages
    $stmt = $con->prepare("SELECT * FROM messages ORDER BY id_m DESC ");
    $stmt->execute();
    if ($stmt->rowCount() == 0){
        //s'il n'y a pas encore de messages
        echo "Messagerie vide";
    }else{
        //si oui
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            //si c'est été vous qui envoye le message on utilise ce format:
            if($row['email'] == $_SESSION['user']){
                ?>
                
                <div class="message your_message">
                <span> Vous </span>
                <p><?=  $row['msg']?></p>
                <p class="date"><?= $row['date']?> </p>
            </div>

                <?php
            }else{
                //si vous n'etes pas l'auteur du message, on affiche ce message sur ce format :
                    ?>
                    <div class="message others_message">
                        <span> <?= $row['email']?></span>
                        <p> <?= $row['msg']?> </p>
                        <p class="date"><?= $row['date']?> </p>
                    </div>


                    <?php


            }
        }
    }
}
?>

            