<?php 	$connect = mysqli_connect('127.0.0.1','root','', 'leha');
$func = "INSERT INTO boltalka_login (name,mail,password,login) VALUES ('".$_POST['name']."','".$_POST['mail']."','".$_POST['password']."','".$_POST['login']."')";
$query = mysqli_query($connect,$func);
header('Location: index.php'); ?>