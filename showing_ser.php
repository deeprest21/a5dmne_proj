<!DOCTYPE html>
<html>
<head>
	<title>عرض الخدمات</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}

		th, td {
			text-align: center;
			padding: 8px;
		}

		th {
			background-color: #f2f2f2;
			color: #333;
		}

		tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		img {
			max-width: 100px;
			max-height: 100px;
		}
	</style>
</head>
<body>
	<h1>الخدمات المقدمة:</h1>
	<?php
		// الاتصال بقاعدة البيانات
		$servername = "localhost";
		$db_username = "root";
		$db_password = "";
		$dbname = "sss";

		$conn = mysqli_connect($servername, $db_username, $db_password, $dbname);

		// التأكد من الاتصال بقاعدة البيانات
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// استعلام لاسترداد البيانات من جدول الخدمات
		$sql = "SELECT * FROM services";

		$result = mysqli_query($conn, $sql);

		// عرض البيانات في جدول
		if (mysqli_num_rows($result) > 0) {
			echo "<table><tr><th>اسم الخدمة</th><th>السعر</th><th>المدينة</th><th>الصورة</th></tr>";
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td style='font-weight: bold;'>" . $row["name_of_the_service"]. "</td><td>" . number_format($row["price"], 2) . " ر.س" . "</td><td>" . $row["city"]. "</td><td><img src='" . $row["path"] . "'></td></tr>";
			}
			echo "</table>";
		} else {
			echo "لا توجد خدمات متاحة حالياً.";
		}

		// إغلاق الاتصال بقاعدة البيانات
		mysqli_close($conn);
	?>
</body>
</html>
