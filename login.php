<?php
require_once('common.php');
$title = "Log in";

if ($_POST['username']) {
  // We got something!
  $username = preg_replace('/[^a-zA-Z0-9]/', '', $_POST['username']);
  $password = $_POST['password'];
  $q = mysql_query("SELECT id FROM users WHERE username='$username' AND PASSWORD='$password'");
  if ($q and $row = mysql_fetch_assoc($q)) {
    $_SESSION['id'] = $row['id'];
    $_SESSION['username'] = $username;
    header("Location: /");
  }
}

?>
<div id="login">
  <form action="login.php" method="post">
    <label for="username">Username:</label>
    <input id="username" name="username" value="<?php echo $username ?>" /> <br />
    <label for="password">Password</label>
    <input id="password" name="password" /> <br />
    <input type="submit" value="Log in" />
  </form>
  <div><a href="lost.php">Forgot your password?</a></div>
</div>
