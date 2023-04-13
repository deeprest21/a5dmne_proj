<html>

<head>
<link rel="stylesheet" href="login.css">
</head>


<body>
<style>body{
    text-align: center;
    position: absolute;
    top: 50%;
    transform: translate(0, -50%);
    left: 44%;
  margin: -25px 0 0 -25px;
}
    
    </style>

    <form method="post" action="#">

        username:
      <br><input type="text" name="user"><br>
      
      email:
      <br><input type="text" name="email"><br>

      password:
     <br><input type="text" name="password"><br>

     <input type="submit" name="signup" value="signup">
     <input type="submit" name="login" value="login">

    </form>


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
//login>>
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












// session_start();
// if(isset($_POST["login"]))

// if(mysqli_num_rows($result)>0)
// { 
//     // $_session['login_user']=$user;
//     header("loction:weclome.php");

// }
// else
// echo("username or password r valied");

// }
// mysqli_close($conn);


//////////////////////////////////////////////

// if()
// if(mysqli_num_rows($result)=1)
// print("login done!");

// else
// print("login failed");

// // else
// // echo("conn failed!");

// }
// // session_start();
// // if(isset($_POST["login"]))

// // if(mysqli_num_rows($result)>0)
// // { 
// //     // $_session['login_user']=$user;
// //     header("loction:weclome.php");

// // }
// // else
// // echo("username or password r valied");

// // }
// // mysqli_close($conn);
?>

</html>
</body>
