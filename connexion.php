<?php
session_start();
$msg = '';
$dangermat = '';
$dangerpass = '';
$db = new PDO("mysql:host=localhost;dbname=PVFAST",'root','913437',[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$dbpasses = $db->query('select * from Mot_de_passe');
foreach($dbpasses as $dbpass);
if(!empty($_POST['mat']) && !empty($_POST['passwd']))
{
    if($_POST['mat']==='60507' && $_POST['passwd']===$dbpass['Mot_de_passe'])
    {
            $_SESSION['autorisation'] = "oui";
            header("location:index.php");
            exit();
    }
    else
    {
        if($_POST['mat']!=='60507')
        {
            $msg = 'Numéro de matricule incorrect';
            $dangermat = 'red';
        }
        else
        {
            if($_POST['passwd']!==$dbpass['Mot_de_passe'])
            {
                $msg = 'Mot de passe incorrect';
                $dangerpass = 'red';
            }
        }
    }   
}
else
{
    $msg = 'Veuillez remplir ces champs';
}
require_once('auth.php');
if(est_connecter())
{
    header('location:index.php');
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
    <body class="connexion_body">
        <nav class="connexion_nav">
            <div class="logo"><a href="#" title="FAST Gestion de Note">FAST-<span>GN</span></a></div>
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
        <script src="script.js" async></script>
        <main><h3>Un site développé par les étudiants de l'Université Abdou Moumouni <br>afin de faciliter la gestion et le deploiement des notes des étudiants...</h3></main>
    </body>