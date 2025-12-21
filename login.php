<?php include("includes/header.php"); 
session_start();
?>

<link rel="stylesheet" href="public/public/style/style.css">
<link rel="stylesheet" href="public/public/style/login.css">
<div class="login-container">
  <h2 class="login-title">Login</h2>

  <form id="loginform" action="config/database.php" method="POST" >
    <div class="input-group">
      <input type="text" name="username" placeholder="Username" class="input-field" id="checkUsername" required>
    </div>

    <div class="input-group">
      <input type="password" name="password" placeholder="Password" class="input-field" id="checkPassword" required>
    </div>
    <input type="hidden" name="formType" value="login">
    <button type="submit" class="login-button">Log In</button>
  </form>

  <p class="signup-text">
    Don’t have an account? <a href="register.php">Sign Up</a>
  </p>
  <div class="logingerrorcontaienr" style="color: red;"> 
    <?=isset($_SESSION["LoginErros"]) ? $_SESSION["LoginErros"] : " "  ;
    unset($_SESSION["LoginErros"]);
    ?> 
  </div>
</div>


<script src="public/public/js/login.js"></script>
</body>
</html>


