const createThemeBtn = document.getElementById("createTheme");
createThemeBtn.addEventListener("click", showmodalcreatetheme);

function showmodalcreatetheme() {
  document.getElementById("themeModal").style.display = "flex";
  document.getElementById("closeModal").onclick = () => {
    document.getElementById("themeModal").style.display = "none";
  };
}


const thmeForm = document.getElementById("themeForm");
thmeForm.addEventListener("submit", (event) => {
  submitThemForm(event)
})


function submitThemForm(e) {
  e.preventDefault();

  errorContainer
  const themeName = document.getElementById("themename").value;
  const maxNotes = document.getElementById("maxNotes").value;
  const themeNameRegex = /^(?=.*[a-zA-Z])[a-zA-Z0-9 ]{2,30}$/;
  const errorContainer = document.getElementById("errorContainer");
  if (!themeNameRegex.test(themeName))  {
    errorContainer.textContent += "theme name is not valid";
    return ; 
  }
  if(maxNotes.value == "") {
    errorContainer.textContent += "chose number of notes"
  }

}


