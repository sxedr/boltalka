<?php
$connect = mysqli_connect('127.0.0.1','root','', 'leha');
$query = mysqli_query($connect, "SELECT * FROM boltalka_login WHERE login='".$_POST['login']."' AND password='".$_POST['password']."'");
if($query->num_rows==0){
	header('Location: http://radio/index.php?q=0');
}
else {
	$obj = $query->fetch_assoc();
	header('Location: boltalka.php?id='.$obj['id'].'');
	}
?>
