<?php
    if(isset($_POST["btn"]))
    {
        require_once("database.php");
        $idd = $_POST["idd"];
        $stmt = $connecti->prepare("SELECT * FROM clients WHERE ID_Client=?");
        $stmt->execute([$idd]); 
        $user = $stmt->fetch();
        if($user)
        {
            
            $query=$connecti->prepare("DELETE FROM clients where ID_Client = ? ");
            $query->execute([$idd]);
            header("location:main.html");
        }
        else
        {
            header("location:dropclient.html");
        }
    }
           