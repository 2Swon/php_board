<?php
	include_once "./config.php";
  include_once "./login_check.php";
  include "./db/db_con.php";
?>
<html lang="ko">
<head>
  <title>게시판</title>
  <link rel="stylesheet" href="css/style1.css">

  <?php include_once "./fragments/head.php";?>
</head>

<body>
<nav>
			<?php include "./fragments/header.php";?>
		</nav>
  <div>
    <h2 style="padding: 20px;">자유게시판</h2>
  </div>
  <div class="center-title">
    <h4 style="margin-bottom: 20px;">자유롭게 글을 쓰는 게시판 입니다</h4>
  </div>
  <table class = "list-table" style="width:100%;margin-top:10px; " >
    <thead>
      <tr style="background:white;">
        <th width="70" style="text-align: center;">번호</th>
        <th width="500" style="text-align: center;">제목</th>
        <th width="120" style="text-align: center;">글쓴이</th>
        <th width="100" style="text-align: center;">작성일</th>
        <th width="100" style="text-align: center;">조회수</th>
      </tr>
    </thead>
    <?php
          
          $sql = "select * from BOARD order by BOARD_ID desc"; 
          $result = mysqli_query($db, $sql);

            while($board = mysqli_fetch_array($result))
            {
              $title=$board["BOARD_TITLE"];             
        ?>
        <tbody>
        <tr onmouseover="this.style.background='#f8f8f8'" onmouseout="this.style.background='white' ">
          <td class="tb-td" width="70" ><a class="td-data" href="read.php?BOARD_ID=<?=$board['BOARD_ID']?>"><?php echo $board['BOARD_ID']; ?></td>
          <td class="tb-td" width="500;"><a class="td-data" href="read.php?BOARD_ID=<?=$board['BOARD_ID']?>"><?php echo $title;?></a></td>
          <td class="tb-td" width="120;"><?php echo $board['BOARD_WRITER']?></td>
          <td class="tb-td" width="100;"><?php echo $board['BOARD_WRITER_DATE']?></td>
          <td class="tb-td" width="100;"><?php echo $board['BOARD_VIEW']; ?></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
    <div id="write_btn">
      <a href="./board_write.php"><button>글쓰기</button></a>
    </div>
  </div>
</body>
</html>