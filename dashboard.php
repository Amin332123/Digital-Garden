
<?php include("includes/headerregistred.php") ;
if (empty($_SESSION['id'])) {
    header("Location: http://digitalgarden.test/login.php");
}
?>
<link rel="stylesheet" href="public/public/style/dashboard.css">
<link rel="stylesheet" href="public/public/style/style.css">
<section class="user-dashboard">
  <h1 class="user-name" id="userRegisteredName">Welcome, 
  <?php session_start(); 
  
  if ($_SESSION['checker'] == false) {
    echo " " .  $_SESSION['fullname'];
  } else {
    echo " " . $_SESSION['userName'];
  }
  
  
  
  ?>
  👋</h1>

  <p class="user-info">
    Account Created: <span id="createdDate">
    <?php 



    if ($_SESSION['checker'] == false) {
        echo " " . $_SESSION['createDate'];
    } else {
        echo " " . $_SESSION['createddDate'];
    }  
    
    
    
    ?>



    </span>
  </p>

  <p class="user-info">
    Session Login Time: <span> <?php echo " " . date("H:i:s") ?></span>
  </p>

  <a href="theme.php"><button class="view-themes-btn" id="themebtn" >View Themes</button></a>
</section>
<script src="public/public/js/theme.js"></script>
<?php include("includes/footer.php") ?>







