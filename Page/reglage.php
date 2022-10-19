<?php
session_start();
require('../Fonction/auth.php');
forcer_connection();
$user = 'root';
$pass = '913437';
$db = new PDO("mysql:host=localhost;dbname=PVFAST",$user,$pass,[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$AdminPassTest=false;
$msg='';
$alert = '';
$alertmsg='';
    if(!empty($_POST['PassAdmin']))
    {
        if($_POST['PassAdmin']=='913437')
            $AdminPassTest=true;
        else
            $msg='Incorrect';
    }
    else
        $msg = 'Veuillez remplir ce champ';

    /*$statement = $db->prepare(($query));
    $statement->execute($params);
    $dbElement = $statement->fetchAll();*/
?>
<!DOCTYPE HTML LANG="fr">
    <html>
        <head>
            <?php require("../En-tete/head.php");?>
            <title>Reglage</title>
        </head>
        <body>
            <?php require("../En-tete/nav.php");?>
                <div class="div_reglage">
                        <?php if($AdminPassTest===false) :?>
                            <?php $AdminPassTest=false;?>
                            <div  class="fenetre1">
                                <div  class="fenetre_content">
                                        <fieldset class="field_set">
                                        <form method="post" action="">
                                        <h2 class="field_title">Mot de passe de l'administrateur réquis !
                                            <br><br><span style="text-align:center;color:rgba(255, 0, 0, 0.37);font-size:16px;"><?=$msg?></span>
                                        </h2><br>
                                            <table style="color:rgba(144, 193, 250, 0.517);">
                                                <tr><td>Mot de passe</td><td><input type="password" name="PassAdmin"  class="i_put"></td></tr>
                                            </table>
                                            <input type="submit" name="AdminConnect" value="Valider" class="sub">
                                        </form>
                                        </fieldset>
                                </div>
                            </div>
                        <?php else : ?>
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
                                        <div class="div_titre_reglage_button"><span class="titre_reglage_option_button">Ouverture de saisie d'une période</span></div>
                                        
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
                            <?php endif;?>
                </div>
                        <script src="../Script/index-script.js" async></script>
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
                                        <tr><td>Date et lieu de naissance </td><td><input type="txt" name="date_naissance" class="i_put"></td></tr>
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
                                    <?php if(isset($_POST['ajoutE'])):?>
                                        <?php  if(!empty($_POST['nom_etudiant']) && !empty($_POST['prenom_etudiant']) && !empty($_POST['mat_etudiant']) && !empty($_POST['promo_etudiant']) && !empty($_POST['date_naissance']) && !empty($_POST['select_niveau'])) : ?>
                                            <?php require_once("../Fonction/fonction.php");?>
                                            <?=remplir_form_etudiant($_POST,$db)?>
                                        <?php endif;?>
                                    <?php endif; ?>
                                </fieldset>
                            </div>
                            <a href="#" class="fenetre_close">&times;</a>
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
                                        <tr><td>Prénom</td><td><input type="txt" name="prenom_agent"  class="i_put"></td></tr>
                                        <tr><td>Matricule</td><td><input type="number" name="mat_agent"  class="i_put"></td></tr>
                                    </table>
                                    <input type="submit" name="ajoutA" value="Ajouter" class="sub">
                                </form>
                                <?php if(isset($_POST['ajoutA'])):?>
                                    <?php  if(!empty($_POST['nom_agent']) && !empty($_POST['prenom_agent']) && !empty($_POST['mat_agent'])) : ?>
                                        <?php require_once("../Fonction/fonction.php");?>
                                        <?=remplir_form_agent($_POST,$db)?>
                                    <?php endif;?>
                                <?php endif; ?>
                                </fieldset>
                            </div>
                            <a href="#" class="fenetre_close">&times;</a>  
                        </div>
                        <!---->

                        <!--Changer mot de passe-->
                        <div id="changer_password" class="fenetre">
                            <div  class="fenetre_content">
                                <fieldset class="field_set">
                                <form method="post" action="">
                                <h2 class="field_title">Changer le mot de passe !</h2>
                                    <table style="color:rgba(144, 193, 250, 0.517);">
                                        <tr><td>Ancient mot de passe</td><td><input type="password" name="old_pass"  class="i_put"></td></tr>
                                        <tr><td>Nouveau mot de passe</td><td><input type="password" name="new_pass"  class="i_put"></td></tr>
                                        <tr><td>Confirmez</td><td><input type="password" name="verify_pass"  class="i_put"></td></tr>
                                    </table>
                                    <input type="submit" name="ChangeMot" value="Changer" class="sub">
                                </form>
                                <?php if(isset($_POST['ChangeMot'])):?>
                                    <?php  if(!empty($_POST['new_pass']) && !empty($_POST['old_pass']) && !empty($_POST['verify_pass'])) : ?>
                                        <?php require_once("../Fonction/fonction.php");?>
                                        <?=remplir_form_mot_de_passe($_POST,$db)?>
                                    <?php endif;?>
                                <?php endif; ?>
                                </fieldset>
                            </div>
                            <a href="#" class="fenetre_close">&times;</a>
                        
                        </div>
                        <!---->
            
        </body>
    </html>