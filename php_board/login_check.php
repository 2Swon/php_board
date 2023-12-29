<!-- 로그인 체크 -->
<?php 
	if(!$MEMBER_ID) {
		echo("
			<script>
			alert('로그인 후 이용해 주세요! ');
			location.href='login.php';
			</script>
			");
	}
?>