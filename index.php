<?php
session_start();
require_once('auth.php');
forcer_connection();
$db = new PDO("mysql:host=localhost;dbname=PVFAST",'root','913437',[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$dbElement = $db->query('select * from Evenement order by id desc limit 4');
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
                    <div>
                        <div class="evenement">
                            <div class="evenement_titre"><span class="">Evenement</span><br></div>
                            <div class="evenement_msg">
                                <ul>
                                    <?php foreach($dbElement as $row):?>
                                        <li>
                                            <span title="<?=$row['msg']?>"><?=$row['titre']?></span>
                                        </li><br>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            <script src="index-script.js" async></script>
            
        </body>
    </html>