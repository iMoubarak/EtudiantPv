<?php
function est_connecter():bool 
{
    return(($_SESSION['autorisation'])=='oui');
}
function forcer_connection():void
{
    if(!est_connecter())
    {
        header('location:connexion.php');
        exit();
    }
}
?>