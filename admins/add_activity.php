<?php
if(isset($_POST["add"]))
{
    require_once("database.php");
    $type = $_POST["type"];
    $time = $_POST["duree"];

    $stm = $connecti->prepare("SELECT * FROM activities WHERE Type_Activite=?");
        $stm->execute([$type]);
        $pa = $stm->fetch();

    if($pa)
    {
        header("location:adda.html");
    }
    else
    {
        $query=$connecti->prepare("INSERT INTO activities (Type_Activite,Duree) VALUES (?,?)");
        $query->execute(array($type,$time));
        header("location:main.html");
    }

}

