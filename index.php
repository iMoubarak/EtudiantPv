<?php
session_start();
if(@$_SESSION['autorisation']!="oui")
{
    header('location:connexion.php');
    exit();
}
?>
    
    <!DOCTYPE HTML LANG="fr">
    <html>
        <head>
            <meta charset="utf-8">
            <title>Gestions des notes</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
                <?php require("nav.php");?>
                <div class="tableau_de_bord">
                    <div></div>
                    <div class="evenement"><span class="evenement_titre">Journal des évenement</span></div>
                    
                </div>
            <script src="index-script.js" async></script>
            
        </body>
    </html>