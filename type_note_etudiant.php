<?php
session_start();
if(@$_SESSION['autorisation']!="oui")
{
    header('location:connexion.php');
    exit();
}
    $tab = [
        'ordre' => [],
        'nomp' => [],
        'matricule' => [],
        'note_champ' => []
    ];
    $count=0;
    for($i=0;$i<100;$i++)
    {
        $tab['ordre'][] = $i+1;
        $tab['nomp'][] = 'Illa Yacouba Moubarak';
        $tab['matricule'][] = 60507;
        $tab['note_champ'][] = "<input type=\"text\" name=\"note[]\" class=\"case_saisi_note\" placeholder=\"/20\">";
        $count++;
    }
?>
<!DOCTYPE HTML LANG="fr">
<html>
    <head>
        <meta charset="utf-8">
        <title>Notes Etudiants</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
            <?php require("nav.php");?>
            <div class="partie_tableau">
                <div class="choix_niveau">
                    <?php require("choix_de_donnee.php");?>
                    <?php require("envoie_et_recherche.php");?>
                </div>
                <div class="tableau">
                    <form method="get" name="form_tableau" class="tform">
                        <div class="form_table">
                            <table class="table table-striped" cellspacing="0px">

                                <thead>
                                    <tr class="titre_tableau">
                                        <td>Ordre</td>
                                        <td>Nom & Prenom</td>
                                        <td>Matricule</td>
                                        <td>Notes</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php remplir_tableau($tab);?>                         
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <button type="submit" class="btn_executer">Terminer</button>
                            <button type="submit" class="btn_executer">Incomplet</button>
                            <button type="submit" class="btn_executer">Executer la validation</button>
                        </div>
                    </form>
                </div>
            </div>
        <script src="index-script.js" async></script>
    </body>
</html>