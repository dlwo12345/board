<!DOCTYPE html>

<?php
    include_once 'config.php'; // db connect
    $result = mysqli_query($conn, "SELECT * FROM myboard order by my_id desc"); // sql 쿼리날리고 결과값 $result 저장
    $total_num = mysqli_num_rows($result); // 결과값에서 반환된 row의 개수를 저장
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
        <table class="myboard">
            <thead>
                <tr>
                    <th class="myboard-list-uid">번호</th>
                    <th class="myboard-list-title">제목</th>
                    <th class="myboard-list-user">작성자</th>
                    <th class="myboard-list-date">작성일</th>
                    <th class="myboard-list-view">조회</th>
                </tr>
            </thead>
            <tbody>

                <!-- 게시물 목록 루프 돌리기-->
               <?php 
                    $list_num = $total_num+1; // 게시글 번호
                    for($i=0;$row=mysqli_fetch_array($result);$i++){
                        $list_num--;
                        // 타이틀이 30글자가 넘으면 뒤에 ...으로 처리
                        $title_num = strlen($row['my_title']);
                        if($title_num>30){
                            $row['my_title'] = substr($row['my_title'],0,30).'...';
                        }
               ?>
                    <tr>
                        <td class="myboard-list-uid"> <?php echo $list_num; ?></td> <!-- 게시글 번호 -->
                        <td class="myboard-list-title"><a href="view.php?my_id=<?php echo $row['my_id'] ?>"><?php echo $row['my_title'] ?></a></td><!-- 제목 -->
                        <td class="myboard-list-user"><?php echo $row['my_user'] ?></td><!-- 작성자 -->
                        <td class="myboard-list-date"><?php echo $row['my_date'] ?></td><!-- 날짜 -->
                        <td class="myboard-list-view"><?php echo $row['my_view'] ?></td><!-- 조회수 -->
                    </tr>
                <?php } ?>
                
                <!-- 게시물 목록이 없을때 -->
                <?php if($total_num==0){ ?>
                    <tr>
                        <td colspan="5">등록된 게시물이 없습니다</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="write.php?mode=insert">글쓰기</a>
    </div>
    
</body>
</html>