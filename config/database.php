<?php

session_start();
include("db_connect.php");
if (isset($_GET["logout"])) {
    session_unset();
    session_destroy();
    header("Location: http://digitalgarden.test/login.php");
}
// if(isset($_GET["logout"]) && $_GET["logout"] === "true" ) {
//     session_unset();
//     session_destroy();
//     header("Location: http://digitalgarden.test/index.php");
// }


$_SESSION['checker'] = true;
$formType = $_POST['formType'] ?? '';

// $ViewNotesAction = isset($_GET['action']) ? $_GET['action'] : "";


if ($_SERVER['REQUEST_METHOD'] === 'POST' && $formType != '' && $formType === 'signup') {
    signUpNewUser($conn);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $formType != '' && $formType === 'newtheme') {
    createNewTheme($conn);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $formType != '' && $formType === 'login') {
    loginInUser($conn);
}
if (isset($_POST["viewnote"])) {
    displayNotes($conn);
}
function loginInUser($conn)
{
    $_SESSION["LoginErros"] = "";
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "select * from users where userName = '$username'";
    $result = $conn->query($sql);
    $userfound = false;
    
    while ($row = $result->fetch_assoc()) {
        // if ($row['passsword'] != $password) {
        //     $_SESSION["LoginErros"] = "Password or Username is not correct";
        //      header("Location: http://digitalgarden.test/login.php");
        // }
        if ($row['passsword'] === $password) {
            $userfound = true;
            $id = $row['id'] ;
            $_SESSION['id'] = $id;
            $createdDate = $row['createdDate'];
            $_SESSION['createddDate'] = $createdDate;
            $_SESSION['userName'] = $username;
            header("Location: http://digitalgarden.test/dashboard.php");
            break;
        }
    }
    if (!$userfound) {
        $_SESSION["LoginErros"] = "No user found";
        header("Location: http://digitalgarden.test/login.php");
    }
    exit();
}
function displayNotes($conn)
{
    
    $themeId = $_POST["theme_id"];
    $_SESSION['AssociatedThemeId'] = $themeId;
    header("Location: http://digitalgarden.test/note.php");
 
}
function createNewTheme($conn)
{


    $themeName = $_POST['themeName'] ?? '';
    $backgroundColor = $_POST['backgroundColor'] ?? '';
    $maxNotes = (int)($_POST['maxNotes'] ?? 0);

    $formType = $_POST['formType'] ?? '';
    $submiting = $_POST['submiting'] ?? '';

    $userId = $_SESSION['id'];
    var_dump($_POST);
    // MODIFY
    if ($formType === 'newtheme' && $submiting === 'modify') {

        if (empty($_POST['themeId'])) {
            die("Theme ID missing");
        }

        $themeId = (int)$_POST['themeId'];
        $queryId = "SELECT id from themes where themeName";
        $sql = "UPDATE themes
                SET themeName = ?, bColor = ?, notesNumber = ?
                WHERE id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "ssiii",
            $themeName,
            $backgroundColor,
            $maxNotes,
            $themeId
        );
        $stmt->execute();
        $stmt->close();
    }
    // CREATE
    else {

        $sql = "INSERT INTO themes (themeName, bColor, notesNumber, userId)
                VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "ssii",
            $themeName,
            $backgroundColor,
            $maxNotes,
            $userId
        );
        $stmt->execute();
        $stmt->close();
    }

    header("Location: http://digitalgarden.test/theme.php");
    exit();
}

function signUpNewUser($conn)
{

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
    $sqliduser = "SELECT id from users where userName = '$username' ";
    $userId = $conn->query($sqliduser)->fetch_assoc();
    $_SESSION['id'] =  $userId['id'];
    header("Location: http://digitalgarden.test/dashboard.php");
    exit();
}
// $notetype = $_POST["notetype"] ?? "";
if (isset($_POST["notetype"]) && $_POST["notetype"] == "createnote") {

    $notetitle = $_POST["noteTitle"];
    $noteImportance = (int) $_POST["noteImportance"];
    $noteContent = $_POST["noteContent"];
    $NoteCreatedDate = date("Y-m-d");
    $associatedId =  $_SESSION["AssociatedThemeId"];
    $stm = $conn->prepare(
        "INSERT INTO notes (title, importance, createdDate, associatedThemeId, content)
         VALUES (?, ?, ?, ?, ?)"
    );
    $stm->bind_param(
        "sisis",
        $notetitle,
        $noteImportance,
        $NoteCreatedDate,
        $associatedId,
        $noteContent
    );
    $stm->execute();

    $stm->close();

    // echo "<script></script>"
    // displayNotes($conn);
    header("Location: http://digitalgarden.test/note.php");
    
    exit;
}
if (isset($_GET["delete"])) {
    deleteThemeInDatabaseById($conn);
}
function deleteThemeInDatabaseById($conn)
{
    try {
        $themeidd = $_GET["delete"];

        $deleteNotes = "delete from notes where associatedThemeId = '$themeidd' ";
        $conn->query($deleteNotes);
        $query = "delete from themes where id = '$themeidd' ";
        // $stmt = $conn->prepare($query);
        // $stmt->bindParam('id',$_GET["delete"]);
        // $stmt->execute();
        $conn->query($query);
        header("Location: http://digitalgarden.test/theme.php");
    } catch (\Throwable $th) {
        var_dump($th->getMessage());
    }
}



if (isset($_POST["action"]) && $_POST["action"] = "modify") {
    $_SESSION["themeidd"] = $_POST["theMeID"];
    $clickedthemeid = $_POST["theMeID"];
    $query = "select * from themes where id = '$clickedthemeid' ";
    $res =  $conn->query($query)->fetch_assoc();
    if ($res) {
        $_SESSION["themetitle"] = $res["themeName"];
        $_SESSION["thememaxNotes"] = $res["notesNumber"];
        $_SESSION["backgroundcolor"] = $res["bColor"];
    }
    header("Location: http://digitalgarden.test/modifypage.php");
}

if (isset($_POST["actionformodification"]) && $_POST["actionformodification"] ==  "Update") {

    updateThemeInDatabase($conn);
}
function updateThemeInDatabase($conn)
{
    try {

        $id = $_SESSION["themeidd"];
        $title = $_POST["themeName"];
        // $description = $_POST["description"];
        $notes = $_POST["maxNotes"];

        $color = $_POST["backgroundColor"];
        $query = "update themes set themeName = '$title' , notesNumber = '$notes' , bColor = '$color'  where id = '$id'";
        $conn->query($query);
        header("Location: http://digitalgarden.test/theme.php");
    } catch (\Throwable $th) {
        var_dump($th->getMessage());
    }
}


if (isset($_POST["noteid"])) {

    // $themeidd =  $_SESSION["themeidd"];
    $id = $_POST["noteid"];
    $querytwo = "select notes.associatedThemeId from notes where notes.id = '$id' ";
    $getthemeid = $conn->query($querytwo)->fetch_assoc(); 
    $themeid = $getthemeid["associatedThemeId"];
    $query = "delete from notes where id = '$id' ";
    $conn->query($query);
    header("Location: http://digitalgarden.test/note.php");
}
if (isset($_POST["noteidmodify"])) {
    // var_dump($_POST["noteidmodify"]);
    $noteId = $_POST["noteidmodify"];
    $query = "SELECT * from notes where notes.id = '$noteId' ";
    $res = $conn->query($query)->fetch_assoc();

    if ($res) {

        $_SESSION["noteidd"] = $res["id"];
        $_SESSION["notetitle"] = $res["title"];
        $_SESSION["noteContent"] = $res["content"];
        $_SESSION["importance"] = $res["importance"];

        header("Location: http://digitalgarden.test/modifynoteform.php");
    }
}

if (isset($_POST["modifing"]) && $_POST["modifing"] == "modifidnote") {    
    
    $noteidd = $_POST["noteidd"];
    $notetitle = $_POST["noteTitle"];
    $noteimportance = $_POST["noteImportance"];
    $noteContent = $_POST["noteContent"];
    $createdDate = date("Y-m-d"); 
    $querytwo = "select notes.associatedThemeId from notes where notes.id = '$noteidd' ";
    $getthemeid = $conn->query($querytwo)->fetch_assoc();    
    $query = "UPDATE notes set title = '$notetitle' , content = '$noteContent' , importance = '$noteimportance' , createdDate = '$createdDate'  where notes.id = '$noteidd'  ";
    $conn->query($query);  

    $themeid = $getthemeid["associatedThemeId"];
    
    // var_dump($getthemeid["associatedThemeId"] );
    header("Location: http://digitalgarden.test/note.php");
}



