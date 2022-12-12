<?php

if(isset($_POST["mod1"]))
{
require_once("database.php");
$type = $_POST["type"];
$idd = $_POST["idd"];
$stmt = $connecti->prepare("SELECT Type_Activite FROM activities WHERE Type_Activite=?");
$stmt->execute([$type]); 
$user = $stmt->fetch();

$stm = $connecti->prepare("SELECT ID_Activity FROM activities WHERE ID_Activity=?");
$stm->execute([$idd]); 
$use = $stm->fetch();



if($user || empty($type) || !$use)
{

    header("location:updateactivity.html");
    die();
}
else
{
    
            $query=$connecti->prepare("UPDATE activities SET Type_Activite = ? where ID_Activity = ?");
            $query->execute([$type,$idd]);
            header("location:main.html");
}
}

if(isset($_POST["mod2"]))
{
    require_once("database.php");
    $idd = $_POST["idd"];
    $duree = $_POST["duree"];

    $stm = $connecti->prepare("SELECT ID_Activity FROM activities WHERE ID_Activity=?");
    $stm->execute([$idd]); 
    $use = $stm->fetch();

    var_dump($use);
    var_dump($duree);

  
    if(empty($duree) || !$use)
    {
    
        header("location:updateactivity.html");
        die();
    }
    else
    {
        
                $query=$connecti->prepare("UPDATE activities SET Duree = ? where ID_Activity = ?");
                $query->execute([$duree,$use[0]]);
                header("location:main.html");
    }
    
}