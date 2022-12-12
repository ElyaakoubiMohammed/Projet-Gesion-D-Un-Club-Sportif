<?php
if(isset($_POST["add"]))
{
    require_once("database.php");
        $namee = $_POST["namee"];
        $lastname = $_POST["pname"];
        $salaire = $_POST["salaire"];
        $id_act = $_POST["id_act"];
        $club = $_POST["id_club"];
        $type = $_POST["type"];
        $pass = $_POST["pass"];

       
        $stm = $connecti->prepare("SELECT * FROM activities WHERE ID_Activity=?");
        $stm->execute([$id_act]);
        $pa = $stm->fetch();

        $stt = $connecti->prepare("SELECT * FROM club where ID_Club = ?");
        $stt->execute([$club]);
        $idd = $stt->fetch();
        

        
        if(!empty($id_act))
        {
            if($pa && $idd)
            {
                $query=$connecti->prepare("INSERT INTO employees (Nom_Employee,Prenom_Employee,Salaire,ID_Activity,Type_Employee,Password_Employee,ID_Club) VALUES (?,?,?,?,?,?,?)");
                $query->execute(array($namee,$lastname,$salaire,$id_act,$type,$pass,$club));
                header("location:main.html");
            }
            else
            {
                header("location:adde.html");
                die();
            }
        }
        else
        {
            if($idd)
            {
                $query=$connecti->prepare("INSERT INTO employees (Nom_Employee,Prenom_Employee,Salaire,Type_Employee,Password_Employee,ID_Club) VALUES (?,?,?,?,?,?)");
                $query->execute(array($namee,$lastname,$salaire,$type,$pass,$club));
                header("location:main.html");
            }
            else
            {
                header("location:adde.html");
                die();
            }
        }

}