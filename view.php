<!DOCTYPE html>

<?php
    
    include_once 'config.php'; // db connect
    mysqli_query($conn,"UPDATE myboard SET my_view = my_view + 1 WHERE my_id = ".$_GET['my_id'].""); // 조회수 증가
    $result = mysqli_query($conn, "SELECT * FROM myboard WHERE my_id=".$_GET['my_id'].""); 
    $row = mysqli_fetch_array($result); // 결과값에서 저장
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <div class="myboard_wrap">
        <table class="myboard">
                <tr>
                    <td colspan="3"><?php echo $row['my_title'] ?></td>
                </tr>
                <tr>
                    <td>작성자 : <?php echo $row['my_user'] ?></td>
                    <td>작성일 : <?php echo $row['my_date'] ?></td>
                    <td>조회 : <?php echo $row['my_view'] ?></td>
                </tr>
 
                <tr>
                    <td colspan="5"><?php echo $row['my_content'] ?></td>
                </tr>
        </table>
        <a href="index.php">목록으로</a>
        <a href="update.php?mode=modify&my_id=<?php echo $row['my_id']?>">수정</a>
        <button onclick="btnSubmit()">삭제</button>
    </div>
    <script>
        function btnSubmit(){
            if(confirm("정말로 삭제하시겠습니까?")){
                location.href="board_update.php?mode=delete&my_id=<?php echo $row['my_id']?>"
            }else{
                return false;
            }
        }
    </script>
</body>
</html>