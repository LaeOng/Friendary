<?php 
    session_start();
    include('../../dbconn/dbconn.php');
    include('../../serverURL.php');

    if(!isset($_SESSION['ID'])) {
        echo "<script>alert('로그인 후 이용 바랍니다.');location.href = '".$serverURL."pages/main/main.php';</script>";
    }
?>

<!DOCTYPE html>


<style>

* {
    margin: 0;
    padding: 0;
}

html, body {
    height: 100%;
    width: 100%;
}

</style>

<!-- feed_head.php 추가 하는법 여기부터 -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.header').load("../feed/feed_head.php");
    });
</script>
<!-- 여기까지 -->

<html>
    <body>

    <div class="header"></div>

    <div>
        <form id = "profile_modify" method = "POST" action = "profile_modify_ok.php">
            <span>이름(닉네임):</span><input type = "text"name = "nickName" placeholder="이름(닉네임)"/>
            <span>이메일:</span><input type = "text" placeholder="" disabled/>
            <span>비밀번호:</span><input type = "text" name = "password" placeholder="비밀번호"/>
            <span>비밀번호 확인:</span><input type = "text" name = "pwdChk" placeholder="비밀번호 확인"/>
            <span>성별:</span><input type = "radio" name = "gender" />
        </form>
    </div>


    </body>

    


    
</html>