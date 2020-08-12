(function(){

  /* setItem으로 값을 저장 */
  // localStorage.setItem("user", "me");

  /* getItem으로 값을 가져오기 */
  // let value = localStorage.getItem("user");
  
  // localStorage.removeItem("user");
  
  // alert(value);





  

  // localStorage.setItem("visitor", "A");
  // localStorage.removeItem("visitor");

  // if( localStorage.getItem("visitor") ) {
    
  //   inputTag.style.display = "none";
    
  //   const spanTag = document.querySelector("span");
  //   let visitorValue = localStorage.getItem("visitor");
  //   spanTag.innerHTML = visitorValue+"님 반갑습니다.";
    
  // }
  // else {
  //   inputTag.style.display = "block";
    
  // }




  
  // const KEY_USER = "currentUser";
  // const userFormElem = document.querySelector("#user_form");
  
  // function saveItem( text ){
  //   localStorage.setItem( KEY_USER, text );
  // }

  // const inputTag = document.querySelector("input");
  // function printUser(){
  //   return inputTag.value;
  // }

  // let currentUser = localStorage.getItem( KEY_USER );
  
  // if( currentUser === null ) {
  //   userFormElem.addEventListener("submit", function(e) {
  //     const inputName = printUser();
  //     saveItem(inputName);
  //   });
  // }  
  // else {
  //   console.log(currentUser);
  //   const spanTag = document.querySelector("span");
  //   spanTag.innerHTML = currentUser+"님 반갑습니다.";
  // }    






  
const userForm = document.querySelector("#user_form");
const userPrint = document.querySelector("#user_print");
const KEY_USER = "currentUser";
let currentUser = localStorage.getItem(KEY_USER);

function saveItem(text) {
  localStorage.setItem(KEY_USER, text);
}



if( currentUser === null ) {
  console.log("no");
  userForm.classList.remove("hide");
  userPrint.classList.remove("show");

  userForm.addEventListener("submit", function(e){
    e.preventDefault();
    currentUser = document.querySelector("input").value;
    saveItem (currentUser);
  });
}
else {
  console.log(currentUser);
  userForm.classList.add("hide");
  userPrint.classList.add("show");
  userPrint.innerHTML = currentUser + "님 반갑습니다.";
}

















})();