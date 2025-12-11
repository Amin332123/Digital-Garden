  const createNote = document.getElementById("createNote");


createNote.addEventListener("click", () => {
  

  document.getElementById("notemodal").style.display = "flex";
  document.getElementById("closeNoteModal").addEventListener("click", () => {
    document.getElementById("notemodal").style.display = "none";
  })
});