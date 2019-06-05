<!DOCTYPE html>
<html style="height:100%; margin:0; padding:0;">
<head>
<title>Boltalka</title>
<meta charset="utf8">
<meta name="viewport" content="width=device-width">
<meta http-equiv="content-type" content="text/html; charset=windows-1251">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript">
	function startTime()
	{
	var tm=new Date();
	var h=tm.getHours();
	var m=tm.getMinutes();
	var s=tm.getSeconds();
	m=checkTime(m);
	s=checkTime(s);
	document.getElementById('txt').innerHTML=h+":"+m+":"+s;
	t=setTimeout('startTime()',500);
	}
	function checkTime(i)
	{
	if (i<10)
	{
	i="0" + i;
	}
	return i;
	}
</script> 
</head>
<body style="background-image:url(img/f002.jpg); background-size:100% 110%; height: 100%; margin:0; padding:0;" onload="startTime()">
	<?php 
		$connect = mysqli_connect('127.0.0.1','root','', 'leha');
		$query = mysqli_query($connect, "SELECT * FROM boltalka_login");
	 ?>
	<div class="col-12 max-auto d-flex">
		<div class="col-6 mt-5">
			<div style="height:20px; width:1px"></div>
			<div class="col-9 mt-5 d-flex text-dark">
 				<h1 class="font-weight-bold display-1"> BoL</h1><h1 class=" display-1">TaLKa </h1>
 			</div>
 			<div class="col-9 mt-n4 d-flex text-dark">
 				<h1 class=" display-1"> OnLine</h1><h1 class="font-weight-bold display-1">CHAT </h1>
 			</div>
 			<div class="col-9 text-dark mb-4">
 				<p class="display-4">with music*</p>
 			</div>
 			<div class="col-6 text-center ml-auto d-flex">
 				<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModal" style="height:70px">Sign Up</button>
 			</div>
 			<div class="col-6 text-center mr-auto d-flex">
 				<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModal2" style="height:70px">Login</button>
 			</div>
		</div>
		<div class="col-6 mx-auto text-center my-auto">
			<h1 class="display-1" id="txt"></h1>
		</div>
	</div>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <form action="reg.php" method="POST">
		      <div class="modal-body">
		      	<input type="" name="mail" class="form-control mb-2" placeholder="Электронная почта">
			 	<input type="" name="name" class="form-control mb-2 mt-1" placeholder="Имя и фамилия">
			 	<input type="" name="login" class="form-control mb-2 mt-1" placeholder="Имя пользователя">
			 	<input type="password" name="password" class="form-control mb-2 mt-1" placeholder="Пароль">
		      </div>
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-primary">Sign Up</button>
		      </div>
	      </form>
	    </div>
	  </div>
	</div>
	<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <form action="auth.php" method="POST">
		      <div class="modal-body">
		      	<input type="" name="login" class="form-control mb-2 " placeholder="Имя пользователя">
			 	<input type="password" name="password" class="form-control mt-1" placeholder="Пароль">
		      </div>
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-primary">Login</button>
		      </div>
	      </form>
	    </div>
	  </div>
	</div>
	 <script type="text/javascript">
		<?php  
		if($_GET["q"] == "0")
			echo "alert('Нет такого пользователя');";
		?>
	</script>
</body>
</html>

