<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>بحث عن الخدمات</title>
	<link rel="stylesheet" href="search.css">
</head>
<body>
	<div class="container">
		<h1>بحث عن الخدمات</h1>
		<form method="post" action="">
			<label for="search">يرجى إدخال اسم الخدمة:</label>
			<input type="text" id="search" name="search">
			<input type="submit" value="البحث">
		</form>
		<?php
			// توصيل قاعدة البيانات
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "sss";
			$conn = new mysqli($servername, $username, $password, $dbname);

			if($conn->connect_error) {
				die("فشل الاتصال: " . $conn->connect_error);
			}

			// معالجة البحث عن الخدمة
			if(isset($_POST['search'])) {
				$search_term = mysqli_real_escape_string($conn, $_POST['search']);
				$sql = "SELECT * FROM services WHERE name LIKE '%$search_term%'";
				$result = mysqli_query($conn, $sql);

				if(mysqli_num_rows($result) > 0) {
					// عرض الخدمات المطابقة
					echo "<h2>الخدمات المتاحة:</h2>";
					while($row = mysqli_fetch_assoc($result)) {
						echo "<p>".$row['name']." - ".$row['description']."</p>";
						if($row['available'] == 1) {
							echo "<form method='post' action=''>";
							echo "<input type='hidden' name='service_id' value='".$row['id']."'>";
							echo "<label for='provider'>يرجى اختيار مقدم الخدمة:</label>";
							echo "<select id='provider' name='provider'>";
							$sql2 = "SELECT * FROM providers WHERE service_id=".$row['id'];
							$result2 = mysqli_query($conn, $sql2);
							while($row2 = mysqli_fetch_assoc($result2)) {
								echo "<option value='".$row2['id']."'>".$row2['name']."</option>";
							}
							echo "</select>";
							echo "<input type='submit' value='طلب الخدمة'>";
							echo "</form>";
						} else {
							echo "<p>الخدمة غير متاحة حالياً</p>";
						}
					}
				} else {
					// عرض نموذج الطلب
					echo "<h2>الخدمة غير متاحة</h2>";
					echo "<p>يرجى تقديم طلب للحصول على الخدمة:</p>";
					echo "<form method='post' action=''>";
					echo "<input type='hidden' name='service_name' value='$search_term'>";
					echo "<label for='name'>الاسم:</label>";
					echo "<input type='text' id='name' name='name' required><br>";
					echo "<label for='email'>البريد الإلكتروني:</label>";
					echo "<input type='email' id='email' name='email' required><br>";
					echo "<label for='phone'>رقم الهاتف:</label>";
					echo "<input type='text' id='phone' name='phone' required><br>";
					echo "<label for='provider'>يفضل مقدم الخدمة:</label>";
					echo "<select id='provider' name='provider'>";
					$sql3 = "SELECT * FROM providers WHERE service_id IS NULL";
					$result3 = mysqli_query($conn, $sql3);
					while($row3 = mysqli_fetch_assoc($result3)) {
						echo "<option value='".$row3['id']."'>".$row3['name']."</option>";
					}
					echo "</select>";
					echo "<input type='submit' value='طلب الخدمة'>";
					echo "</form>";
				}
			}

			// معالجة نموذج الطلب
			if(isset($_POST['service_name']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone'])) {
				$name = mysqli_real_escape_string($conn, $_POST['name']);
				$email = mysqli_real_escape_string($conn, $_POST['email']);
				$phone = mysqli_real_escape_string($conn, $_POST['phone']);
				$provider_id = mysqli_real_escape_string($conn, $_POST['provider']);
				$service_name = mysqli_real_escape_string($conn, $_POST['service_name']);
				$sql4 = "INSERT INTO requests (service_name, name, email, phone, provider_id) VALUES ('$service_name', '$name', '$email', '$phone', '$provider_id')";
				if(mysqli_query($conn, $sql4)) {
					echo "<p>تم تقديم طلبك بنجاح. سنقوم بالاتصال بك قريباً.</p>";
				} else {
					echo "<p>حدث خطأ ما في تقديم الطلب. يرجى المحاولة مرة أخرى.</p>";
				}
			}

			// إنهاء الاتصال بقاعدة البيانات
			mysqli_close($conn);
		?>
	</div>
</body>
</html>
