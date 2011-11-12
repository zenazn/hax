<?php
require_once('common.php');
$title = "Haxxr";

$tweets = mysql_query("SELECT *, tweets.id as tw_id FROM tweets JOIN users WHERE tweets.user_id = users.id ORDER BY tw_id DESC LIMIT 20");

if ($_SESSION['id']) {
?>
<div id="tweetwrap">
  What's Haxxing?
  <form id="post" action="post.php" method="post">
    <textarea id="tweet" name="tweet"></textarea>
    <input type="submit" value="Haxx it" />
  </form>
</div>
<?php } ?>
<div id="tweets">
<?php while ($row = mysql_fetch_assoc($tweets)) { ?>
  <div class="tweet">
    <img src="avatars/<?php echo $row['avatar'] ?>" />
    <div class="tweetright">
      <span class="tweeter">@<?php echo $row['username'] ?></span>
<?php echo $row['tweet'] ?>
    </div>
    <div class="tweetbottom"> </div>
  </div>
<?php } ?>
</div>
