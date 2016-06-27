<?php
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'scoreboard');
define('DB_PASSWORD', 'chaWuwR3');
define('DB_DATABASE', 'ctf');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if (!$db) {
  echo "Error: Unable to connect to MySQL." . PHP_EOL;
  echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
  echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
  exit;
}

$sql = "SELECT * from scoreboard order by COUNT desc, UPDATED limit 4";
$result = mysqli_query($db,$sql);
?>

<html>
    <head>
    <meta http-equiv="refresh" content="3">
    <title>Scoreboard</title>
    </head>
    <body>
     <table style="width:100%">
        <tr>
          <td>Team</td>
          <td>Solved</td>
          <td>Last update</td>
        </tr>
<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["TEAM"]."</td><td>".$row["COUNT"]."</td><td>".$row["UPDATED"]."</td>";
        echo "</tr>";
    }
}
?>
        </table>
    </body>
</html>