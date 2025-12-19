const createNote = document.getElementById("createNote");
console.log("teeeeeeeeeet");

createNote.addEventListener("click", () => {
  document.getElementById("notemodal").style.display = "flex";
  document.getElementById("closeNoteModal").addEventListener("click", () => {
    document.getElementById("notemodal").style.display = "none";
  });
});

const noteForm = document.getElementById("NoteForm");
noteForm.addEventListener("submit", (event) => {
  validateInputModal(event);
});
const noteTitleRegex = /^(?=.*[a-zA-Z])[a-zA-Z0-9 ]{2,30}$/;
errorNotesContainer = document.getElementById("errorNoteContainer");
function validateInputModal(e) {
  e.preventDefault();
  // e.stopPropagation();
  // e.stopImmediatePropagation();
  errorNotesContainer.innerHTML = "";
  errorNotesContainer.style.textAlign = "center";
  const titleNote = document.getElementById("noteTitle").value;
  const importanceNum = document.getElementById("improtance").value;
  const contentNote = document.getElementById("content").value;
  if (!noteTitleRegex.test(titleNote)) {
    errorNotesContainer.innerHTML = `<p style="color: red;"> Note title is not valid</p>`;

    return;
  }
  if ((importanceNum > 5 && importanceNum < 0) || !importanceNum) {
    errorNotesContainer.innerHTML = `<p style="color: red;">Chose A number (0-5)</p>`;
    return;
  }
  if (contentNote.length < 3) {
    errorNotesContainer.innerHTML = `<p style="color: red;">Content is too Short</p>`;
    return;
  }


  noteForm.submit();
}




const viewNote = document.querySelectorAll(".view-btn");
viewNote.forEach((notbtn) => {
notbtn.addEventListener("click" , () => {

  
 
  
  showModalAndContent(notbtn.parentElement.parentElement.querySelector(".notecontent").querySelector(".noteconnteent").textContent)

})
})



function showModalAndContent(content) {
  console.log(content);
  
  document.getElementById("modalOverlay").style.display = "flex";
  const contentContainer = document.querySelector(".contentContainer");
  contentContainer.innerHTML = `${content}` ; 

}
const closeNoteContentBtn = document.querySelector(".closeNoteContentBtn");
closeNoteContentBtn.addEventListener("click" , closeModal )
function closeModal() {
    document.getElementById("modalOverlay").style.display = "none";
  }