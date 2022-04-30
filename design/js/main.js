let id = (id) => document.getElementById(id);

let classes = (classes) => document.getElementsByClassName(classes);

let email = id("email"),
  password = id("password"),
  form = id("form"),
  errorMsg = classes("error"),
  successIcon = classes("success-icon"),
  failureIcon = classes("failure-icon");

form.addEventListener("submit", (e) => {
  engine(email, 0, "Email cannot be blank");
  engine(password, 1, "Password cannot be blank");
  e.preventDefault();
  
});

let engine = (id, serial, message) => {
  if (id.value.trim() === "") {
    errorMsg[serial].innerHTML = message;
    id.style.border = "2px solid red";
    // icons
    failureIcon[serial].style.opacity = "1";
    successIcon[serial].style.opacity = "0";
  } else if(email.value.trim() !== "" && password.value.trim() !== ""){
    errorMsg[serial].innerHTML = "";
    id.style.border = "2px solid green";
    // icons
    failureIcon[serial].style.opacity = "0";
    successIcon[serial].style.opacity = "1";
    // e.target;
  } else {
    errorMsg[serial].innerHTML = "";
    id.style.border = "2px solid green";
    // icons
    failureIcon[serial].style.opacity = "0";
    successIcon[serial].style.opacity = "1";
  }
};
