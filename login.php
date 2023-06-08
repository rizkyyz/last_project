<?php 
  session_start();

  if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_email'])) { 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login - Kelurahan Telaga Asih</title>
	<link rel="icon" href="https://bekasikab.go.id/uploads/images/pemkab-bekasi.ico">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<style>
	body {
    font-family: 'Roboto', sans-serif;
    font-size: 16px;
    font-weight: 300;
    color: #888;
    line-height: 30px;
    text-align: center;
    background-color: #337ab7;
	background: url("https://bekasikab.go.id/uploads/007/portal/img/city-lanscape.png") no-repeat center fixed;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
}

	h5 {
	font-size: 12px;
	color: #999;
	margin-top:0;
	text-transform:uppercase;
	}
	h2 {
		font-size: 25px;
    color: #0c83c5;
    margin-top: 5px;
    margin-bottom: -10px;
    font-weight: bold;
    text-transform: uppercase;
    text-shadow: 4px 4px 4px #000;
    -webkit-text-stroke: 1px #fff
	}
</style>
</head>
<body>
	  <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
	  	<form class="p-5 rounded shadow" 
	  	      action="auth.php"
	  	      method="post" 
	  	      style="width: 30rem">
			  <center><img src="https://dev.bekasikab.go.id/telagaasih/vendor/assets/img/logokab70x70.png" alt="" srcset=""></center>
	  		<h2 class="text-center">Kelurahan Telaga Asih</h2><br>
			<h5>JL. Telaga Asih (Imam Bonjol 2)<br>KECAMATAN CIKARANG BARAT<br>KABUPATEN BEKASI</h5>
			
	  		<?php if (isset($_GET['error'])) { ?>
	  		<div class="alert alert-danger" role="alert">
			  <?=htmlspecialchars($_GET['error'])?>
			</div>
		    <?php } ?>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" 
		           class="form-label">Email
		    </label>
		    <input type="email" 
		           name="email" 
		           value="<?php if(isset($_GET['email']))echo(htmlspecialchars($_GET['email'])) ?>" 
		           class="form-control" 
		           id="exampleInputEmail1" aria-describedby="emailHelp">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputPassword1" 
		           class="form-label">Password
		    </label>
		    <input type="password" 
		           class="form-control" 
		           name="password" 
		           id="exampleInputPassword1">
		  </div>
		  <button type="submit" 
		          class="btn btn-primary">LOGIN
		  </button>
		  <br><br>
		  <div class="container my-auto">
                    <div class="copyright text-center my-auto">
					<h5> &copy; Copyright <b>DISKOMINFOSANTIK KABUPATEN BEKASI</b></h5>
                    </div>
		</form>
	  </div>
			
</body>
</html>

<?php 
}else {
   header("Location: index.php");
}
 ?>
