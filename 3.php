<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3</title>
</head>
<body>
        <?php
         if(isset($_GET["shift"]) && isset($_GET["departmentShift"]))
         {

            $shift=$_GET["shift"];
            $department = intval($_GET["departmentShift"], 10);
            $key = $shift . $department;
             $result = "Перечень палат в <b>".$shift."</b> смену и в ".$department." отделении";
             $result .=  "<table border =1><tr><th>Date</th> </tr>";
             include('connect.php');
             $cursor = $db->find(['department' => $department,
                                   'shift' => $shift]);

             foreach ($cursor as $document) {
                $date = gmdate("H:i:s Y-m-d", $document['date']);
                $result .= "<tr> <td>$date</td> </tr>";
             }
             echo "<script> localStorage.setItem('$key', '$result'); </script>";
             print $result;
         }
        ?>
</body>   
</html>