<?php
session_start();
$msg = '';
$dangermat = '';
$dangerpass = '';
$test = false;
$password = '$2y$10$D98Me4/fKKvp/.XVsUAuluSAN8rr.CxdGMxlb1WE2zcQVu7/4jt5K';
$db = new PDO("mysql:host=localhost;dbname=PVFAST",'root','913437',[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$dbmat = $db->query("select * from Agents");
foreach($dbmat as $mat)
{
    if($mat['IdAgent']==$_POST['mat'])
    {
        $test = true;
        break;
    }
}
if(!empty($_POST['mat']) && !empty($_POST['passwd']))
{
    if($test===true && password_verify($_POST['passwd'],$password)===true)
    {
            $_SESSION['autorisation'] = "oui";
            header("location:../index.php");
            exit();
    }
    else
    {
        if($test!==true && password_verify($_POST['passwd'],$password)===false)
        {
            $msg = 'Numéro de matricule et mot de passe incorrect';
            $dangermat = 'red';
            $dangerpass = 'red';
        }
        else
        {
            if(!password_verify($_POST['passwd'],$password))
            {
                $msg = 'Mot de passe incorrect';
                $dangerpass = 'red';
            }
            else
            {
                if($test!==true)
                {
                    $msg = 'Numéro de matricule incorrect';
                    $dangermat = 'red';
                }
                else
                {
                    $msg = '';
                    $dangermat = '';
                    $dangerpass = '';
                }
            }
        }
    }   
}
else
{
    $msg = 'Veuillez remplir ces champs';
}
require_once('../Fonction/auth.php');
if(est_connecter())
{
    header('location:../index.php');
    exit();
}
?>
<!DOCTYPE HTML LANG="fr">
<html>
    <head>
        <?php require("../En-tete/head.php");?>
        <title>Gestions des notes</title>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </head>
    <body class="connexion_body">
        <nav>
            <div class="logo"><a href="#" title="FAST Gestion de Note">FAST-<span>GN</span></a></div>
            <div class="navigation">
                <div>
                    <button type="submit" class="mode_btn" onclick="switcher()"><ion-icon name="contrast-outline"></ion-icon></button>
                </div>
            </div>
        </nav>
        <div class="connexion_div">
            <div class="txt"><h2>Veuillez entrer vos information de <span>connexion !</span></h2></div>
            <div class="formulaire">
                <div class="connexionErreur" style="display:block;"><?=$msg?></div>
                <form method="post" action=""name="ConnexionForm">
                    <input type="number" name="mat" placeholder="matricule de l'agent ?" aria-autocomplete="false"  style="border:1px solid <?=$dangermat?>;">
                    <input type="password" name="passwd" placeholder="mot de passe ?" autocomplete="false" style="border:1px solid <?=$dangerpass?>;">
                    <button type="submit" name="connexion"  class="connexion_button">Connexion</button>
                </form>
            </div>
        </div>
        <script src="../Script/script.js" async></script>
        <main><h3>Un site développé par les étudiants de l'Université Abdou Moumouni <br>afin de faciliter la gestion et le deploiement des notes des étudiants...</h3></main>
    </body>