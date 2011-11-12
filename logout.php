<?php
session_start();

$_SESSION['id'] = null;
$_SESSION['username'] = null;

header("Location: /");
