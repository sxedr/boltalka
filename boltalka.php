<!DOCTYPE html>
<html style="height:100%; margin:0; padding:0;">
<head>
<title>Boltalka</title>
<meta charset="utf8">
<meta http-equiv="content-type" content="text/html; charset=windows-1251">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/chat.js"></script>
<style type="text/css">
	body {
	  position: relative;
	}
</style>
</head>
<body data-spy="scroll" data-target="#navbar-example" style="background-image:url(img/f002.jpg); background-size:100% ; height: 100%; margin:0; padding:0;">
	<?php 
		$connect = mysqli_connect('127.0.0.1','root','', 'leha');
		$pageID = mysqli_query($connect, "SELECT * FROM boltalka_login WHERE id='".$_GET['id']."'");
		$q = $pageID->fetch_assoc();
			
	 ?>
	<div class="col-12 pt-5 d-flex">
		<div class="col-6">
			<div class="d-flex">
				<h1 class="font-weight-bold "> BoL</h1><h1 class=" ">TaLKa </h1>
			</div>
			<div class="mt-n3">
				<p>Chat with music*</p>
			</div>
			<div class="col-10 ml-n2">
				<div id="chat" style="height:300px;" class="col-12"></div>
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<div class="col-12">
							<?php 
							echo '<input class="form-control"  id="name" name="name" value="'.$q['login'].'" type="hidden"/>';
							?>
							<textarea class="form-control col-12" rows="3" id="text" placeholder="Введите ваш сообщение" name="text"></textarea>
						</div>
					</div>
				</form>
				<div class="col-sm-offset-4 col-sm-4 col-xs-offset-2  col-xs-7">
					<button  id="btnSend" class="submit btn btn-primary col-sm-12 col-xs-12 btn-lg">Отправить сообщение</button>
				</div>
			</div>
		</div>
		<div class="col-6">
			<div class="col-10 mx-auto">
				<h2 class="text-center mb-4">Welcome to BoLTaLKa, <?php echo $q['login']; ?></h2>
			</div>
			<div class="accordion pt-3" id="accordionExample">
			    <div class="card">
			      <div class="card-header" id="headingOne">
			        <h2 class="mb-0">
			        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			            Listen Music
			        </button>
			        </h2>
			      </div>

			    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
			        <div class="card-body pt-n5">
			  		    <?php 
			  		    $query = mysqli_query($connect, "SELECT * FROM boltalka_music");
			  		    for($i=0;$i<$query->num_rows;$i++){
							$obj = $query->fetch_assoc();
			  		    ?>
			  		    <div class="col-12 d-flex mb-4">
				  		    <video controls="" name="media" class="mt-n5" style="height:100px; width:300px"><source src="<?php echo $obj['musicFile']; ?>" type="audio/mpeg"></video>
				  		    <p class="ml-4 my-auto"> <span class="mr-2">-</span> <?php echo $obj['musicName']; ?></p>
			  		    </div>
			  		    <?php } ?>
			        </div>
			    </div>
			  </div>
			  <div class="card">
			    <div class="card-header" id="headingTwo">
			        <h2 class="mb-0">
			        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
			            Upload Music
			        </button>
			        </h2>
			    </div>
			    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
			      	<form action="insert.php" method="POST" enctype="multipart/form-data" class="card-body">
						<div class="col-6 mx-auto mb-5 my-auto">
							<input type="file" name="musicFile" class="mb-2">
							<?php 
								echo '<input type="hidden" name="id" value="'.$q['id'].'">'
							 ?>
							<input type="text" name="musicName" class="mb-2" placeholder="Название песни">
							<button class="btn btn-primary" type="submit">
								Upload music
							</button>
						</div>
					</form>
			    </div>
			  </div>
			  <div class="card">
			    <div class="card-header" id="headingThree">
			      <h2 class="mb-0">
			        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
			          Change BG
			        </button>
			      </h2>
			    </div>
			    <div id="collapseThree" class="collapse pb-2" aria-labelledby="headingThree" data-parent="#accordionExample">
			    	<div class="col-12 d-flex mb-1 mt-2">
			    		<div class="col-3 mx-auto"><img src="img/f001.jpg" class="w-100" id="1"></div>
			    		<div class="col-3 mx-auto"><img src="img/f002.jpg" class="w-100" id="2"></div>
			    		<div class="col-3 mx-auto"><img src="img/f003.jpg" class="w-100" id="3"></div>
			    	</div>
			    	<div class="col-12 d-flex mb-1">
			    		<div class="col-3 mx-auto"><img src="img/f004.jpg" class="w-100" id="4"></div>
			    		<div class="col-3 mx-auto"><img src="img/f005.jpg" class="w-100" id="5"></div>
			    		<div class="col-3 mx-auto"><img src="img/f006.jpg" class="w-100" id="6"></div>
			    	</div>
			    	<div class="col-12 d-flex mb-1">
			    		<div class="col-3 mx-auto"><img src="img/f007.jpg" class="w-100" id="7"></div>
			    		<div class="col-3 mx-auto"><img src="img/f008.jpg" class="w-100" id="8"></div>
			    		<div class="col-3 mx-auto"><img src="img/f009.jpg" class="w-100" id="9"></div>
			    	</div>
			    	<div class="col-12">
			    		<div class="col-3 mx-auto"><img src="img/f010.jpg" class="w-100" id="10"></div>
			    	</div>
			    </div>
			  </div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var body = document.querySelector("body");
		var bg1 = document.getElementById("1");
		var bg2 = document.getElementById("2");
		var bg3 = document.getElementById("3");
		var bg4 = document.getElementById("4");
		var bg5 = document.getElementById("5");
		var bg6 = document.getElementById("6");
		var bg7 = document.getElementById("7");
		var bg8 = document.getElementById("8");
		var bg9 = document.getElementById("9");
		var bg10 = document.getElementById("10");
		bg1.onclick = function(){
			body.style.backgroundImage = "url(img/f001.jpg)";
		}
		bg2.onclick = function(){
			body.style.backgroundImage = "url(img/f002.jpg)";
		}
		bg3.onclick = function(){
			body.style.backgroundImage = "url(img/f003.jpg)";
		}
		bg4.onclick = function(){
			body.style.backgroundImage = "url(img/f004.jpg)";
		}
		bg5.onclick = function(){
			body.style.backgroundImage = "url(img/f005.jpg)";
		}
		bg6.onclick = function(){
			body.style.backgroundImage = "url(img/f006.jpg)";
		}
		bg7.onclick = function(){
			body.style.backgroundImage = "url(img/f007.jpg)";
		}
		bg8.onclick = function(){
			body.style.backgroundImage = "url(img/f008.jpg)";
		}
		bg9.onclick = function(){
			body.style.backgroundImage = "url(img/f009.jpg)";
		}
		bg10.onclick = function(){
			body.style.backgroundImage = "url(img/f010.jpg)";
		}
	</script>
</body>
</html>

