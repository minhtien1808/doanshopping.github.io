<?php
session_start();
require "../admin/models/user.php";
$user = new User();
if (isset($_GET['username']) && isset($_GET['password'])) {
	$username = $_GET['username'];
	$password = md5($_GET['password']);
	// check data
	$checkLogin = $user->login($username, $password);
	if ($username == $checkLogin['user_name'] && $password == $checkLogin['password']) {
		$_SESSION['user'] = $checkLogin;
		header('location:../admin/index.php');
	} else {
		header('location:login.php');
	}
}
