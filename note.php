<?php include("includes/headerregistred.php") ?>
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
   


    <div class="notes-grid">
        <!-- Example Note Card -->
        <div class="note-card">
            <h3 class="note-title">Study English</h3>

            <p class="note-content">
                Practice speaking for 20 minutes every morning, listen to a short podcast Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati exercitationem temporibus, nam velit repudiandae, deserunt architecto dolorem perferendis quibusdam veritatis expedita nulla iusto est dolore modi quam accusamus et. Deleniti?
            </p>

            <p class="note-stars">⭐⭐⭐⭐⭐</p>
            <p class="note-date">Created: 10/12/2025</p>
            <p class="note-theme">Theme: Productivity</p>

            <div class="note-actions">
                <button class="view-btn">View</button>
                <button class="modify-btn">Modify</button>
                <button class="delete-btn">Delete</button>
            </div>
        </div>
    </div>
    <div class="notes-grid">
        <!-- Example Note Card -->
        <div class="note-card">
            <h3 class="note-title">Study English</h3>

            <p class="note-content">
                Practice speaking for 20 minutes every morning, listen to a short podcast…
            </p>

            <p class="note-stars">⭐⭐⭐⭐⭐</p>
            <p class="note-date">Created: 10/12/2025</p>
            <p class="note-theme">Theme: Productivity</p>

            <div class="note-actions">
                <button class="view-btn">View</button>
                <button class="modify-btn">Modify</button>
                <button class="delete-btn">Delete</button>
            </div>
        </div>
    </div>
    <div class="notes-grid">
        <!-- Example Note Card -->
        <div class="note-card">
            <h3 class="note-title">Study English</h3>

            <p class="note-content">
                Practice speaking for 20 minutes every morning, listen to a short podcast…
            </p>

            <p class="note-stars">⭐⭐⭐⭐⭐</p>
            <p class="note-date">Created: 10/12/2025</p>
            <p class="note-theme">Theme: Productivity</p>

            <div class="note-actions">
                <button class="view-btn">View</button>
                <button class="modify-btn">Modify</button>
                <button class="delete-btn">Delete</button>
            </div>
        </div>
    </div>
    <div class="notes-grid">
        <!-- Example Note Card -->
        <div class="note-card">
            <h3 class="note-title">Study English</h3>

            <p class="note-content">
                Practice speaking for 20 minutes every morning, listen to a short podcast…
            </p>

            <p class="note-stars">⭐⭐⭐⭐⭐</p>
            <p class="note-date">Created: 10/12/2025</p>
            <p class="note-theme">Theme: Productivity</p>

            <div class="note-actions">
                <button class="view-btn">View</button>
                <button class="modify-btn">Modify</button>
                <button class="delete-btn">Delete</button>
            </div>
        </div>
    </div>
</section>



<script src="public/public/js/note.js">
  
</script>


</body>
</html>