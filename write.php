<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/main.css">
    <style>
    </style>
</head>
<body>
    <div class="myboard_wrap">
        <h1>글쓰기</h1>
        <form action="board_update.php?mode=insert" method="post">
            <table class="myboard">
                <tr>
                    <td>제목</td>
                    <td colspan="2"><textarea name="my_title" required></textarea></td>
                </tr>
                <tr>
                    <td>작성자</td>
                    <td colspan="2"><input type="text" name="my_user" required></td>
                </tr>
                <tr>
                    <td>내용</td>
                    <td colspan="2"><textarea name="my_content" required></textarea></td>
                </tr>
            </table>
            <a href="index.php">목록으로</a>
            <button type="submit">저장</button>
        </form>
    </div>
    
</body>
</html>