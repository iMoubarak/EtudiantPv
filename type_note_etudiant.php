<?php
session_start();
if(@$_SESSION['autorisation']!="oui")
{
    header('location:connexion.php');
    exit();
}
    $user = 'root';
    $pass = '913437';
    $query = "select * from Etudiants";
    $dbElement = null;
    $params = [];
    $db = new PDO("mysql:host=localhost;dbname=PVFAST",$user,$pass,[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    if(!empty($_GET['search_input']))
    {
        $query = "select * from Etudiants where MatriculeE like :MatriculeE";
        $params['MatriculeE'] = '%' . $_GET['search_input'] . '%';
    }
    $statement = $db->prepare(($query));
    $statement->execute($params);
    $dbElement = $statement->fetchAll();
    
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
                <div class="niveau">
                            <ul class="niv_ul">
                                <li>
                                    <button type="button" class="button_menu1">
                                        <span class="button_menu_titre">Section</span>
                                        <ion-icon name="caret-down-outline" class="caret_bas_section"></ion-icon>
                                        <ion-icon name="caret-forward-outline" class="button_menu_fermer_section"></ion-icon>
                                    </button>
                                    <ul class="sect">
                                        <li><a href="#">MI</a></li> 
                                    </ul>
                                </li>
                                <li>
                                    <button type="button" class="button_menu1">
                                       <span class="button_menu_titre">Niveau</span>
                                       <ion-icon name="caret-down-outline" class="caret_bas_niveau_etude"></ion-icon>
                                       <ion-icon name="caret-forward-outline" class="button_menu_fermer_niveau_etude" style="display:none;"></ion-icon>
                                    </button>
                                    <ul class="niveau_etude">
                                        <li><a href="#">Niveau 1</a></li>
                                        <li><a href="#">Niveau 2</a></li>
                                        <li><a href="#">Niveau 3</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <button type="button" class="button_menu1">
                                    <span class="button_menu_titre">Periode</span>
                                    <ion-icon name="caret-down-outline" class="caret_bas_periode"></ion-icon>
                                    <ion-icon name="caret-forward-outline" class="button_menu_fermer_periode" style="display:none;"></ion-icon>
                                    </button>
                                    <ul class="periode">
                                        <li><a href="#">22-23</a></li> 
                                    </ul>
                                </li>
                            </ul>
                            
                    </div>
                    <div class="div_send_search">
                        <form method="get" action="">
                            <ul>
                                <li><input type="search" class="input_search" placeholder="recherche matricule" name="search_input" value="<?=htmlentities($_GET['search_input'] ?? null)?>"></li>
                                <li><button type="button" class="button_send_search"><ion-icon name="search-outline" class="icon_search"></ion-icon></button></li>
                                <!--<li><button type="submit" class="button_send_search"><ion-icon name="send-outline" class="icon_send"></ion-icon></button></li>-->
                                <li><button type="button" onclick="window.print()" class="button_send_search"><ion-icon name="print-outline" class="icon_print"></ion-icon></button></li>
                            </ul>
                        </form>
                    </div>
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
                                        <?php foreach($dbElement as $row):?>
                                            <tr>
                                                <td>1</td>
                                                <td><?=$row['NomE'] .' '. $row['PrenomE']?></td>
                                                <td><?=$row['MatriculeE']?></td>
                                                <td><?=$row['Note']?></td>
                                            </tr>
                                        <?php endforeach;?>                  
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