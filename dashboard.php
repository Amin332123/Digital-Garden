<?php include("includes/headerregistred.php") ?>
<link rel="stylesheet" href="public/public/style/dashboard.css">
<link rel="stylesheet" href="public/public/style/style.css">
<section class="user-dashboard">
  <h1 class="user-name" id="userRegisteredName">Welcome, 
  <?php session_start(); echo " " .  $_SESSION['fullname'] ?>
  👋</h1>

  <p class="user-info">
    Account Created: <span id="createdDate">
    <?php 



    if ($_SESSION['checker'] == false) 
    {echo " " . $_SESSION['createDate'];} 
    else {echo " " . $_SESSION['createddDate'];}  ?>



    </span>
  </p>

  <p class="user-info">
    Session Login Time: <span> <?php echo " " . $_SESSION['logintime'] ?></span>
  </p>

  <a href="theme.php"><button class="view-themes-btn" id="">View Themes</button></a>
</section>

<?php include("includes/footer.php") ?>







