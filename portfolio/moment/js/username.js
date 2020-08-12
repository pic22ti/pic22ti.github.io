(function(){
  
  const userContainer = document.querySelector("#view_name");
  const KEY_USERNAME = "user_name";


  
  
  /* 이름을 출력하는 span을 만드는 함수 */
  function printSpan(text) {

    // 기존에 있던 form, input 삭제
    userContainer.innerHTML = "";

    // span 요소 생성
    const addSpan = document.createElement("span");

    // 클래스 추가 (css)
    addSpan.className = "printSpan";

    // 텍스트 출력
    addSpan.innerHTML = `Hello, ${text}!`;

    // 위치 추가
    userContainer.appendChild( addSpan );
  }




  /* 사용자 이름을 로컬스토리지에 저장하는 함수 */
  function setUserName(e) {
    e.preventDefault();
    const inputData = this.querySelector("input");
    const value = inputData.value;
    localStorage.setItem( KEY_USERNAME, value );
    printSpan( value );
  }



  /* 입력창 input를 만드는 함수 */
  function printInput() {

    // form, input 요소 생성
    const addForm = document.createElement("form");
    const addInput = document.createElement("input");

    // 요소에 속성 추가
    addInput.type = "text";
    addInput.placeholder = "What's your name?";

    // 클래스 추가 (css)
    addInput.className = "printInput";
    
    // 원하는 위치에 자식으로 추가
    userContainer.appendChild( addForm );
    addForm.appendChild( addInput );

    // 폼에 submit 이벤트 설정
    addForm.addEventListener("submit", setUserName);
  }




  /* 사용자 이름을 체크하는 함수 */
  function checkUserName() {
    const currentName = localStorage.getItem(KEY_USERNAME);

    if( currentName === null ) {
      printInput();
    }
    else {
      printSpan(currentName);
    }
  }

  checkUserName();













})();