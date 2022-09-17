<?php
session_start();
@$mat=$_POST["mat"];
@$passwd=$_POST["passwd"];
@$connexion=$_POST["connexion"];
$matdanger='';
$passdanger='';
$msg='';
if(isset($connexion))
{
    if(!isset($mat))
    {
        $msg = "Champ obligatoire";
        $matdanger="red";
    }
    if(!isset($passwd))
    {
        $msg = "Champ obligatoire";
        $passdanger="red";
    }
    else
    {
        if($mat==="60507" && $passwd==="Azerty")
        {
            $_SESSION['autorisation'] = "oui";
            $danger='';
            $msg='';
            header("location:index.php");
        }
        if($mat!=="60507")
        {
            $msg="Ce numéro de matricule n'existe pas";
            $matdanger='red';
        }
        if($passwd!=="Azerty")
        {
            $msg="Mot de passe incorrect";
            $passdanger='red';
        }
    }
    
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
                    <input type="number" name="mat" placeholder="matricule de l'agent ?" aria-autocomplete="false" style="border: 1px solid <?=$matdanger?>;" >
                    <input type="password" name="passwd" placeholder="mot de passe ?" autocomplete="false" style="border: 1px solid <?=$passdanger?>;">
                    <input type="submit" name="connexion" value="Connexion">
                </form>
            </div>
        </div>
        <script src="script.js" async></script>
        <main><p>Un site développé par les étudiants de l'Université Abdou Moumouni <br>afin de faciliter la gestion et le deploiement des notes des étudiants...</p></main>
    </body>