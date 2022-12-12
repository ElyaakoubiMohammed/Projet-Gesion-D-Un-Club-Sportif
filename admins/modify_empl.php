<?php

if(isset($_POST["mod1"]))
{
    require_once("database.php");
$salaire = $_POST["salaire"];
$idd_emp = $_POST["id_emp"];
$stmt = $connecti->prepare("SELECT ID_Employee FROM employees WHERE ID_Employee=?");
$stmt->execute([$idd_emp]); 
$user = $stmt->fetch();


if(!$user || empty($salaire))
{

    header("location:updateemployee.html");
}
else
{
    
            $query=$connecti->prepare("UPDATE employees SET Salaire = ? where ID_Employee = ?");
            $query->execute(array($salaire,$idd_emp));
            header("location:main.html");
}
}

if(isset($_POST["mod2"]))
{
require_once("database.php");
$id_act = $_POST["id_act"];
$idd_emp = $_POST["id_emp"];
$stmt = $connecti->prepare("SELECT ID_Employee FROM employees WHERE ID_Employee=?");
$stmt->execute([$idd_emp]); 
$user = $stmt->fetch();


$s = $connecti->prepare("SELECT ID_Activity FROM activities WHERE ID_Activity = ?");
$s->execute([$id_act]); 
$em = $s->fetch();

if(!$user  || empty($id_act) || !$em)
{
    header("location:updateemployee.html");
    die();
}
else
{
            $query=$connecti->prepare("UPDATE employees SET ID_Activity = ? where ID_Employee = ?");
            $query->execute(array($id_act,$idd_emp));
            header("location:main.html");
}
}

if(isset($_POST["mod3"]))
{
require_once("database.php");
$type = $_POST["typee"];
$idd_emp = $_POST["id_emp"];
$stmt = $connecti->prepare("SELECT ID_Employee FROM employees WHERE ID_Employee=?");
$stmt->execute([$idd_emp]); 
$user = $stmt->fetch();
if(!$user || empty($type))
{
    header("location:updateemployee.html");
}
else
{
            $query=$connecti->prepare("UPDATE employees SET Type_Employee = ? where ID_Employee = ?");
            $query->execute(array($type,$idd_emp));
            header("location:main.html");
}
}

if(isset($_POST["mod4"]))
{
require_once("database.php");
$pass = $_POST["pass"];
$idd_emp = $_POST["id_emp"];
$stmt = $connecti->prepare("SELECT ID_Employee FROM employees WHERE ID_Employee=?");
$stmt->execute([$idd_emp]); 
$user = $stmt->fetch();
if(!$user || empty($pass))
{
    header("location:updateemployee.html");
}
else
{
            $query=$connecti->prepare("UPDATE employees SET Password_Employee = ? where ID_Employee = ?");
            $query->execute(array($pass,$idd_emp));
            header("location:main.html");
}
}

if(isset($_POST["mod5"]))
{
require_once("database.php");
$idd_club = $_POST["id_club"];
$idd_emp = $_POST["id_emp"];
$stmt = $connecti->prepare("SELECT ID_Employee FROM employees WHERE ID_Employee=?");
$stmt->execute([$idd_emp]); 
$user = $stmt->fetch();

$s = $connecti->prepare("SELECT ID_Club FROM club WHERE ID_Club = ?");
$s->execute([$idd_club]); 
$em = $s->fetch();


if(!$user || empty($idd_club) || !$em)
{
    header("location:updateemployee.html");
    die();
}
else
{
            $query=$connecti->prepare("UPDATE employees SET ID_Club = ? where ID_Employee = ?");
            $query->execute(array($idd_club,$idd_emp));
            header("location:main.html");
}
}



?>