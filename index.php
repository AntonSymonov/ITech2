
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2</title>
    <script>
        function getName() {
            let name = document.getElementById("name").value;
            let result = localStorage.getItem(name);
            document.getElementById('res').innerHTML = result;
        }

        function getDepartment () {
            let department = document.getElementById("department").value;
            let result = localStorage.getItem(department);
            document.getElementById('res').innerHTML = result;
        }

        function getShiftDepartment(){
            let shift = document.getElementById("shift").value;
            let departmentShift = document.getElementById("departmentShift").value;
            let result = localStorage.getItem(shift+departmentShift);
            document.getElementById('res').innerHTML = result;
        }
    </script>

</head>
<body>
<?php include('connect.php'); ?>
<h4>Симонов Антон. Вариант №3, КИУКИ-19-1</h4>
    <p>Получить перечень палат, в которых дежурит выбранная медсестра:</p>
    <form action="1.php" method = "GET">
        <select id="name" name="name" onchange="getName()">
            <?php
            $statement = $db->distinct("nurseName");
             foreach ($statement as $value)
                 print "<option> $value</option>";
            ?>
        </select>
        <input type="submit" value="Получить">
    </form>

    <p>Получить перечень медсёстр, выбранного отделения:</p>
    <form action="2.php" method = "GET">
        <select name="department" id="department" onchange="getDepartment()">
            <?php
            $statement = $db->distinct("department");
            foreach ($statement as $value)
                print "<option> $value</option>";
            ?>
        </select>
        <input type="submit" value="Получить">
    </form>

    <p>Получить перечень дежурств в указанную смену в указанном отделении:</p>
    <form action="3.php" method = "GET">
        <p>Выберите смену</p>
        <select id = "shift" name="shift" onchange="getShiftDepartment()">
            <?php
            $statement = $db->distinct("shift");
            foreach ($statement as $value)
                print "<option> $value</option>";
            ?>
        </select>
        <p>Выберите отделение</p>
        <select id="departmentShift" name="departmentShift" onchange="getShiftDepartment()">
            <?php
            $statement = $db->distinct("department");
            foreach ($statement as $value)
                print "<option> $value</option>";
            ?>
        </select>
        <input type="submit" value="Получить">
    </form>
    <div id = "res"> </div>
</body>
</html>