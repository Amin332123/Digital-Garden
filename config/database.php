<?php 
session_start();
include("db_connect.php");
$_SESSION['checker'] = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['formType'] === 'signup') {
    $_SESSION['checker'] = false;
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
             $sqll = "select createdDate from users where userName = '$username' ";
             $sqlll = "select id from users where userName = '$username'";
             $id = $conn->query($sqlll)->fetch_assoc()['id'];
             $_SESSION['id'] = $id;
             $createdDate = $conn->query($sqll)->fetch_assoc()['createdDate'];
             $_SESSION['createddDate'] = $createdDate;
             $_SESSION['userName'] = $username;
             header("Location: http://digitalgarden.test/dashboard.php");
             break;
        }

    }
    if ( !$userfound ) { 
        echo "<script>  alert('not good') </script>";
        
    }
    exit();
} 
$ViewNotesAction = isset($_GET['action']) ? $_GET['action'] : "";

if ($ViewNotesAction == "notes") {
$themeId = $_GET['themeid'];
$sqlNote = "select themeName , notes.id , title, importance, notes.createdDate , content from notes , themes where associatedThemeId = $themeId and themes.id = $themeId" ;
$result = $conn->query($sqlNote);
$Notes = [];
while ($row = $result->fetch_assoc()) {
$Notes[] = $row;
}
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['formType'] === 'newtheme') {
    $themeName = $_POST['themeName'];
    $backgroundColor = $_POST['backgrounfColor'];
    $maxNotes = $_POST['maxNotes'];
    $userId = $_SESSION['id'];
    $sqlCreateNewTheme = "INSERT into themes ( themeName ,  bColor , notesNumber , userId) 
    values ( '$themeName' ,  '$backgroundColor' , $maxNotes , $userId  ) " ; 
    $conn->query($sqlCreateNewTheme);
    header("Location: http://digitalgarden.test/theme.php"); 
    exit();
}
    


?>