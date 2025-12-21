
<?php session_start();
if (!isset($_SESSION['id'])) {
     header("Location: http://digitalgarden.test/login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Note Modal</title>

<style>
/* Modal overlay */
.note-modal {
  position: fixed;
  inset: 0;
  background: rgba(5, 12, 28, 0.85); /* dark blue overlay */
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 1000;
  font-family: Arial, sans-serif;
}

/* Modal box */
.note-modal-content {
  background: #0b1b34; /* dark blue */
  width: 420px;
  max-width: 90%;
  padding: 25px;
  border-radius: 14px;
  position: relative;
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.45);
  animation: fadeIn 0.25s ease-in-out;
  border: 1px solid #1e6f4f; /* dark green border */
}

/* Close button */
.close-modal {
  position: absolute;
  top: 15px;
  right: 18px;
  font-size: 18px;
  cursor: pointer;
  color: #9ca3af;
  transition: color 0.2s;
}

.close-modal:hover {
  color: #ffffff;
}

/* Title */
#notemodaltitle {
  text-align: center;
  margin-bottom: 20px;
  color: #e5e7eb;
}

/* Form */
#NoteForm {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

/* Labels */
#NoteForm label {
  font-size: 14px;
  font-weight: 600;
  color: #d1d5db;
}

/* Inputs */
#NoteForm input[type="text"],
#NoteForm input[type="number"],
.note-textarea {
  padding: 10px 12px;
  border-radius: 8px;
  border: 1px solid #1e6f4f; /* dark green */
  font-size: 14px;
  outline: none;
  background: #071429; /* darker blue */
  color: #ffffff;
  transition: border 0.2s, box-shadow 0.2s;
}

#NoteForm input:focus,
.note-textarea:focus {
  border-color: #2f8f6b; /* lighter dark green */
  box-shadow: 0 0 0 2px rgba(30, 111, 79, 0.35);
}

/* Textarea */
.note-textarea {
  resize: none;
  min-height: 110px;
}

/* Word counter */
.word-counter {
  font-size: 12px;
  color: #9ca3af;
  align-self: flex-end;
}

/* Buttons container */
.btns {
  margin-top: 15px;
  display: flex;
  justify-content: flex-end;
}

/* Create button */
.create-btn {
  background: #1e6f4f; /* dark green */
  color: white;
  border: 1px solid #2f8f6b;
  padding: 10px 22px;
  border-radius: 10px;
  font-size: 14px;
  font-weight: 600;
  cursor: pointer;
  transition: background 0.2s, transform 0.1s;
}

.create-btn:hover {
  background: #2f8f6b;
}

.create-btn:active {
  transform: scale(0.97);
}

/* Error container */
#errorNoteContainer {
  margin-top: 10px;
  font-size: 13px;
  color: #f87171;
}

/* Animation */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

</style>
</head>
<!-- $_SESSION["notetitle"] $_SESSION["noteContent"] $_SESSION["importance"]  -->
<body>

<div class="note-modal" id="notemodal">
  <div class="note-modal-content">
  
    <h2 id="notemodaltitle"> Note</h2>

    <form action="config/database.php" id="NoteForm" method="POST">
      <label>Title</label>
      <input type="text" placeholder="Enter note title" id="noteTitle" name="noteTitle" value="<?= $_SESSION["notetitle"] ?>">

      <label>Importance (Stars)</label>
      <input type="number" min="0" max="5"  name="noteImportance" value="<?= $_SESSION["importance"] ?>">

      <label>Content</label>
      <textarea class="note-textarea" maxlength="600"  name="noteContent"><?=  $_SESSION["noteContent"]?></textarea>
      <small class="word-counter">0 / 100 words</small>
       <input type="hidden" name="modifing" value="modifidnote">
       <input type="hidden" name="noteidd" value="<?= $_SESSION["noteidd"] ?>">
    
      <div class="btns">
        <button type="submit" class="create-btn">update</button>
      </div>
    </form>

    <div id="errorNoteContainer"></div>
  </div>
</div>

</body>
</html>

