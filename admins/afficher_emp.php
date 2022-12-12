<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

#hidetext { -webkit-text-security: circle; }

        #tablee {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 50%;
  box-shadow: 0px 0px 36px 15px rgba(0, 0, 0, 0.28);
            margin-left: auto;
            margin-right: auto;
}

body
{
	background-image:url('back.jpg');
	background-size:cover;
	background-repeat:no repeat;
}

#tablee td, #tablee th {
  border: 1px solid #ddd;
  padding: 8px;
  
}

#tablee {background-color: #f2f2f2;
margin-top:120px;}

#tablee tr:hover {background-color: #ddd;}

#tablee th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}

    </style>
</head>
<body>
    <?php
    if(isset($_GET["btn"]))
    {
        $lname = $_GET["lname"];
        $fname = $_GET["fname"];
    require_once("database.php");
    $stmt=$connecti->prepare("SELECT * FROM employees WHERE Nom_Employee = ? AND Prenom_Employee = ?");
    $stmt->execute(array($lname,$fname));
    $data=$stmt->fetchall(PDO::FETCH_ASSOC);
    if($stmt->rowCount()>0){
        //afficher tableau
        echo'<table id="tablee" border="2">';
        echo'<tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Salaire</th>
                <th>ID_Activity</th>
                <th>Type_Employee</th>
                <th>Password</th>
                <th>ID_Club</th>
            </tr>';
        foreach($data as $key=>$val){
            echo'<tr>';
            foreach($val as $key1=>$val1){
                echo'<td>'.$val1.'</td>';
                
            }
        }
        echo'</table>';
    }else{
        header("location:showemployee.html");
    }
}
    ?>

</body>
</html>