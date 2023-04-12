<?php 

// متصل بقاعدة البيانات 

$conn = new PDO("mysql:host=localhost;dbname=db_name", "db_user", "db_password"); 

if(isset($_POST['submit'])){ 
	
	$name = $_POST['name']; 
	$email = $_POST['email']; 
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
	
	$sql = "INSERT INTO users (name, email, password) 
	  VALUES (:name, :email, :password)"; 
	
	$stmt = $conn->prepare($sql); 
	
	$stmt->execute([ 
	  ':name' => $name, 
	  ':email' => $email, 
	  ':password' => $password 
	]); 
	
	header("Location: login.php"); 
} 

?> 

<form method="post"> 
	
	<input type="text" name="name"> 
	<input type="email" name="email"> 
	<input type="password" name="password"> 
	
	<button name="submit" type="submit">تسجيل</button> 
</form> 