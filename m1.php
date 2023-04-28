<html>


<head>
<link rel="stylesheet" href="sas.css">


</head>



<body>
    

    
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="mshro33";
$con=new mysqli($servername,$username,$password,$dbname);
$sql = "select * from services";
$result =mysqli_query($con,$sql);

while($fetch=mysqli_fetch_object($result)){
    echo("<div class='services'>");
    echo("<img src='$fetch->path' alt='Girl in a jacket'>");
    echo("<p>$fetch->name_of_the_service</p>");
    echo("<p class='price'>$fetch->price</p>");
    echo("<p class='city'>$fetch->city</p>");
    echo("</div>");
}


?>

    
    
    
    
    
    
    
    
    
    
</body>


</html>