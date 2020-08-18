(function(){

const KEY_TODOS = "todos";
const formElem = document.querySelector("#view_todoList>form");
const inputElem = formElem.querySelector("input");
const ulElem = document.querySelector(".todo_list");
let toDos = [];

function stringTodo() {
  // 문자열해서 저장
  const strToDo = JSON.stringify(toDos);
  localStorage.setItem( KEY_TODOS, strToDo );
}

function onDelBtn(e) {
  const target = e.target;
  // 부모 요소 가져오기
  const list = target.parentElement;
  const ul = list.parentElement;
  const liID = parseInt(list.id);
  ul.removeChild(list);

  // toDos 배열에 있는 목록을 제외
  // filter callback함수
  // *********************
  toDos = toDos.filter(function(todo){
    console.log(todo);
    console.log(liID);
    return todo.key !== liID
  });
  stringTodo();
}

function saveTodo(text) {
  const obj = {
    key : toDos.length+1,
    value : text
  }
  // 객체를 추가하는 함수 push 뺄때는 pop?
  toDos.push(obj);
  stringTodo();
}

function addToDoList(text) {
  const list = document.createElement("li");
  list.id = toDos.length+1;

  const delBtn = document.createElement("span");
  delBtn.innerHTML = "&cross;&nbsp;";
  delBtn.style.color = "red";
  delBtn.addEventListener("click", onDelBtn);

  const label = document.createElement("span");
  label.innerHTML = text;

  list.appendChild(delBtn);
  list.appendChild(label);
  ulElem.appendChild(list);

  saveTodo(text);
}

function onSubmit(e) {
  e.preventDefault();
  let listValue = inputElem.value;

  if( listValue !== "" ) {
    addToDoList(listValue);
  }
  inputElem.value = "";
}

function loadTodos() {
  const todoList = localStorage.getItem(KEY_TODOS);
  if( todoList !== null ) {
    // todoList 보여주기
    const temp = JSON.parse(todoList);
    console.log(temp);
    // 값 하나씩 읽어오기
    temp.forEach(function(todo){
      // 배열안에 객체의 value값만 가져오기 위해 .value
      addToDoList(todo.value);
    });
  }
  formElem.addEventListener("submit", onSubmit);
}

loadTodos();






















// const todoForm = document.querySelector("#view_todo");
// const todoList = document.querySelector(".todo_list");
// const KEY_TODO = "todo_list";


// function printTodo( text ) {
//   const addList = document.createElement("li");
//   todoList.appendChild(addList);
//   addList.innerHTML = text;
// }

// function setTodo(e) {
//   const inputData = this.querySelector(".todo_input");
//   const value = inputData.value;
//   localStorage.setItem( KEY_TODO, value );
//   printTodo( value );
// }

// todoForm.addEventListener( "submit", setTodo );





// function checkTodo() {
//   const todoItem = localStorage.getItem(KEY_TODO);
//   if ( todoItem ) {
//     printTodo(todoItem);
//   }
// }

// checkTodo();


})();