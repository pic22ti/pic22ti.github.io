(function () {

  const BASE_URL = "https://api.openweathermap.org/data/2.5/weather?";
  const KEY_WEATHER = "location";
  const API_KEY = "20d67a9c6f5bce56354b6ae7e2ea65cc";

  /* *************** 날씨 정보 알아오는 함수 */
  function getWeather(obj) {

    // fetch 사용법 그대로 사용 (url만 변경하면 됨)
    fetch(
      // url 넣기
      `${BASE_URL}lat=${obj.lat}&lon=${obj.lon}&appid=${API_KEY}&units=metric`
    )
      .then(function (response) {
        return response.json();
      })
      .then(function (myJson) {
        // 기본은 문자열로 출력
        console.log(myJson);

        const city = myJson.name;
        const temp = Math.floor(myJson.main.temp);

        const weather = document.querySelector(".weather");
        weather.innerHTML = `${city} ${temp}˚`
      });
  }

  /* 위치 정보 가져오기 성공했을때 */
  function handlerSuccess(position) {

    // 위도, 경도 정보를 가져오기
    const lat = position.coords.latitude;
    const lon = position.coords.longitude;

    // 객체에 담기
    const coordObj = {
      lat: lat,
      lon: lon
    }

    // 객체를 JSON으로 문자열화 해서 로컬스토리지에 추가
    localStorage.setItem(KEY_WEATHER, JSON.stringify(coordObj));
    getWeather(coordObj);
  }

  /* 위치 정보 가져오기 에러일때 문구 출력 */
  function handlerError() {
    console.log("Geolocation is not supported by this browser.");
  }

  /* *************** 위치 정보 (위도, 경도) 가져오는 함수 */
  function getLocation() {
    navigator.geolocation.getCurrentPosition(handlerSuccess, handlerError);
  }

  // *************** 날씨 정보 출력하는 함구
  function loadWeather() {
    const currentCoords = localStorage.getItem(KEY_WEATHER);

    if (currentCoords === null) {
      // 위치 정보 가져오기
      getLocation();
    }
    else {
      // 문자열로 들어가있는 로컬스토리지 위치 정보를 JSON으로 객체화 해서 가져오기
      getWeather(JSON.parse(currentCoords));
    }
  }
  loadWeather();

}());