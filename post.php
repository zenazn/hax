<?php
require_once('common.php');

$user_id = $_SESSION['id'];
$tweet = $_POST['tweet'];

if (!$user_id) {
  die('who are you? (please log in)');
}

if (!$tweet or strlen($tweet) < 3) {
  die('tweet longer please');
}

$tweet = mysql_real_escape_string($tweet);

mysql_query("INSERT INTO tweets (tweet, user_id) VALUES ('$tweet', $user_id)");

header("Location: /");
