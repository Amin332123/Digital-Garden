const signUpForm = document.getElementById("signupform");
const errorContainer = document.querySelector("#errorRegisterContainer");
const fullName_Regex = /^[A-Za-z]+(?: [A-Za-z]+)*$/;
const username_Regex = /^[A-Za-z][A-Za-z0-9_]{2,19}$/;
const password_Regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
signUpForm.addEventListener("submit", (event) => {
  checkSignUpInputsAndSubmitForm(event);
});
function checkSignUpInputsAndSubmitForm(e) {
  e.preventDefault();
  let x = 0;
  errorContainer.innerHTML = " ";
  errorContainer.style.display = "block";
  const fullName = document.getElementById("fullname").value.trim();
  const userName = document.getElementById("username").value.trim();
  const password = document.getElementById("password").value.trim();
  const confirmedPassword = document.getElementById("Cpassword").value.trim();
  const confirpasswordBoolean = checkBothPasswsord(confirmedPassword);
  if (!fullName_Regex.test(fullName) || fullName.length < 3) {
    errorContainer.innerHTML += `<h4 style="color: red;">- name is not correct </h4>`;
    x++;
  }
  if (!username_Regex.test(userName)) {
    errorContainer.innerHTML += `<h4 style="color: red;">- username( from 3 to 20 chars) . Start with a letter • Letters, numbers & _ only .</h4>`;
    x++;
  }
  if (!password_Regex.test(password)) {
    console.log("wrong");

    errorContainer.innerHTML += `<h4 style="color: red;">- Password must be at least 6 characters with uppercase, lowercase, and a number.</h4>`;
    x++;
  }
  if (x == 0 && confirpasswordBoolean == true) {
    
      signUpForm.submit();
      
  }
}

document.getElementById("Cpassword").addEventListener("input", () => {
  checkBothPasswsord(document.getElementById("Cpassword").value.trim());
});
function checkBothPasswsord(confirmedPassword) {
  document.getElementById("confirmPass").textContent = "";
  if (
    confirmedPassword == document.getElementById("password").value &&
    confirmedPassword != ""
  ) {
    document.getElementById("confirmPass").textContent = "Correct";
    document.getElementById("confirmPass").style.color = "green";
    return true;
  } else {
    if (confirmedPassword != "") {
      document.getElementById("confirmPass").textContent =
        "Not the same password";
      document.getElementById("confirmPass").style.color = "red";
    }
    return false;
  }
}

