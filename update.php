<!DOCTYPE html>
<?php
    include_once 'config.php'; // db connect
    $result = mysqli_query($conn, "SELECT * FROM myboard WHERE my_id=".$_GET['my_id'].""); 
    $row = mysqli_fetch_array($result); // 결과값에서 저장
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/main.css">
    
</head>
<body>
    <div class="myboard_wrap">
        <h1>수정하기</h1>
        <form action="board_update.php?mode=update&my_id=<?php echo $row['my_id']?>" method="post">
           <input type="hidden" name="my_id" value="<?php echo $_GET['my_id']; ?>">
            <table class="myboard">
                    <tr>
                        <td>제목</td>
                        <td colspan="2"><textarea name="my_title" required><?php echo $row['my_title'] ?></textarea></td>
                    </tr>
                    <tr>
                        <td>내용</td>
                        <td colspan="2"><textarea name="my_content" required><?php echo $row['my_content'] ?></textarea></td>
                    </tr>
            </table>
            <a href="index.php">목록으로</a>
            <button type="submit">저장</button>
        </form>
    </div>
    
    
</body>
</html>