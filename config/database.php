<?php 
session_start();
include "../db_connect.php";
$_SESSION['checker'] = true;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['formType'] === 'signup') {
    $_SESSION["checker"] = false;
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['fullname'] = $fullname;
    $createdDate = date("Y-m-d");
    $_SESSION['createDate'] = $createdDate;
    $_SESSION['logintime'] = date("h:i A");
    $sql = "INSERT INTO users (name, userName, passsword, createdDate) 
            VALUES ('$fullname' , '$username','$password','$createdDate')";
    $conn->query($sql);
    header("Location: http://digitalgarden.test/dashboard.php"); 
    exit();
}



if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['formType'] === 'login')
{
    
    $sql = "select userName, passsword from users";
    $result = $conn->query($sql);
    

    
    $userfound = false;
    $username = $_POST["username"];
    $password = $_POST["password"];
     while ($row = $result->fetch_assoc()) {
        if ( $row['userName'] === $username && $row['passsword'] === $password  ) {
             echo "<script>  alert('good') </script>";
             $userfound = true;
             $sql1 = "select createdDate from users where userName = '$username' ";
             $value = $conn->query($sql)->fetch_assoc()['createdDate'];
             $_SESSION['createddDate'] = $value;
             $_SESSION['userName'] = $username;
             header("Location: http://digitalgarden.test/dashboard.php");
             break;
        }

    }
    if ( !$userfound ) { 
        echo "<script>  alert('not good') </script>";
        
    }
  
}
?>