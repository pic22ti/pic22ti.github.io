(function(){


  
  
let userName = localStorage.getItem("user");
const userForm = document.querySelector("#user_form");
const btnIn = document.querySelector(".input_in");
const btnOut = document.querySelector(".input_out");
const userPrint = document.querySelector("#user_print");


function loginForm() {
  userForm.style.display = "block";
  userPrint.textContent = "";
  btnOut.style.display = "none";
}

function saveUserName() { 
  console.log( "click event");
  userName = document.querySelector(".input_name").value;  
  localStorage.setItem("user", userName);
  whenLogin();
}

function whenLogin() {
  userForm.style.display = "none";
  userPrint.textContent = `Hello, ${userName}!`;
  btnOut.style.display = "block"; 
}

function removeUserName() {
  console.log( "remove event!");
  localStorage.removeItem("user");
  loginForm();  
  userName = null;
}
function checkUserName(){
  if( userName === null ) {
    loginForm();
    btnIn.addEventListener("click", saveUserName);
  }
  else {
    whenLogin();
    btnOut.addEventListener("click", removeUserName);
  }
}
checkUserName();



// 버튼을 밖으로 빼...


























  
// let userName = localStorage.getItem("user");
// const userForm = document.querySelector("#user_form");
// const btnIn = document.querySelector(".input_in");
// const btnOut = document.querySelector(".input_out");
// const userPrint = document.querySelector("#user_print");


// function loginForm() {
//   userForm.style.display = "block";
//   userPrint.textContent = "";
//   btnOut.style.display = "none";
// }

// function saveUserName() {
//   let getName = document.querySelector(".input_name").value;
//   localStorage.setItem("user", getName);
// }

// function whenLogin() {
//   userForm.style.display = "none";
//   userPrint.textContent = `Hello, ${userName}!`;
//   btnOut.style.display = "block";
// }

// function removeUserName() {
//   localStorage.removeItem("user");
//   loginForm();
// }

// if( userName === null ) {
//   loginForm();
//   btnIn.addEventListener("click", saveUserName);
// }
// else {
//   whenLogin();
//   btnOut.addEventListener("click", removeUserName);
// }







})();