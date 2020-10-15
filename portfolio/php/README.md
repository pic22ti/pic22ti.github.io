

## 1. Community
* [github](https://github.com/pic22ti/pic22ti.github.io/tree/master/portfolio/php)
* [바로가기](http://pic22ti.dothome.co.kr/mysite/php/index.php)

로그인, 메세지, 게시판 기능을 MySQL, PHP, VanillaJs로 구현한 커뮤니티 사이트입니다.

회원가입, 아이디 중복확인, 로그인, 회원정보수정, 로그아웃, 회원탈퇴
메세지 보내기, 받은/보낸 메세지 보기, 답장 보내기
게시글쓰기, 첨부파일 올리기/받기, 게시글 수정/삭제
관리자 모드 회원/게시판 관리 등 기능을 사용할 수 있습니다.

## 2. 사용된 기술
* PHP, MySQL
* Vanilla JS

## 3. 사이트 구조
![sitemap_php](/portfolio/php/sitemap_php.jpg)

## 4. DB 구조

## 5. 고찰 및 개선 방향
* db 정보가 코드로 드러나는 점을 보안성을 높여야합니다.
* 게시글 수정 시 첨부파일 삭제/수정이 불가능한 점
* 첨부파일 input 버튼이 디폴트 스타일로 디자인의 통일성이 떨어져 수정이 필요합니다.
* PHP문을 JSON로 따로 불러와 사용해 유지보수의 용이성을 높이기
* 회원정보, 게시글이 정상적으로 삭제되었을 때를 구분하여 알리기
* 첨부파일 다운로드 시 익플 한글파일 깨짐 방지 코드 추가하기

## 6. 참고 사항
* PHP 프로그래밍 입문 (지은이:황재호, 한빛아카데미)
* [MATERIAL DESIGN](https://material.io/resources/icons/?style=baseline)