<?php 

require 'donne_debut.php';
$con = connexion();
session_start();

if( isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $password ='1234';
    echo "bien connecte";
    //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien) 
    
    if(analyse_connection($con, $password, $email)==1){

         
           header("Location:compte_client.php");
          exit();     

        }
        else if(analyse_connection($con, $password, $email)==2){

                  
           header("Location:compte_coach.php");            

        }
        else if(analyse_connection($con, $password, $email)==3){
          
                  
           header("Location:compte_administrateur.php");            

        }
        else{
            echo("email ou mot de passe non valide, Réessayer");   

        }
   
   }
else{
    
     header("Location: login.php");

}
?>