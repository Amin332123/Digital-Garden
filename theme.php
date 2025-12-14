<?php
  
   include("includes/headerregistred.php");
   include("config/database.php");
   $sqlUsers = "select themes.id , themeName , themes.notesNumber , themes.bColor from themes where userId =  '{$_SESSION['id']}' ";
   $result = $conn->query($sqlUsers);
   $users = [];
   while ($row = $result->fetch_assoc())  {
    $users[] = $row;       
   }
    
  

?>
<link rel="stylesheet" href="public/public/style/theme.css">
<link rel="stylesheet" href="public/public/style/style.css">
<div class="create-btncontainer">
    <button class="create-theme-btn" id="createTheme">Create New Theme</button>
</div>
<div class="modal-overlay" id="themeModal">
    <div class="modal-box">
        <h2 class="modal-title">Theme Settings</h2>

        <form action="config/database.php" method="post" id="themeForm">
            <div class="modal-input-group">
                <label>Theme Name</label>
                <input type="text" placeholder="Enter theme name" name="themeName" class="modal-input" id="themename">
            </div>

            
            <div class="input-group">
                <label for="maxNotes">Max Notes</label>
                <input type="number" id="maxNotes" name="maxNotes" placeholder="Enter max number of notes">
            </div>
            
                <span>Background Color  : </span>
                <input type="color" value="#09ff00" name="backgrounfColor" id="bgColor">
           

            <div class="modal-actions">
                <input type="hidden" name="formType" value="newtheme">
                <button type="submit" class="create-btn">Create</button>
                <button type="submit" style="display:none;" class="modify-btn">Modify</button>
            </div>
            <div id="errorContainer" style="text-align: center;"></div>
        </form>

        <span class="close-modal" id="closeModal">✕</span>
    </div>
</div>
<section class="themes-section" id="themesContainer">
    <?php
    foreach ($users as $user) {
        ?>
        <div class="themes-grid">
    <div class="theme-card">
        <h2 class="theme-title"><span>Title </span> : <?= $user['themeName'] ?></h2>
        <p class="theme-color">Theme Color : <?= $user['bColor'] ?></p>
        <p class="theme-notes">Max Notes: <?= $user['notesNumber'] ?></p>

        <div class="theme-actions">
            <a href="note.php?action=notes&themeid=<?= $user['id'] ?>"><button class="view-btn">View Notes</button></a>
            <button class="modify-btn">Modify</button>
            <button class="delete-btn">Delete</button>
        </div>
    </div>
</div> <?php 
    }
    ?> 
</section>
<script src="public/public/js/theme.js"></script>
</body>
</html>