<?php
session_start();
if(@$_SESSION['autorisation']!="oui")
{
    header('location:connexion.php');
    exit();
}
$user = 'root';
$pass = '913437';
$nomE = $_POST['nom_etudiant'];
$Prenom = $_POST['prenom_etudiant'];
$matE = $_POST['mat_etudiant'];
$date_naissance = $_POST['date_naissance'];
$lieu_naissance = $_POST['lieu_naissance'];
$niveau = $_POST['select_niveau'];
$promo = $_POST['promo_etudiant']; 
$db = new PDO("mysql:host=localhost;dbname=PVFAST",$user,$pass,[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    /*$statement = $db->prepare(($query));
    $statement->execute($params);
    $dbElement = $statement->fetchAll();*/
?>
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
                                    <a class="icon_reglage_button" href="#add_etudiant" style="text-decoration:none;color:rgb(17, 17, 24) ;"><ion-icon name="person-add-outline"></ion-icon></a>
                                </button>
                            </div>
                            <div class="div_titre_reglage_button"><span class="titre_reglage_option_button">Ajouter un étudiant</span></div>
                        </div>


                        
                        <div class="div_reglage_option_button">
                            <div class="div_icon_reglage_button">
                                <button type="button" class="reglage_option_button">
                                    <a href="#add_agent" class="icon_reglage_button" style="text-decoration:none;color:rgb(17, 17, 24) ;"><ion-icon name="add-outline" ></ion-icon></a>
                                </button>
                            </div>
                            <div class="div_titre_reglage_button"><span class="titre_reglage_option_button">Ajouter un agent</span></div>
                        </div>




                        <div class="div_reglage_option_button">
                            <div class="div_icon_reglage_button">
                                <button type="button" class="reglage_option_button">
                                <a href="#ouvrir_periode" class="icon_reglage_button" style="text-decoration:none;color:rgb(17, 17, 24) ;"><ion-icon name="open-outline"></ion-icon></a>
                                </button>
                            </div>
                            <div class="div_titre_reglage_button"><span class="titre_reglage_option_button">Ouverture de la saisie d'une période</span></div>
                            
                        </div>




                        <div class="div_reglage_option_button">
                            <div class="div_icon_reglage_button">
                                <button type="button" class="reglage_option_button">
                                <a href="#fermer_periode" class="icon_reglage_button" style="text-decoration:none;color:rgb(17, 17, 24) ;"><ion-icon name="document-lock-outline"></ion-icon></a>
                                </button>
                            </div>
                            <div class="div_titre_reglage_button"><span class="titre_reglage_option_button"> Fermer la saisie d'une période</span></div>
                        </div>



                        <div class="div_reglage_option_button">
                            <div class="div_icon_reglage_button">
                                <button type="button" class="reglage_option_button">
                                    <a href="#changer_password" class="icon_reglage_button" style="text-decoration:none;color:rgb(17, 17, 24) ;"><ion-icon name="lock-closed-outline"></ion-icon></a>
                                </button>
                            </div>
                            <div class="div_titre_reglage_button"><span class="titre_reglage_option_button"> Changer le mot de passe</span></div>
                        </div>


                    </div>
                </div>
            <script src="index-script.js" async></script>
            <!--ajouter etudiant--> 
            <div id="add_etudiant" class="fenetre">
                <div  class="fenetre_content">
                    <fieldset class="field_set">
                    <form method="post" action="">
                    <h2 class="field_title">Ajouter Etudiant!</h2>
                        <table style="color:rgba(144, 193, 250, 0.517);">
                            <tr><td>Nom</td><td><input type="txt" name="nom_etudiant"  class="i_put"></td></tr>
                            <tr><td>Prenom</td><td><input type="txt" name="prenom_etudiant"  class="i_put"></td></tr>
                            <tr><td>Matricule</td><td><input type="number" name="mat_etudiant"  class="i_put"></td></tr>
                            <tr><td>Promotion</td><td><input type="number" name="promo_etudiant"  class="i_put"></td></tr>
                            <tr><td>Date de naissance</td><td><input type="date" name="date_naissance" class="i_put"></td></tr>
                            <tr><td>Lieu de naissance</td><td><input type="txt" name="lieu_naissance" class="i_put"></td></tr>
                            <tr>
                                <td>Niveau:</td>
                                <td><select class="i_put" name="select_niveau">
                                        <option value="1">Licence 1</option>
                                        <option value="2">Licence 2</option>
                                        <option value="3">Licence 3</option>
                                        </select>
                                </td>
                            </tr>
                            
                        </table>
                        <input type="submit" name="ajoutE" value="Ajouter" class="sub">
                    </form>
                </fieldset>
                <a href="#" class="fenetre_close">&times;</a>
                <?php if(isset($_POST['ajoutE'])):?>
        
                    <?php  if(!empty($_POST['nom_etudiant']) && !empty($_POST['prenom_etudiant']) && !empty($_POST['mat_etudiant']) && !empty($_POST['promo_etudiant']) && !empty($_POST['date_naissance']) && !empty($_POST['lieu_naissance']) && !empty($_POST['select_niveau'])) : ?>
                        <br><div class="alert alert-success" style="text-align: center;">Ajouter avec succès</div>
                    <?php else :?>
                        <br><div class="alert alert-danger" style="text-align: center;">Remplissez toutes les cases</div>
                    <?php endif;?>
                <?php endif; ?>
            </div>

            <!---->

            <!--Ajouter agent-->
            <div id="add_agent" class="fenetre">
                <div  class="fenetre_content">
                    <fieldset class="field_set">
                    <form method="post" action="">
                    <h2 class="field_title">Ajouter Agent!</h2>
                        <table style="color:rgba(144, 193, 250, 0.517);">
                            <tr><td>Nom</td><td><input type="txt" name="nom_agent"  class="i_put"></td></tr>
                            <tr><td>Matricule</td><td><input type="number" name="mat_agent"  class="i_put"></td></tr>
                        </table>
                        <input type="submit" name="ajoutA" value="Ajouter" class="sub">
                    </form>
                </fieldset>
                

                <a href="#" class="fenetre_close">&times;</a>
            </div>
            <!---->
            
            
            
            
        </body>
    </html>