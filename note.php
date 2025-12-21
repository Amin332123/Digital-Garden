<?php
// session_start();
include("includes/headerregistred.php");
include("config/database.php");


if (!isset($_SESSION['id'])) {
    header("Location: http://digitalgarden.test/login.php");
    exit;
}
//  displayNotes($conn);
$sqlNote = "select themeName , notes.id , title, importance, notes.createdDate , content from notes , themes where associatedThemeId = '{$_SESSION['AssociatedThemeId']}' and themes.id = '{$_SESSION['AssociatedThemeId']}' ";
$result = $conn->query($sqlNote);
$Notes = [];
while ($row = $result->fetch_assoc()) {
  $Notes[] = $row;
}






?>
<link rel="stylesheet" href="public/public/style/note.css">

<link rel="stylesheet" href="public/public/style/style.css">



<div class="note-modal" id="notemodal">
  <div class="note-modal-content">
    <span class="close-modal" id="closeNoteModal">✕</span>
    <h2 id="notemodaltitle"> Note</h2>

    <form action="config/database.php" id="NoteForm" method="POST">
      <label>Title</label>
      <input type="text" placeholder="Enter note title" id="noteTitle" name="noteTitle">

      <label>Importance (Stars)</label>
      <input type="number" min="0" max="5" placeholder="0 - 5" id="improtance" name="noteImportance">

      <label>Content</label>
      <textarea class="note-textarea" maxlength="600" placeholder="Max 100 words" id="content" name="noteContent"></textarea>
      <small class="word-counter">0 / 100 words</small>
      <input type="hidden" name="notetype" value="createnote">
      <div class="btns">
        <!-- <button class="modify-btn">Modify</button> -->
        <button type="submit" name="createNote" class="create-btn">Create</button>
      </div>
    </form>
    <div id="errorNoteContainer"></div>

  </div>
</div>












<div class="create-btncontainer">


  <button class="create-theme-btn" id="createNote">Create New Note</button>

</div>



<section class="notes-section">



  <?php
  foreach ($Notes as $Note) {

  ?>


    <div class="notes-grid">
      <div class="note-card">
        <h3 class="note-title">Title : <?php echo $Note["title"] ?></h3>

        <div class="notecontent">
          <h4 style="visibility: hidden;">Content : </h4>
          <div class="noteconnteent">
            <?php echo $Note["content"] ?>
          </div>
        </div>

        <p class="note-stars">importance : <?php
                                            for ($i = 0; $i < $Note["importance"]; $i++) {
                                              echo '<span class="star" >★</span>';
                                            } ?></p>
        <p class="note-date">Created Date : <?php echo  $Note["createdDate"] ?></p>
        <p class="note-theme">Assosiated Theme :<?php echo  $Note["themeName"] ?></p>

        <div class="note-actions">
          <button class="view-btn">View Content</button>
          <form action="config/database.php" method="POST">
            <button type="sumbit" class="modify-btn">Modify</button>
            <input type="hidden" name="noteidmodify" value="<?= $Note["id"] ?>">
          </form>
          <form action="config/database.php" method="POST">
            <button type="submit" class="delete-btn">Delete</button>
            <input type="hidden" name="noteid" value="<?= $Note["id"] ?>">
          </form>
        </div>
      </div>
    </div> <?php } ?>



</section>
<div id="modalOverlay" class="overlay">
  <div class="modal">
    <p class="contentContainer"></p>
    <button class="closeNoteContentBtn">Close</button>
  </div>
</div>

<script src="public/public/js/note.js" defer>

</script>


</body>

</html>