<?php
function rndname(){
   $string = "";
   $max = 20;
   $chars = "abcdefghijklmnopqrstuvwxwz0123456789";
   for($i = 0; $i < $max; $i++){
      $rand_key = mt_rand(0, strlen($chars));
      $string  .= substr($chars, $rand_key, 1);
   }
   return str_shuffle($string);
}
$out = '';
if (!isset($_COOKIE['user_details'])) {
   $out = "a new user!";
   $filename = "user_".rndname().".dat";
   $f = fopen('/tmp/level3/' . $filename, 'w+');
   $str = $_SERVER['REMOTE_ADDR']." using ".$_SERVER['HTTP_USER_AGENT'];
   fwrite($f, $str);
   fclose($f);
   setcookie('user_details', $filename);
}
else {
   $path = '/tmp/level3/'.$_COOKIE['user_details'];
   if (substr(realpath($path),0,5) !== "/tmp/") {
      $out = "Permission denied";
   } else {
      $out = file_get_contents($path);
   }
}
?>

<html>
<head>
<title>Level3</title>
</head>

<body>
<div>
This is level3, and you are <?php echo $out ?> <br/>
<br>
<small>The flag is stored in /tmp/flag.txt. PHP source code of this page can be found here:  <a href="https://gist.github.com/billhsu/5b962d4a4c7231f3f6348e7e9cf6d49c">https://gist.github.com/billhsu/5b962d4a4c7231f3f6348e7e9cf6d49c</a></small>
</body>
</html>