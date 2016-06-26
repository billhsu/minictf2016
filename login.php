<html>
<body>

Login
<hr>

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