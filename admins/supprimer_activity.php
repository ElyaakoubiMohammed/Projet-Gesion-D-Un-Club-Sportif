<?php
    if(isset($_POST["rm"]))
    {
        require_once("database.php");
        $idd = $_POST["idd"];
        $stmt = $connecti->prepare("SELECT ID_Activity FROM activities WHERE ID_Activity=?");
        $stmt->execute([$idd]); 
        $user = $stmt->fetch();
        if($user)
        {
            
            $query=$connecti->prepare("DELETE  FROM activities where ID_Activity = ? ");
            $query->execute([$idd]);
            header("location:main.html");
        }
        else
        {
            header("location:dropactivity.html");
        }
    }
           