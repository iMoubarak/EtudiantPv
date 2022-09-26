<?php
session_start();
require('auth.php');
forcer_connection();
?>
    
    <!DOCTYPE HTML LANG="fr">
    <html>
        <head>
            <meta charset="utf-8">
            <title>Rapport</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
                <?php require("nav.php");?>
                <div class="tableau_rapport">
                    <div class="graphe">
                        <div>
                        <canvas id="myChart"></canvas>
                        </div>
                    </div>
                    <div></div>
                    
                </div>
            <script src="index-script.js" async></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="graphe.js"></script>
        </body>
    </html>