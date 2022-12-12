<?php
if(isset($_GET["add"]))
{
    require_once("database.php");
        $idd = $_GET["idd"];
        $pass = $_GET["pass"];

        $stm = $connecti->prepare("SELECT * FROM employees WHERE ID_Employee=?");
        $stm->execute([$idd]);
        $pa = $stm->fetch();

        $st = $connecti->prepare("SELECT * FROM employees where Password_Employee = ? AND ID_Employee=?");
        $st->execute(array($_GET["pass"],$_GET["idd"]));
        $id = $st->fetch();

        if($pa && $id)
        {
            header("location:main.html");
        }
        else
        {
            header("location:signin.html");
        }

}

