<?php
if(isset($_POST["add"]))
{
    require_once("database.php");
        $namee = $_POST["name"];
        $lastname = $_POST["lname"];
        $emaill = $_POST["emal"];
        $tell = $_POST["phone"];
        $cityy = $_POST["city"];
        $genderr = $_POST["gender"];
        $subs = $_POST["subscription"];

        $stmt = $connecti->prepare("SELECT * FROM clients WHERE Email=?");
        $stmt->execute([$emaill]); 
        $user = $stmt->fetch();

        $stm = $connecti->prepare("SELECT * FROM clients WHERE Tel=?");
        $stm->execute([$tell]);
        $pa = $stm->fetch();
        
        if($user || $pa)    
        {
            header("Refresh:1;url = join.html");
        }
        else
        {
            $query=$connecti->prepare("INSERT INTO clients (Nom_Client,Prenom_Client,Sexe,Type_inscription,Email,Tel,ID_Club) VALUES (?,?,?,?,?,?,(SELECT ID_club FROM club WHERE Ville = ?))");
            $query->execute(array($namee,$lastname,$genderr,$subs,$emaill,$tell,$cityy));
            header("Refresh:1;url = homepage.html");
        }

        
}
?>