http://www.w3schools.com/sql/func_now.asp

<?php
require 'constants.php';
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'scoreboard');
define('DB_PASSWORD', 'password');
define('DB_DATABASE', 'ctf');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if (!$db) {
  echo "Error: Unable to connect to MySQL." . PHP_EOL;
  echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
  echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
  exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['team']) && isset($_POST['level']) && isset($_POST['flag'])) {
        $team = $_POST['team'];
        $level = $_POST['level'];
        $flag = $_POST['flag'];
        if (!in_array($team, $teams) || !in_array($level, $levels)) {
            echo "input not valid<br/>";
            exit();
        }
        if (($level=="level1" && $flag=="bRapRAt7") || ($level=="level2" && $flag=="deRes5ch") || ($level=="level3" && $flag=="SafePayments!")) {
            $sql = "SELECT * FROM team_status WHERE team = '$team' and level = '$level'";
            $result = mysqli_query($db,$sql);
            if ($result->num_rows > 0) {
                echo "already submitted<br/>";
            } else {
                $insert = "INSERT INTO team_status (TEAM, LEVEL) VALUES ('$team', '$level')";
                mysqli_query($db, $sql);
                $countSql = "SELECT * from scoreboard where team='$team'";
                $result = mysqli_query($db,$countSql);
                $count = 0;
                if ($result->num_rows > 0) {
                    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                    $count = $rwo["count"];
                }
                $count = $count + 1;
                $insert = "INSERT INTO scoreboard (TEAM, COUNT) VALUES ('$team', '$count') ON DUPLICATE KEY UPDATE COUNT=VALUES('$count')"
                mysqli_query($db, $insert);
                echo "Submitted!<BR/>"
            }
        } else {
            echo "Sorry but the token is not correct..<br/>";
        }
    }
}
?>
<html>
<body>
Submit your score here.<br/>
Please don't hack this page!<br/>
<hr>
<br/>
<form action ="" method = "post">
   Team <input type="text" name="team" id="team" required><br/>
   Level
   <select>
     <option value="level1">Level1</option>
     <option value="level2">Level2</option>
     <option value="level3">Level3</option>
  </select> 
   Flag <input type="text" name="flag" id="flag" required><br/>
   <button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "submit">Submit!</button>
</form>
</body>
</html>