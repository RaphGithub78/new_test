<?php

//suppresion possible d'un client ou d'un coach:

require 'donne_debut.php';

session_start();

$con = connexion();
if( isset($_SESSION['email'])){
    $email = $_SESSION['email'];
   $password ='1234';
    echo "bien connecte";
    //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien) 
    
    if(analyse_connection($con, $password, $email)==1){
        header("Location:droit_client.php");     

          exit();     

        }
        else if(analyse_connection($con, $password, $email)==2){

                  
           header("Location:droit_coach.php");            

        }
        else if(analyse_connection($con, $password, $email)==3){
                   
            header("Location:droit_administrateur.php");     
        }
        else{
            echo("email ou mot de passe non valide, Réessayer");   

        }
   
   }
else{
    
     header("Location: login.php");

}
?>

?>




