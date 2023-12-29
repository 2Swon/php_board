<?php
	include_once "./config.php";
	include "./db/db_con.php";
	include_once "./login_check.php";
  ?>
<!DOCTYPE html>
<html>
	<head>
		<?php include_once "./fragments/head.php";?>
		
	</head>
	<body>
		<nav>
			<?php include_once "./fragments/header.php";?>
		</nav>
    <h2 style="padding: 20px;">회원관리</h2>
    <table class = "list-table" style="width:100%;margin-top:10px; " >
    <thead>
      <tr style="background:white;">
        <th width="130" style="text-align: center;">아이디</th>
        <th width="130" style="text-align: center;">닉네임</th>
        <th width="130" style="text-align: center;">생일</th>
        <th width="200"></th>
      </tr>
</thead>
    <?php
    $sql = "select * from MEMBER order by MEMBER_ID"; 
    $result = mysqli_query($db,$sql);  
	            while($member = mysqli_fetch_array($result)){      
        ?>
        <tbody>
        <tr onmouseover="this.style.background='#f8f8f8'" onmouseout="this.style.background='white' ">
          <td class="tb-td" width="130;"><?php echo $member['MEMBER_ID']?></td>
          <td class="tb-td" width="130;"><?php echo $member['NICKNAME']?></td>
          <td class="tb-td" width="130;"><?php echo $member['BIRTH_DATE']; ?></td>
          <th width="200"><a class="td-data" href="member_delete.php?MEMBER_ID=<?=$member['MEMBER_ID']?>">회원 탈퇴</a></th>
        </tr>
      </tbody>
      <?php } ?>
      </table>
			</div>
		</div>
	</body>
</html>