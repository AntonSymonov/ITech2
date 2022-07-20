<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2</title>
</head>
<body>
        <?php
         if(isset($_GET["department"]))
         {
             include('connect.php');
             $department=$_GET["department"];
             $department = intval($department, 10);

             $result =  "Перечень медсёстр отделения <b>".$department."</b>";
             $result .= "<table border =1><tr><th>NurseName</th></tr>";
             $cursor = $db->find(['department' => $department]);

             foreach ($cursor as $document) {
                 $NurseName = $document['nurseName'];
                 $result .= "<tr> <td>$NurseName</td> </tr>";
             }
             print $result;
             echo "<script> localStorage.setItem('$department', '$result'); </script>";
         }
    ?>
</body>   
</html>