<?php 


require 'donne_debut.php';


$con = connexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(analyse_connection($con, $password, $email)==-1){

        ajout_nouveau($con, $password, $email);
        if(ajout_nouveau($con, $password, $email)==TRUE){
            echo "good";
            header('login.php');
        }
        else{

            echo "pbbbb";
        }


        //
     
    }

    else{
       
        echo "réessayez, identifiants déjà existant";
        // header('Location:signup.php');
    }
    //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien) 
       
       }
       else{
        echo "pbbbb";
       }
?>