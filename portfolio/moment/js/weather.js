(function () {

  // https://api.openweathermap.org/data/2.5/weather?lat={lat}&lon={lon}&appid={your api key}&units=metric

  const BASE_URL = "https://api.openweathermap.org/data/2.5/weather?";
  const KEY_WEATHER = "location";
  const API_KEY = "20d67a9c6f5bce56354b6ae7e2ea65cc";

  /* 한국어 */
  function wDescEngToKor(w_id) {
    var w_id_arr = [201, 200, 202, 210, 211, 212, 221, 230, 231, 232,
      300, 301, 302, 310, 311, 312, 313, 314, 321, 500,
      501, 502, 503, 504, 511, 520, 521, 522, 531, 600,
      601, 602, 611, 612, 615, 616, 620, 621, 622, 701,
      711, 721, 731, 741, 751, 761, 762, 771, 781, 800,
      801, 802, 803, 804, 900, 901, 902, 903, 904, 905,
      906, 951, 952, 953, 954, 955, 956, 957, 958, 959,
      960, 961, 962];
    var w_kor_arr = ["가벼운 비를 동반한 천둥구름", "비를 동반한 천둥구름", "폭우를 동반한 천둥구름", "약한 천둥구름",
      "천둥구름", "강한 천둥구름", "불규칙적 천둥구름", "약한 연무를 동반한 천둥구름", "연무를 동반한 천둥구름",
      "강한 안개비를 동반한 천둥구름", "가벼운 안개비", "안개비", "강한 안개비", "가벼운 적은비", "적은비",
      "강한 적은비", "소나기와 안개비", "강한 소나기와 안개비", "소나기", "악한 비", "중간 비", "강한 비",
      "매우 강한 비", "극심한 비", "우박", "약한 소나기 비", "소나기 비", "강한 소나기 비", "불규칙적 소나기 비",
      "가벼운 눈", "눈", "강한 눈", "진눈깨비", "소나기 진눈깨비", "약한 비와 눈", "비와 눈", "약한 소나기 눈",
      "소나기 눈", "강한 소나기 눈", "박무", "연기", "연무", "모래 먼지", "안개", "모래", "먼지", "화산재", "돌풍",
      "토네이도", "구름 한 점 없는 맑은 하늘", "약간의 구름이 낀 하늘", "드문드문 구름이 낀 하늘", "구름이 거의 없는 하늘",
      "구름으로 뒤덮인 흐린 하늘", "토네이도", "태풍", "허리케인", "한랭", "고온", "바람부는", "우박", "바람이 거의 없는",
      "약한 바람", "부드러운 바람", "중간 세기 바람", "신선한 바람", "센 바람", "돌풍에 가까운 센 바람", "돌풍",
      "심각한 돌풍", "폭풍", "강한 폭풍", "허리케인"];
    for (var i = 0; i < w_id_arr.length; i++) {
      if (w_id_arr[i] == w_id) {
        return w_kor_arr[i];
        break;
      }
    }
    return "none";
  }

  

  /* 위도, 경도 정보로 날씨를 알아오기 */
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
        // console.log(JSON.stringify(myJson));

        const city = myJson.name;
        const cod = wDescEngToKor(myJson.cod);
        const temp = Math.floor(myJson.main.temp);

        const weather = document.querySelector(".weather_text");
        weather.innerHTML = `${city} ${temp}˚<br>${cod}`
      });
  }



  /* 성공했을때 */
  function handlerSuccess(position) {

    // 위도, 경도 정보를 가져오기
    const lat = position.coords.latitude;
    const lon = position.coords.longitude;
    console.log(lat, lon);

    // 객체에 담기
    const coordObj = {
      lat: lat,
      lon: lon
    }

    // 객체를 JSON으로 문자열화 해서 로컬스토리지에 추가
    localStorage.setItem(KEY_WEATHER, JSON.stringify(coordObj));
    getWeather(coordObj);
  }

  /* 에러일때 */
  function handlerError() {
    console.log("Geolocation is not supported by this browser.");
  }

  /* 위도, 경도 정보 가져오는 함수 */
  function getLocation() {
    navigator.geolocation.getCurrentPosition(handlerSuccess, handlerError);
  }







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