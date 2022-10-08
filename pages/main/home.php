<?php 
    session_start();
    include('../../dbconn/dbconn.php');
    include('../../serverURL.php');
?>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>

//home_window에 상태별로 jquery 로 페이지 호출
$(document).ready(function() {

    $(".home_window").load("main.php");

    $("#top_logo").click(function() {
        $(".home_window").load("main.php");
    });

    $("#sign_up").click(function(){
        $(".home_window").load("sign_up.php");
    });

    $("#login").click(function() {
        $(".home_window").load("../login/login.php");
    });
    
    $("#logout").click(function() {
        $(".home_window").load("../login/logout.php");
    });
});

</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <div class="icon">
            <img class="boundary" src="../../asset/boundary.png"/>
            <img class="Friendary" src="../../asset/FrienDary.png" id = "top_logo"/>
        </div>

<?php
    //로그인 상태 확인
    if(!isset($_SESSION['ID'])) {
?>
            <button class="login_button" id = "sign_up">회원가입</button>
            <button class="login_button" id = "login">로그인</button>
<?php
    }
    else {
?>
            <button class="login_button" id = "logout">로그아웃</button>
            <button class="photo_share">사진 공유하기</button>
<?php
    }
?>
        </div>
    </div>
    <div class="home_window">

    </div>
        
</div>
</body>
</html>