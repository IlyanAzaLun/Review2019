<?php 
	require_once('connect.php');


	if(isset($_POST['submit'])){
	if(!empty($_POST['username']) && !empty($_POST['password'])){

		// echo $_POST['usename'] ." ". $_POST['password'];
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		
		$query = "select * from login where username = '{$username}' and password = '{$password}'";
		$result = @mysqli_query($dbc, $query);

		echo $username . ' ' . $password;

		if ($result){
			$_SESSION['username']=$username;
		}else{
			echo "Error Tidak Bisa Masuk, Username dan Password salah";
		}
	}
}
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Selamat datang di Bengkel</title>
	<link rel="stylesheet" href="<?php echo $base_url?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $base_url?>assets/css/main.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="<?php echo $base_url?>">System Bengkel</a>
			<div class="collapse navbar-collapse">
				<ul class="navbar-nav">
					<?php if(isset($_SESSION['username'])){?>
					<li class="navbar-item"><a class="nav-link" href="<?php echo $base_url?>customer.php">Customer</a></li>
					<li class="navbar-item"><a class="nav-link" href="<?php echo $base_url?>montir.php">Montir</a></li>
					<li class="navbar-item"><a class="nav-link" href="<?php echo $base_url?>logout.php">Logout</a></li>
					<?php } ?>
				</ul>
			</div>
	</nav>
	<div class ="connect">
		<div class="container">
			<?php if (!isset($_SESSION['username'])){?>
			<form action="<?php echo $base_url;?>" method='POST'>
				<div class="form-group">
					<label>Username</label>
					<input class="form-control" type="text" name="username">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input class="form-control" type="Password" name="password">
				</div>
				<div>
					<button class="form-control" type="submit" name="submit">Login</button>
				</div>
			</form>
			<?php } ?>
		</div>
	</div>	
	
</body>
</html>