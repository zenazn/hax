<?php
require_once('common.php');
$title = 'Upload avatar';

if ($_SESSION['id'] && $_FILES['file']['name']) {
  $avatar = basename($_FILES['file']['name']);
  move_uploaded_file($_FILES['file']['tmp_name'], "/home/www/git/hax/avatars/$avatar");
  mysql_query("UPDATE users SET avatar='$avatar' WHERE id='{$_SESSION['id']}'");
  header("Location: /");
}

?>
<div id="upload">
  <div>
    Upload an avatar.
  </div>
  <form enctype="multipart/form-data" action="avatar.php" method="post">
    <label for="file">File:</label>
    <input id="file" name="file" type="file" /> <br />
    <input type="submit" value="Prettify Everything" />
  </form>
</div>
