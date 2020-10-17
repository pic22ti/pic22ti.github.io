![logo_php](/portfolio/php/logo_php.jpg)

## 1. Community
게시판 구현 커뮤니티 사이트
* [github](https://github.com/pic22ti/pic22ti.github.io/tree/master/portfolio/php)
* [바로가기](http://pic22ti.dothome.co.kr/mysite/php/index.php)

## 2. 기능 구현
* 회원관리
* 게시판, 메세지 관리
* 관리자 모드

## 3. 스킬
* 기여도 100%
* MySQL
* PHP
* HTML5 / CSS3
* Javascript

## 4. 사이트 구조
![sitemap_php](/portfolio/php/sitemap_php.jpg)

## 5. DB 구조
|member(회원)||||
|------|---|---|---|
|num **(PK)**|회원번호|int(11)|NOT NULL|
|id|아이디|char(15)|NOT NULL|
|pass|비밀번호|char(15)|NOT NULL|
|name|이름|char(10)|NOT NULL|
|email|이메일|char(80)|NULL|
|regist_day|등록날짜|char(20)|NULL|
|level|레벨|int(11)|NULL|
|point|포인트|int(11)|NULL|

|messagebox(메세지)||||
|------|---|---|---|
|num **(PK)**|메세지번호|int(11)|NOT NULL|
|send_id|보낸 사람|char(15)|NOT NULL|
|rv_id|받은 사람|char(15)|NOT NULL|
|subject|제목|char(200)|NOT NULL|
|content|내용|text|NOT NULL|
|regist_day|보낸날짜|char(20)|NULL|

|board(게시판)||||
|------|------|---|---|
|num **(PK)**|게시글번호|int(11)|NOT NULL|
|id|아이디|char(15)|NOT NULL|
|name|이름|char(15)|NOT NULL|
|subject|제목|char(200)|NOT NULL|
|content|내용|text|NOT NULL|
|regist_day|등록날짜|char(20)|NOT NULL|
|hit|조회수|int(11)|NOT NULL|
|file_name|파일명|char(40)|NULL|
|file_type|파일 타입|char(40)|NULL|
|file_copied|저장용 파일명|char(40)|NULL|

## 6. 고찰 및 개선 방향
* 데이터 보안 문제
  - 사용자 정보가 노출되는 문제를 고민해 봐야 함

## 7. 참고
* PHP 프로그래밍 입문 (지은이:황재호, 한빛아카데미)
* [MATERIAL DESIGN](https://material.io/resources/icons/?style=baseline)
