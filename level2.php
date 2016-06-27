<?php
   define('DB_SERVER', '127.0.0.1');
   define('DB_USERNAME', 'readonly');
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
      if(isset($_POST['username']) && isset($_POST['password'])) {
         $username = $_POST['username'];
         $password = $_POST['password'];
         $sql = "SELECT * FROM user WHERE username = '$username' and password = '$password'";
         echo "<!-- Hint!: ".$sql." -->\n";
         $result = mysqli_query($db,$sql);
         $count = mysqli_num_rows($result);
         if ($count == 1) {
            echo "Welcome ".$_POST['username']."<br/>";
            echo "Congrats! The flag is deRes5ch. Don't share it with other teams!<br/>";
         }
      }
   }
?>

<html>
<body>
You will see the flag for this level by logging in successfully.<br/>
<small>If you need a hint, try login first, then take a look at the page's source code</small>
<hr>
Login
<br>
<form action ="" method = "post">
   <input type="text" name="username" id="username" required autofocus><br/>
   <input type="password" name="password" id="password" required><br/>
   <button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "login">Login</button>
</form>
</body>
</html>