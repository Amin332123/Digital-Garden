<?php include("includes/headerregistred.php") ?>
<link rel="stylesheet" href="public/public/style/theme.css">
<link rel="stylesheet" href="public/public/style/style.css">
<div class="create-btncontainer">
    <button class="create-theme-btn" id="createTheme">Create New Theme</button>
</div>
<div class="modal-overlay" id="themeModal">
    <div class="modal-box">
        <h2 class="modal-title">Theme Settings</h2>

        <form>
            <div class="modal-input-group">
                <label>Theme Name</label>
                <input type="text" placeholder="Enter theme name" class="modal-input">
            </div>

            <div class="modal-input-group">
                <label>Background Color (HEX)</label>
                <input type="text" placeholder="#00ff00" class="modal-input">
            </div>
            <div class="input-group">
                <label for="maxNotes">Max Notes</label>
                <input type="number" id="maxNotes" name="maxNotes" placeholder="Enter max number of notes">
            </div>

            <div class="modal-actions">
                <button type="submit" class="create-btn">Create</button>
                <button type="button" class="modify-btn">Modify</button>
            </div>
        </form>

        <span class="close-modal" id="closeModal">✕</span>
    </div>
</div>
<section class="themes-section">
    <div class="themes-grid">
        <div class="theme-card">
            <h2 class="theme-title">Productivity</h2>
            <p class="theme-color">#FFB300</p>
            <p class="theme-notes">Max Notes: 10</p>

            <div class="theme-actions">
                <a href="note.php"><button class="view-btn">View</button></a>
                <button class="modify-btn">Modify</button>
                <button class="delete-btn">Delete</button>
            </div>
        </div>
    </div>
</section>
<script src="public/public/js/theme.js"></script>
</body>
</html>