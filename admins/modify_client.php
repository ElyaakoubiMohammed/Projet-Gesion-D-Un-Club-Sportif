<?php

if(isset($_POST["mod2"]))
{
    require_once("database.php");
$idd = $_POST["idd"];
$emal = $_POST["emaill"];
$stmt = $connecti->prepare("SELECT ID_Client FROM clients WHERE ID_Client=?");
$stmt->execute([$idd]); 
$user = $stmt->fetch();




if(!$user || empty($emal))
{

    header("location:updateclient.html");
}
else
{
    
            $query=$connecti->prepare("UPDATE clients SET Email = ? where ID_Client = ?");
            $query->execute(array($emal,$idd));
            header("location:main.html");
}
}

if(isset($_POST["mod3"]))
{
require_once("database.php");
$idd = $_POST["idd"];
$tell= $_POST["tell"];
$stmt = $connecti->prepare("SELECT ID_Client FROM clients WHERE ID_Client=?");
$stmt->execute([$idd]); 
$user = $stmt->fetch();

$s = $connecti->prepare("SELECT Tel FROM clients WHERE TEL = ?");
$s->execute([$tell]); 
$em = $s->fetch();

if(!$user  || empty($tell) || $em)
{
    header("location:updateclient.html");
    die();
}
else
{
            $query=$connecti->prepare("UPDATE clients SET Tel = ? where ID_Client = ?");
            $query->execute(array($tell,$idd));
            header("location:main.html");
}
}

if(isset($_POST["mod1"]))
{
require_once("database.php");
$idd = $_POST["idd"];
$typ= $_POST["typee"];
$stmt = $connecti->prepare("SELECT ID_Client FROM clients WHERE ID_Client=?");
$stmt->execute([$idd]); 
$user = $stmt->fetch();
if(!$user || empty($typ))
{
    header("location:updateclient.html");
}
else
{
            $query=$connecti->prepare("UPDATE clients SET Type_Inscription = ? where ID_Client = ?");
            $query->execute(array($typ,$idd));
            header("location:main.html");
}
}

if(isset($_POST["mod4"]))
{
require_once("database.php");
$idd = $_POST["idd"];
$etat= $_POST["etat"];
$stmt = $connecti->prepare("SELECT ID_Client FROM clients WHERE ID_Client=?");
$stmt->execute([$idd]); 
$user = $stmt->fetch();
if(!$user || empty($etat))
{
    header("location:updateclient.html");
}
else
{
            $query=$connecti->prepare("UPDATE clients SET Etat_Inscription = ? where ID_Client = ?");
            $query->execute(array($etat,$idd));
            header("location:main.html");
}
}

if(isset($_POST["mod6"]))
{
require_once("database.php");
$idd = $_POST["idd"];
$club= $_POST["club"];
$stmt = $connecti->prepare("SELECT ID_Client FROM clients WHERE ID_Client=?");
$stmt->execute([$idd]); 
$user = $stmt->fetch();

$s = $connecti->prepare("SELECT ID_Club FROM club WHERE ID_Club = ?");
$s->execute([$club]); 
$em = $s->fetch();


if(!$user || empty($club) || !$em)
{
    header("location:updateclient.html");
    die();
}
else
{
            $query=$connecti->prepare("UPDATE clients SET ID_Club = ? where ID_Client = ?");
            $query->execute(array($club,$idd));
            header("location:main.html");
}
}

if(isset($_POST["mod5"]))
{
require_once("database.php");
$idd = $_POST["idd"];
$money= $_POST["money"];
$stmt = $connecti->prepare("SELECT ID_Client FROM clients WHERE ID_Client=?");
$stmt->execute([$idd]); 
$user = $stmt->fetch();
if(!$user || empty($money))
{
    header("location:updateclient.html");
}
else
{
            $query=$connecti->prepare("UPDATE clients SET Montant = ? where ID_Client = ?");
            $query->execute(array($money,$idd));
            header("location:main.html");
}
}
if(isset($_POST["mod7"]))
{
require_once("database.php");
$idd = $_POST["idd"];
$datee= $_POST["date"];
$stmt = $connecti->prepare("SELECT ID_Client FROM clients WHERE ID_Client=?");
$stmt->execute([$idd]); 
$user = $stmt->fetch();
if(!$user || empty($datee))
{
    header("location:updateclient.html");
}
else
{
            $query=$connecti->prepare("UPDATE clients SET Date_Inscription = ? where ID_Client = ?");
            $query->execute(array($datee,$idd));
            header("location:main.html");
}
}


?>