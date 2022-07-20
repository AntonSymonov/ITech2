<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1</title>
</head>

<body>
    <?php
    if (isset($_GET["name"])) {
        $name = $_GET["name"];
        include('connect.php');
        $result = "Перечень палат, в которых дежурит медсестра <b>" . $name . "</b>";
        $result .= "<table border =1><tr><th>WardName</th></tr>";
        $cursor = $db->find(["nurseName" => $name]);
        $arr = array();
        foreach ($cursor as $document) {
            $WardName = $document['ward'];
            if (is_object($WardName)) {
                $WardName = (array)$WardName;
                foreach ($WardName as $value) {
                    $result .= "<tr> <td>$value</td> </tr>";
                }
            }
        }
        echo "<script> localStorage.setItem('$name', '$result'); </script>";
        print $result;
    }
    ?>

</body>
</html>