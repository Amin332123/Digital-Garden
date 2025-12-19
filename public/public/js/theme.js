const createThemeBtnModal = document.getElementById("createTheme");
createThemeBtnModal.addEventListener("click", showmodalcreatetheme);

function showmodalcreatetheme() {
 
  document.getElementById("themeModal").style.display = "flex";
  document.getElementById("closeModal").onclick = () => {
    document.getElementById("themeModal").style.display = "none";
    
  };
}

const thmeForm = document.getElementById("themeForm");
thmeForm.addEventListener("submit", (event) => {
  submitThemForm(event);
});

function submitThemForm(e) {
  e.preventDefault();
  const themeName = document.getElementById("themename").value;
  const maxNotes = document.getElementById("maxNotes").value;
  const themeNameRegex = /^(?=.*[a-zA-Z])[a-zA-Z0-9 ]{2,30}$/;
  const thememodalerror = document.getElementById("thememodalerror");
  thememodalerror.innerHTML = "";
  if (!themeNameRegex.test(themeName)) {
    thememodalerror.innerHTML += "theme name is not valid";
    return;
  }
  if (maxNotes === "") {
    thememodalerror.innerHTML += "chose number of notes";
    return;
  }
  thmeForm.submit();
}









