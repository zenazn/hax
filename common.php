<?php

require('dbinfo.php');

$db = @mysql_connect('localhost', $db_username, $db_password);

if (!$db) {
  die("oh noes no db");
}

mysql_select_db($db_database);

function template_out($content) {
  if (!$_SESSION['id']) {
    $login = '<a href="login.php">Login</a> or <a href="register.php">Register</a>';
  } else {
    $login = "Welcome <a href=\"avatar.php\">{$_SESSION['username']}</a>. <a href=\"logout.php\">Log out</a>";
  }
  // This is hideous!
  return <<<EOF
<html>
  <head>
    <title>$title</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
    <script>
      // Redefine alert() to be less annoying
      function alert(str) {
        console.log("ALERT: " + str);
        var e = document.getElementById("alertbox");
        e.innerHTML = str + "<br />" + e.innerHTML;
      }
    </script>
  </head>
  <body>
    <div id="wrapper">
      <div id="header">
        <div id="logininfo">
$login
        </div>
      </div>
      <div id="content">
      <div id="alertbox"></div>
$content
      </div>
    </div>
  </body>
</html>
EOF;
}

ob_start('template_out');
session_start();
