<?php
    include_once 'config.php';

    // 글쓰기
    if($_GET['mode']=='insert'){
        // 글 정보 데이터베이스에 전송
        mysqli_query($conn,
            "
                INSERT INTO myboard SET 
                    my_title = '".$_POST['my_title']."',
                    my_content = '".$_POST['my_content']."',
                    my_date = now(),
                    my_user = '".$_POST['my_user']."'
            "
        );
        $result = mysqli_query($conn, "SELECT * FROM myboard order by my_id desc");
        $row=mysqli_fetch_array($result); 
        header('Location:view.php?my_id='.$row['my_id']); // 마지막 글로 이동
        
    }
    // 삭제하기
    else if($_GET['mode']=='delete'){
        mysqli_query($conn,"DELETE FROM myboard WHERE my_id = '".$_GET['my_id']."'");
        header('Location:index.php');
    }
    // 수정하기
    else if($_GET['mode']=='update'){
        mysqli_query($conn,
            "
                UPDATE myboard SET
                   my_title = '".$_POST['my_title']."',
                   my_content = '".$_POST['my_content']."'
                WHERE
                   my_id ='".$_POST['my_id']."'
            "
        );
        header('Location:view.php?my_id='.$_POST['my_id']);
    }
?>