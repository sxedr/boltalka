<?php 
	$connect = mysqli_connect('127.0.0.1','root','', 'leha');
	$sql = "INSERT INTO `boltalka_music` (`musicName`, `musicFile`) VALUES ('".$_POST['musicName']."','music/".$_FILES['musicFile']['name']."')";
	$query = mysqli_query($connect, $sql);
	move_uploaded_file($_FILES['musicFile']['tmp_name'], 'music/'.$_FILES['musicFile']['name']);
	header('Location: http://ziqunion95.myjino.ru/boltalka.php?id='.$_POST['id'].'');
 ?>