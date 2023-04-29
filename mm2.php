<!DOCTYPE html>
<html>
<head>
	<title>إضافة خدمة</title>
</head>
<body>
	<h1>إضافة خدمة جديدة:</h1>
	<form method="post" enctype="multipart/form-data">
		<label for="name">اسم الخدمة:</label>
		<input type="text" id="name" name="name" required><br><br>

		<label for="price">سعر الخدمة:</label>
		<input type="number" id="price" name="price" required><br><br>

		<label for="city">المدينة:</label>
		<input type="text" id="city" name="city" required><br><br>

		<label for="image">صورة الخدمة:</label>
		<input type="file" id="image" name="image"><br><br>

		<input type="submit" name="submit" value="إضافة الخدمة">
	</form>

	<?php
		// الاتصال بقاعدة البيانات
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "sss";

		$conn = mysqli_connect($servername, $username, $password, $dbname);

		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		// تعريف متغير path
		$path = "";

		// إذا تم النقر على زر "إضافة الخدمة"
		if(isset($_POST['submit'])) {
			$name = $_POST['name'];
			$price = $_POST['price'];
			$city = $_POST['city'];

			// إذا تم تحميل ملف الصورة بنجاح
			if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
				// تخزين الملف المحمل في مجلد "uploads/"
				$target_dir = "uploads/";
				$target_file = $target_dir . basename($_FILES["image"]["name"]);
				if(move_uploaded_file($_FILES["path"]["name_of_the_service"], $target_file)) {
					$path = $target_file;
				}
			}

			// إدخال البيانات في قاعدة البيانات
			$sql = "INSERT INTO services (name_of_the_service, price, city, path) VALUES ('$name', '$price', '$city', '$path')";

			if (mysqli_query($conn, $sql)) {
			    echo "<p>تمت إضافة الخدمة بنجاح!</p>";
			} else {
			    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}

		mysqli_close($conn);
	?>
</body>
</html>
