<?php
	// 파일 정보 가져오기
	$real_name = $_GET["real_name"];
	$file_name = $_GET["file_name"];
	$file_type = $_GET["file_type"];
	$file_path = $_GET["file_path"];
	$file_path = "./data/".$real_name;

	// 익플 한글파일 깨짐 방지 코드는 뺐음

	// 만약 파일이 있다면 
	// *********************** 수정사항: 사용된 함수내용 파악하고 적기
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