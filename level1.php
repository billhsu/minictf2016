<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
   if(isset($_POST['username']) && isset($_POST['password'])) {
      if ("password".$_POST['username'] == $_POST['password']) {
         echo "Congrats! The flag is bRapRAt7. Don't share it with other teams!<br/>";
         echo "<strong> <a href='submit.php'>Submit</a> your flag and then proceed to <a href='level2.php'>Level2</a></strong><br/>";
      }
   }
}
?>

<html>
<head>
<title>Level1</title>
</head>
<body>

You will see the flag for this level by logging in successfully.
<hr>
Login
<br>
<form action ="" method = "post" onsubmit="return validation()">
   <input type="text" name="username" id="username" required autofocus><br/>
   <input type="password" name="password" id="password" required><br/>
   <button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "login">Login</button>
</form>
<script>
function validation() {
   var username = document.getElementById("username").value;
   var password = document.getElementById("password").value;
   console.log(atob("cGFzc3dvcmQ=") + username)
   console.log(password)
   if (atob("cGFzc3dvcmQ=") + username == password) {
      return true;
   }
   alert("wrong password");
   return false;
}
</script>
</body>
</html>