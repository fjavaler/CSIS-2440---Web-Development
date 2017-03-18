<?php
require_once 'DataBaseConnection.php';
$name = $_POST['name'];
$ac = $_POST['ac'];
$hd = $_POST['hd'];
$att = $_POST['att'];
$damage = $_POST['damage'];
$move = $_POST['move'];
$treasure = $_POST['treasure'];
$xp = $_POST['xp'];
$action = $_POST['action'];
?>
<html>
    <head>
        <meta charset = "utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Monsterous Results</title>
        <meta name = "viewport" content = "width=device-width, initial-scale=1">
        <link href = "css/bootstrap.min.css" rel = "stylesheet">
        <link href = "css/normalize.css" rel = "stylesheet" type = "text/css">
        <script src = "js/bootstrap.min.js" type="text/javascript"></script>
        <script src = "js/jquery.min.js" type="text/javascript"></script>
        <link href="data:image/x-icon;base64,AAABAAEAEBAAAAAAAABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAEAAAAAAAAAAAAAAAEAAAAAAAC9qnMA9ubeAObKrAD///8A7s60AO7WvQDNupQA1bJ7AMWqcwD/8v8A//r2AM2qcwDevpwAtJ1aAN7StAC9oWIA//b2AN7CiwD27uYAtJlaAMWhYgCkhTEAzbqLAP/y7gD24s0A5trFAP/6/wD26t4AzaFiAN7KrADNtoMA/+7uAM2ycwD23s0A1cKcAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMiHQMDAwMDAwMDAwMDAwMNBQMDAwMDAwMDGgkDAwMaHRwCAwMDAwMPGCIDAwMDAw4RGgMDAwMEAhUDAwMDARMhAwMDAwMDEQoCAwMDAw8aAwMDAwMDAyIDAwMDAx8eAwMDAwMDAwMYGQMDAwMgEgMDAwMDAwMDBwMDAwMBAAMDAwMDAwMDEgIaAwMKDQMDAwMDAwMDAwwJBQMhExoDAwMDAwMDAxsiFxYUBgMDAwMDAwMDAwMECAsQAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=" rel="icon" type="image/x-icon">
        <style>
            body
            {
                background-color: #060606;
                font-family: "Roboto","Helvetica Neue",Helvetica,Arial,sans-serif;
                color: #888888;
            }

            .table
            {
                color: white;
                border-bottom: 1px solid #282828;
            }

            td
            {
                border-bottom: 2px solid #282828;
            }

            tr
            {
                background-color: #181818;
                font-size: 14px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8">
                    <?php
                    switch ($action)
                    {
                        case "insert":
                            $insert = "INSERT INTO `Library`.`Monsters` (`MonsterName`, `MonsterAC`, `HitDice`, `MonsterAttack`, "
                                    . "`MonsterDamage`, `MonsterMove`, `MonsterTreasure`, `MonsterXP`, `Active`) "
                                    . "VALUES ( '$name', '$ac', '$hd', '$att', '$damage', '$move', '$treasure', '$xp', 'N')";
                            $success = $con->query($insert);
                            if ($success == FALSE)
                            {
                                $failmess = "Whole query " . $insert . "<br>";
                                echo $failmess;
                                die('Invalid query: ' . mysqli_error($con));
                            }
                            else
                            {
                                echo "Monster was added<br>";
                            }
                            break;
                        case "update":
                            $update = "";
                            break;
                        case "search":
                            $search = "SELECT `MonsterName`, `MonsterAC`, `HitDice`, `MonsterXP` FROM `Library` . `Monsters` WHERE `MonsterName` = '$name';";
                            $return = $con->query($search);
                            if ($return == FALSE)
                            {
                                $message = "Whole query " . $search . "<br>";
                                echo $Message;
                                die('Invalid query: ' . mysqli_error($con));
                            }
                            else
                            {
                                echo "<table class=\"table\"><th>Name</th><th>AC</th><th>Hit Dice</th><th>XP</th>";
                                while ($row = $return->fetch_assoc())
                                {
                                    echo "<tr><td>Name: " . $row['MonsterName']
                                    . "</td><td> AC: " . $row['MonsterAC']
                                    . "</td><td> HD: " . $row['HitDice']
                                    . "</td><td> XP: " . $row['MonsterXP'] . "</td></tr>";
                                }
                                echo "</table></div></div>";
                            }
                            break;
                        default:
                            echo "An unexpected error occurred. Please reload page and try again.";
                            break;
                    }
                    mysqli_close($con);
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>