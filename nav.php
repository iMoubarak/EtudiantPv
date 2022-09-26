<?php
if(session_status() === PHP_SESSION_NONE)
session_start();
require_once('auth.php');
forcer_connection();
require('fonction.php');
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <nav>
            <div class="logo"><a href="#" title="FAST Gestion de Note">FAST-<span>GN</span></a></div>
            <div></div>
        </nav>
        <div class="parent">
            <div class="partie_choix_faculte">  
                <div class="choix_div">
                    <ul class="menu">
                    <li><a href="index.php" class="button_rapport">
                    <ion-icon name="home-outline"></ion-icon>
                            <span class="button_menu_titre">Acceuil</span>
                            </a></li>
                        <li><button type="button" class="button_menuType">
                            <ion-icon name="file-tray-stacked-outline"></ion-icon>
                            <span class="button_menu_titre" title="Type de donnée">T-Donnée</span>
                            <ion-icon name="caret-down-outline" class="caret_bas_typedonnee" ></ion-icon>
                            <ion-icon name="caret-forward-outline" class="button_menu_fermer"></ion-icon>
                            </button>
                            <ul class="typedonnee_menu">
                                <li><a href="type_note_etudiant.php" title="Saisie des notes des étudiants">Note Etudiant</a></li>
                            </ul>
                        </li>
                        <li><a href="rapport.php" class="button_rapport">
                            <ion-icon name="analytics-outline"></ion-icon>
                            <span class="button_menu_titre">Rapport</span>
                            </a></li>
                        <li><a href="reglage.php" class="button_reglage">
                            <ion-icon name="settings-outline"></ion-icon>
                            <span class="button_menu_titre">Reglage</span>
                        </a></li>
                    </ul>
                </div>
                <div class="log_out">
                    <a type="button" class="button_log_out" href="deconnexion.php" style="text-decoration:none;">
                        <ion-icon name="exit-outline"></ion-icon>
                        <span class="button_log_out_titre">Se deconnecter</span>
                    </a>
                </div>
            </div>
        