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
                    <div>
                    <form method="POST">
                            <button type="submit" style="background: none;border:none;" name="valider">
                                <ion-icon name="caret-forward-outline" title="valider"></ion-icon>
                            </button>
                            <button type="button" class="button_choix">
                                <span class="span_choix">Section : </span>
                                <select name="section"  class="select_choix">
                                    <option value="1">MI</option>
                                    <option value="2">MPC</option>
                                    <option value="3">BGE</option>
                                </select>
                            </button>
                            <button type="button" class="button_choix">
                                <span class="span_choix">Période</span>
                                <select name="periode" class="select_choix">
                                    <option value="1">2021-2022</option>
                                </select>
                            </button>
                        </form>  
                    </div>
                    <div class="graphe">
                        <div>
                        <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            <script src="index-script.js" async></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="graphe.js"></script>
        </body>
    </html>