<?php 

// متصل بقاعدة البيانات 

$conn = new PDO("mysql:host=localhost;dbname=db_name", "db_user", "db_password"); 

if(isset($_POST['login'])){ 
	
	$username = $_POST['username']; 
	$password = $_POST['password']; 
	
	$sql = "SELECT * FROM users WHERE username = ?"; 
	$stmt = $conn->prepare($sql); 
	$stmt->execute([$username]); 
	
	$user = $stmt->fetch(); 
	
	if($user && password_verify($password, $user['password'])){ 
		
		session_start(); 
		$_SESSION['logged_in'] = TRUE; 
		$_SESSION['name'] = $user['name']; 
		
	} else { 
		
		header("Location: login.php"); 
		
	} 
} 
?> 

<form method="post"> 
	
	<input type="text" name="username"> 
	<input type="password" name="password"> 
	
	<button name="login" type="submit">تسجيل الدخول</button> 
</form> 