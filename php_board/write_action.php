<?php
include_once "./config.php";
include "./db/db_con.php";
$id = $_SESSION['MEMBER_ID'];                   //Writer
$title = $_POST['title'];               //Title
$content = $_POST['content'];           //Content
$date = date('Y-m-d H:i:s');            //Date


$sql = "INSERT INTO BOARD (BOARD_TITLE, BOARD_CONTENT, BOARD_WRITER_DATE, BOARD_VIEW, BOARD_WRITER) 
        values( '$title', '$content', '$date', 0, '$id')";


$result = mysqli_query($db, $sql);
if ($result) {
?> <script>
        alert("<?php echo "게시글이 등록되었습니다." ?>");
        location.href = 'boards.php';
    </script>
<?php
} else {
    echo "게시글 등록에 실패하였습니다.";
}

mysqli_close($db);
?>