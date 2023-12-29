<!--DB 연동 -->
<?php
  $db_id="root";
  $db_pw="";
  $db_name="wonfirst";
  $db_domain="localhost";
  $db= mysqli_connect($db_domain, $db_id, $db_pw, $db_name);
  mysqli_query($db, 'set names utf8');
  
	function mq($sql){
		global $db;
		return $db->query($sql);
	}
  
?>