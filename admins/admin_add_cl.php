<?php
if(isset($_POST["add"]))
{
    require_once("database.php");
        $namee = $_POST["namee"];
        $lastname = $_POST["pname"];
        $emaill = $_POST["emaill"];
        $tel = $_POST["tell"];
        $club = $_POST["idclub"];
        $genderr = $_POST["sexe"];
        $subs = $_POST["typee"];
        $etatt = $_POST["etat"];
        $money= $_POST["payer"];
        $datte  = date('d-m-y');

        

        $stm = $connecti->prepare("SELECT * FROM clients WHERE Tel=?");
        $stm->execute([$tel]);
        $pa = $stm->fetch();

        $st = $connecti->prepare("SELECT * FROM club where ID_Club = ?");
        $st->execute([$club]);
        $idd = $st->fetch();

        if($pa || !$idd)
        {
            header("location:addc.html");
            
        }
        else
        {
            $query=$connecti->prepare("INSERT INTO clients (Nom_Client,Prenom_Client,Sexe,Type_inscription,Email,Tel,Etat_Inscription,Montant,ID_Club,Date_Inscription) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $query->execute(array($namee,$lastname,$genderr,$subs,$emaill,$tel,$etatt,$money,$club,$datte));
            header("location:main.html");
        }


}