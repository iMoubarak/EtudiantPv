<?php?>
<!DOCTYPE HTML LANG="fr">
    <html>
        <head>
            <meta charset="utf-8">
            <title>Reglage</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
                <?php require("nav.php");?>
                <div class="div_reglage">
                    <div><h3 style="margin-left:5%;color:rgba(144, 193, 250, 0.239);">Réglage</h3></div>
                    <div class="div_reglage_option">
                        <div class="div_reglage_option_button">
                            <div class="div_icon_reglage_button">
                                <button type="button" class="reglage_option_button">
                                    <ion-icon name="person-add-outline" class="icon_reglage_button"></ion-icon>
                                </button>
                            </div>
                            <div class="div_titre_reglage_button"><span class="titre_reglage_option_button">Ajouter un étudiant</span></div>
                        </div>
                        <div class="div_reglage_option_button">
                            <div class="div_icon_reglage_button">
                                <button type="button" class="reglage_option_button">
                                    <ion-icon name="add-outline" class="icon_reglage_button"></ion-icon>
                                </button>
                            </div>
                            <div class="div_titre_reglage_button"><span class="titre_reglage_option_button">Ajouter un agent</span></div>
                        </div>
                        <div class="div_reglage_option_button">
                            <div class="div_icon_reglage_button">
                                <button type="button" class="reglage_option_button">
                                    <ion-icon name="open-outline" class="icon_reglage_button"></ion-icon>
                                </button>
                            </div>
                            <div class="div_titre_reglage_button"><span class="titre_reglage_option_button">Ouverture de la saisie d'une période</span></div>
                        </div>
                        <div class="div_reglage_option_button">
                            <div class="div_icon_reglage_button">
                                <button type="button" class="reglage_option_button">
                                    <ion-icon name="document-lock-outline" class="icon_reglage_button"></ion-icon>
                                </button>
                            </div>
                            <div class="div_titre_reglage_button"><span class="titre_reglage_option_button"> Fermer la saisie d'une période</span></div>
                        </div>
                        <div class="div_reglage_option_button">
                            <div class="div_icon_reglage_button">
                                <button type="button" class="reglage_option_button">
                                    <ion-icon name="lock-closed-outline" class="icon_reglage_button"></ion-icon>
                                </button>
                            </div>
                            <div class="div_titre_reglage_button"><span class="titre_reglage_option_button"> Changer le mot de passe</span></div>
                        </div>
                    </div>
                </div>
            <script src="index-script.js" async></script>
            
            
            
            
            
        </body>
    </html>