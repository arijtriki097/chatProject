//confirmation du mot de passe
//verifier si le password et confirmation sont conformes
var mdp1 = document.querySelector('.mdp1');
var mdp2 = document.querySelector('.mdp2');
mdp2.onkeyup = function(){
    //evenement lorsq'on ecrit dans le champ : confirmation du mot de passe 
    message_error = document.querySelector('.message_error');
    if(mdp1.value != mdp2.value){
        message_error.innerText = "Les Mots de passes ne sont pas conformes";
    }else{
        // on ecrit rien
        message_error.innerText= "";
    }
}