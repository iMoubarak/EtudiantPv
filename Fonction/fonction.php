<?php
    function count_page(array $tab,int $count):int
    {
        $page = 0;
        for($i=0;$i<$count;$i++)
            if($i+1%11==0)
                $page++;
        return $page;
    } 
    function remplir_form_etudiant(array $data,PDO $db):string
    {
        date_default_timezone_set('UTC');
        $alert='';
        $txt = [];
        $nomE = htmlspecialchars($_POST['nom_etudiant']);
        $Prenom = htmlspecialchars($_POST['prenom_etudiant']);
        $matE = htmlspecialchars($_POST['mat_etudiant']);
        $date_naissance = htmlspecialchars($_POST['date_naissance']);
        $niveau = htmlspecialchars($_POST['select_niveau']);
        $promo = htmlspecialchars($_POST['promo_etudiant']);
        $note='';
        try
        {
            $sql = "INSERT INTO Etudiants (MatriculeE,NomE,PrenomE,DateNaiss,Nivaux,Annee) VALUES (:matE,:nomE,:Prenom,:date_naissance,:niveau,:promo)";
            $query = $db->prepare($sql);
            $query->bindValue(":matE",$matE ,PDO::PARAM_STR);
            $query->bindValue(":nomE",$nomE ,PDO::PARAM_STR);
            $query->bindValue(":Prenom",$Prenom ,PDO::PARAM_STR);
            $query->bindValue(":date_naissance",$date_naissance,PDO::PARAM_STR);
            $query->bindValue(":niveau",$niveau ,PDO::PARAM_STR);
            $query->bindValue(":promo",$promo,PDO::PARAM_STR);
            $query->execute();
            $date = date('"Y-m-d H:i:s"');
            $txt['titre']="Ajout d'un etudiant le $date";
            $txt['msg'] = "Matricule : $matE, Nom : $nomE, Prenom : $Prenom, Date de naissance : $date_naissance, Niveau : $niveau, Promotion : $promo";
            $alert = "<br><div class=\"alert alert-success\" style=\"text-align: center;\">Ajouté avec succès</div>";
        }catch(Exception $e)
        {
            $txt['titre']='';
            $txt['msg']='';
            $alert = "<br><div class=\"alert alert-danger\" style=\"text-align: center;\">Veuillez recommencer</div>";
        }
        if(!empty($txt['titre']) && !empty($txt['msg']))
        {
            $sql = "INSERT INTO Evenement(titre,msg) VALUES (:titre,:msg)";
            $query = $db->prepare($sql);
            $query->bindValue(":titre",$txt['titre'],PDO::PARAM_STR);
            $query->bindValue(":msg",$txt['msg'],PDO::PARAM_STR);
            $query->execute();
        }
        return $alert;
    } 
    function remplir_form_agent(array $data , PDO $db):string
    {
        date_default_timezone_set('UTC');
        $alert='';
        $txt = [];
        $nom = htmlspecialchars($_POST['nom_agent']);
        $prenom = htmlspecialchars($_POST['prenom_agent']);
        $mat = htmlspecialchars($_POST['mat_agent']);
        try
        {
            $sql = "INSERT INTO Agents(IdAgent,NomAg,PrenomAg) VALUES (:mat,:nom,:prenom)";
            $query = $db->prepare($sql);
            $query->bindValue(":nom",$nom,PDO::PARAM_STR);
            $query->bindValue(":prenom",$prenom,PDO::PARAM_STR);
            $query->bindValue(":mat",$mat,PDO::PARAM_STR);
            $query->execute();
            $date = date('"Y-m-d H:i:s"');
            $txt['titre']="Ajout d'un agent le $date";
            $txt['msg'] = "Matricule : $mat, Nom : $nom, Prenom : $prenom";
            $alert = "<br><div class=\"alert alert-success\" style=\"text-align: center;\">Ajouté avec succès</div>";
        }catch(Exception $e)
        {
            $txt['titre']='';
            $txt['msg']='';
            $alert = "<br><div class=\"alert alert-danger\" style=\"text-align: center;\">Veuillez recommencer</div>";
            
        }
        if(!empty($txt['titre']) && !empty($txt['msg']))
        {
                $sql = "INSERT INTO Evenement(titre,msg) VALUES (:titre,:msg)";
                $query = $db->prepare($sql);
                $query->bindValue(":titre",$txt['titre'],PDO::PARAM_STR);
                $query->bindValue(":msg",$txt['msg'],PDO::PARAM_STR);
                $query->execute();
        }
        return $alert;
    }
    function remplir_form_mot_de_passe(array $data,PDO $db):string
    {
        date_default_timezone_set('UTC');
        $db = new PDO("mysql:host=localhost;dbname=PVFAST",'root','913437',[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $alert='';
        $txt = [];
        $old = htmlspecialchars($_POST['old_pass']);
        $new = htmlspecialchars($_POST['new_pass']);
        $valid = htmlspecialchars($_POST['verify_pass']);
        $recups = $db->query("SELECT * FROM Mot_de_passe");
        foreach($recups as $recup);
        if($old !== $recup['pass'])
            return "<br><div class=\"alert alert-danger\" style=\"text-align: center;\">Ancient mot de passe incorrect</div>";
        if($valid!==$new)
            return "<br><div class=\"alert alert-danger\" style=\"text-align: center;\">Echec lors de la confirmation</div>";
        $sql = "DELETE FROM Mot_de_passe WHERE pass='$old'";
        $db->query($sql);
        $sql = "INSERT INTO Mot_de_passe(pass) VALUE (:new)";
        $query = $db->prepare($sql);
        $query->bindValue(":new",$new,PDO::PARAM_STR);
        if($query->execute())
        {
            $date = date('"Y-m-d H:i:s"');
            $txt['titre']="Mot de passe modifié le $date";
            $txt['msg'] = "Admins";
            $alert = "<br><div class=\"alert alert-success\" style=\"text-align: center;\">Ajouté avec succès</div>";
        }
        else
        {
            $txt['titre']='';
            $txt['msg']='';
            $alert = "<br><div class=\"alert alert-danger\" style=\"text-align: center;\">Ce mot de passe existe </div>";   
        }
        if(!empty($txt['titre']) && !empty($txt['msg']))
        {
                    $sql = "INSERT INTO Evenement(titre,msg) VALUES (:titre,:msg)";
                    $query = $db->prepare($sql);
                    $query->bindValue(":titre",$txt['titre'],PDO::PARAM_STR);
                    $query->bindValue(":msg",$txt['msg'],PDO::PARAM_STR);
                    $query->execute();
        }
        return $alert;
    }
?>