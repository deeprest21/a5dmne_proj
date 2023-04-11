

<?php
$servername="localhost";
$username="root";
$password="";
$dbname="login";
$conn=new mysqli($servername,$username,$password,$dbname);
////////////////////
$user=$_POST["user"];
$email=$_POST["email"];
$pass=$_POST["password"];

$sql="insert into log(user,email,password)VALUES('$user','$email','$pass')";
//
$check="select * from log where user='$user' and password='$pass'";
$aw=mysqli_query($conn,$check);
///
$sq="select * from log where user='$user'";
$checked=mysqli_query($conn,$sq);
/////////////////
//signup >>>>>>>>>>>>>>>>
if(isset($_POST["signup"])){

if(empty($user))
print("entre ur username");

elseif(empty($email))
print("enter ur email");

elseif(empty($pass))
print("entre ur password");


elseif(mysqli_num_rows($checked)!=0){
print("the username is already taken");
}

else{
    $result=mysqli_query($conn,$sql);
    print("signup done!");
}
//////////////////////////////////////////////////////////
}
//login>>>>>>>>>
if(isset($_POST["login"])){

if(empty($user))
print("entre ur username");

elseif(empty($email))
print("enter ur email");

    elseif(empty($pass))
    print("entre ur password");
    
    
    elseif(mysqli_num_rows($checked)==0){
    print("username not found!");
    }
    
    elseif(mysqli_num_rows($aw)==0)
    print("the password is incorrect");

    else{
        print("login done!");
    }
    
}

?>
