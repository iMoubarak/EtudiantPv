<?php
session_start();
require_once('auth.php');
forcer_connection();
    $user = 'root';
    $pass = '913437';
    $query = "select * from Etudiants order by NomE";
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
    $test=false;
    if(isset($_POST['valider']))
    {
        if(!empty($_POST['section']) && !empty($_POST['semestre']) && !empty($_POST['session']) && !empty($_POST['matiere']) && !empty($_POST['periode']))
        {
            if(isset($_POST['section']) && isset($_POST['semestre']) && isset($_POST['session']) && isset($_POST['matiere']) && isset($_POST['periode']))
                $test = true;
            else
                $test = false;

        }
        else
            $test = false;
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
                <div class="niveau">
                        <form method="POST">
                            <button type="submit" style="background: none;border:none;" name="valider">
                                <ion-icon name="caret-forward-outline" title="valider"></ion-icon>
                            </button>
                            <button type="button" class="button_choix">
                                <span class="span_choix">Section : </span>
                                <select name="section"  class="select_choix">
                                    <option value="1">MI</option>
                                    <option value="2">MPC</option>
                                    <option value="3">BGE</option>
                                </select>
                            </button>
                            <button type="button" class="button_choix">
                                <span class="span_choix">Semestre</span>
                                <select name="semestre" class="select_choix" >
                                    <option value="1">S-1</option>
                                    <option value="2">S-2</option>
                                    <option value="3">S-3</option>
                                    <option value="3">S-4</option>
                                    <option value="3">S-5</option>
                                    <option value="3">S-6</option>
                                </select>
                            </button>
                            <button type="button" class="button_choix">
                                <span class="span_choix">Session</span>
                                <select name="session"  class="select_choix">
                                    <option value="1">Session 1</option>
                                    <option value="2">Session 2</option>
                                </select>
                            </button>
                            <button type="button" class="button_choix">
                                <span class="span_choix">Matière</span>
                                <select name="matiere"  class="select_choix">
                                    <option value="1">Analyse</option>
                                </select>
                            </button>
                            <button type="button" class="button_choix">
                                <span class="span_choix">Période</span>
                                <select name="periode" class="select_choix">
                                    <option value="1">2021-2022</option>
                                </select>
                            </button>
                        </form>  
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
                    <?php if($test) :?>
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
                                            <?php $i=0;?>
                                            <?php foreach($dbElement as $row):?>
                                                <?php $i++;?>
                                                <tr>
                                                    <td><?=$i?></td>
                                                    <td><?=$row['NomE'] .' '. $row['PrenomE']?></td>
                                                    <td><?=$row['MatriculeE']?></td>
                                                    <td><input type="number" name="noteE[]" class="case_saisi_note" placeholder="/20" value="<?=$row['Note']?>"></td>
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
                    <?php else :?>
                    <?php endif;?>
                </div>
            </div>
        <script src="index-script.js" async></script>
    </body>
</html>