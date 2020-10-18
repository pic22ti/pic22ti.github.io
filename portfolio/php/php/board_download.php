<?php
	// 파일 정보 전달받기
	$real_name = $_GET["real_name"];
	$file_name = $_GET["file_name"];
	$file_type = $_GET["file_type"];
	$file_path = $_GET["file_path"];
	$file_path = "./data/".$real_name;

	// 파일 존재 확인하고 출력
	// file_exists() 함수: 파일이 존재하는지 확인하고 boolean값으로 반환하는 함수
	// fopen() 함수: mode에 따라 파일을 열기
	// Header() 함수: 파일의 정보를 브라우저에 알려준다
	// fpassthru() 함수: 파일포인터($fp)에 저장된 파일 데이터를 출력 버퍼에 저장한다
	// fclose() 함수: 파일 닫기
	if( file_exists($file_path) ) {
		$fp = fopen($file_path, "rb");

		Header("Content-type: application/x-msdownload");
		Header("Content-Length: ".filesize($file_path));
		Header("Content-Disposition: attachment; filename=".$file_name);
		Header("Content-Transfer-Encoding: binary");
		Header("Content-Description: File Transfer");
		Header("Expires: 0");
	}
	if( !fpassthru($fp) ) {
		fclose($fp);
	}
?>