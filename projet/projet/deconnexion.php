<?php

require ("donne_debut.php");
    
        /*connecter à BD
         * exécuter la session
         * enlever tous les infos dans la session
         * déconnecter à BD
         */
    $con = connexion();
    session_start();
    session_destroy();
    //mysqli_close($con);
    header("Location:services.html");

?>