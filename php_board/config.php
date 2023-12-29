<!-- 세션 관리 -->
<?php
	session_start();
	if (isset($_SESSION["MEMBER_ID"])) {
		$MEMBER_ID = $_SESSION["MEMBER_ID"];
	}else{
		$MEMBER_ID = "";
	}if (isset($_SESSION["NICKNAME"])){
		$NICKNAME = $_SESSION["NICKNAME"];
	}else{
		$NICKNAME = "";
	}if (isset($_SESSION["acts"])){ // 사용자, 관리자 구분 용도
		$acts = $_SESSION["acts"];
	}else{
		$acts = "user";
	}
?>