<?php 

include("includes/headerregistred.php");
include("config/database.php");






?>
<link rel="stylesheet" href="public/public/style/note.css">

<link rel="stylesheet" href="public/public/style/style.css">



<div class="note-modal" id="notemodal">
  <div class="note-modal-content">
     <span class="close-modal" id="closeNoteModal">✕</span>
    <h2 id="notemodaltitle"> Note</h2>
   
    <form action="#">
        <label>Title</label>
    <input type="text" placeholder="Enter note title">

    <label>Importance (Stars)</label>
    <input type="number" min="1" max="5" placeholder="1 - 5">

    <label>Content</label>
    <textarea class="note-textarea" maxlength="600" placeholder="Max 100 words"></textarea>
    <small class="word-counter">0 / 100 words</small>

    <div class="btns">
      <!-- <button class="modify-btn">Modify</button> -->
      <button class="create-btn" type="submit">Create</button>
    </div>
    </form>
    
  </div>
</div>












<div class="create-btncontainer">
    

<button class="create-theme-btn" id="createNote">Create New Note</button>

</div>



<section class="notes-section">
   

    
    <?php 
      foreach($_SESSION['notes'] as $Note) {
        
        ?>
      
    
       <div class="notes-grid">
        <div class="note-card">
            <h3 class="note-title">Title : <?php echo $Note["title"] ?></h3>

            <p class="note-content">
               <h4>Content : </h4>
             <?php echo $Note["content"] ?>
            </p>

            <p class="note-stars">importance : <?php echo $Note["importance"] ?> / 5</p>
            <p class="note-date">Created Date : <?php echo  $Note["createdDate"]?></p>
            <p class="note-theme">Assosiated Theme<?php echo  $Note["themeName"] ?></p>

            <div class="note-actions">
                <button class="view-btn">View Content</button>
                <button class="modify-btn">Modify</button>
                <button class="delete-btn">Delete</button>
            </div>
        </div>
    </div> <?php } ?>
   
   
    
</section>



<script src="public/public/js/note.js">
  
</script>


</body>
</html>