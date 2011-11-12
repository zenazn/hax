<?php
require_once('common.php');
$title = "Lost password?";

if ($_POST['username']) {
  $q = mysql_query("SELECT * FROM users WHERE username='{$_POST['username']}' AND email='{$_POST['email']}'");
  if ($row = mysql_fetch_assoc($q)) {
    ob_end_clean();
    die("I would have sent {$_POST['email']} an email saying that {$row['username']}'s password was {$row['password']}, but AWS doesn't allow me to send emails :(");
  } else {
    echo "<strong>Who's that?</strong>";
  }
}
?>
<div id="register">
  <div>
    Give us your username and email and we'll send you your password
  </div>
  <form action="lost.php" method="post">
    <label for="username">Username:</label>
    <input id="username" name="username" value="<?php echo $username ?>" /> <br />
    <label for="email">Email:</label>
    <input id="email" name="email" value="<?php echo $email ?>" /> <br />
    <input type="submit" value="I won't forget next time! Promise!" />
  </form>
</div>
