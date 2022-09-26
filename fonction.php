<?php
    function count_page(array $tab,int $count):int
    {
        $page = 0;
        for($i=0;$i<$count;$i++)
            if($i+1%11==0)
                $page++;
        return $page;
    } 
    function remplir_form_etudiant(array $data,PDO $db)
    {
        $txt = [];
        $nomE = htmlspecialchars($_POST['nom_etudiant']);
        $Prenom = htmlspecialchars($_POST['prenom_etudiant']);
        $matE = htmlspecialchars($_POST['mat_etudiant']);
        $date_naissance = htmlspecialchars($_POST['date_naissance']);
        $niveau = htmlspecialchars($_POST['select_niveau']);
        $promo = htmlspecialchars($_POST['promo_etudiant']);
        $note='';
        $db = new PDO("mysql:host=localhost;dbname=PVFAST",'root','913437',[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $sql = "INSERT INTO Etudiants (MatriculeE,NomE,PrenomE,DateNaiss,Nivaux,Annee) VALUES (:matE,:nomE,:Prenom,:date_naissance,:niveau,:promo)";
        $query = $db->prepare($sql);
        $query->bindValue(":matE",$matE ,PDO::PARAM_STR);
        $query->bindValue(":nomE",$nomE ,PDO::PARAM_STR);
        $query->bindValue(":Prenom",$Prenom ,PDO::PARAM_STR);
        $query->bindValue(":date_naissance",$date_naissance,PDO::PARAM_STR);
        $query->bindValue(":niveau",$niveau ,PDO::PARAM_STR);
        $query->bindValue(":promo",$promo,PDO::PARAM_STR);
        //$query->bindValue(":note",$note,PDO::PARAM_STR);
        if($query->execute())
        {
            $txt['titre']='Ajout d\'un étudiant';
            $txt['msg'] = "Matricule : $matE, Nom : $nomE, Prenom : $Prenom, Date de naissance : $date_naissance, Niveau : $niveau, Promotion : $promo";
        }
        else{
            $txt['titre']='';
            $txt['msg']='';
        }
        if(!empty($txt['titre']) && !empty($txt['msg']))
        {
            $sql = "INSERT INTO Evenement(titre,msg) VALUES (:titre,:msg)";
            $query = $db->prepare($sql);
            $query->bindValue(":titre",$txt['titre'],PDO::PARAM_STR);
            $query->bindValue(":msg",$txt['msg'],PDO::PARAM_STR);
            $query->execute();
        }
    } 
?>