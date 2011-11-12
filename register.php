<?php
require_once('common.php');
$title = 'Register';

if ($_POST['username']) {
  // Try to register the user
  $username = preg_replace('/[^a-zA-Z0-9]/', '', $_POST['username']);
  $email = $_POST['email'];
  $password = $_POST['password'];
  if (strlen($username) < 3) {
    echo "<strong>Pick a longer username</strong>";
  } else if (!preg_match('/^[a-z0-9_-]+@[a-z0-9._-]+\.[a-z]+$/i', $email)) {
    echo "<strong>That's not an email... (probably)</strong>";
  } else if (strlen($password) < 3) {
    echo "<strong>Passwords must be at least 3 chars long</strong>";
  } else {
    // we're all good!
    $q = mysql_query("INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')");
    if (!$q) {
      echo("mysql error: " . mysql_error());
    } else {
      $_SESSION['id'] = mysql_insert_id();
      $_SESSION['username'] = $username;
      header("Location: /");
    }
  }
}
?>
<div id="register">
  <div>
    <strong>Please don't use a password you like</strong>. This site isn't very secure
  </div>
  <form action="register.php" method="post">
    <label for="username">Username:</label>
    <input id="username" name="username" value="<?php echo $username ?>" /> <br />
    <label for="email">Email:</label>
    <input id="email" name="email" value="<?php echo $email ?>" /> <br />
    <label for="password">Password</label>
    <input id="password" name="password" value="<?php echo $password ?>" /> <br />
    <input type="submit" value="Register" />
  </form>
</div>
