

const createThemeBtn = document.getElementById("createTheme");
createThemeBtn.addEventListener("click", showmodalcreatetheme);

function showmodalcreatetheme() {
  document.getElementById("themeModal").style.display = "flex";
  document.getElementById("closeModal").onclick = () => {
    document.getElementById("themeModal").style.display = "none";
  };
}















