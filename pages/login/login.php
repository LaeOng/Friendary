<?php 
    session_start();
    include('../../dbconn/dbconn.php');
    include('../../serverURL.php');
?>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>


<script> //카카오 코드 출처 https://mintea.tistory.com/11
    $jsApiKey = "64374b375fbf28c742a1960e1c3d943e";
    
    Kakao.init($jsApiKey);
    
    function loginKakao() {
        Kakao.Auth.authorize(
            {
                redirectUri: "<?php echo $serverURL?>" + "pages/login/api/kakao/callback.php"
            }
        )
    }

</script>


<!DOCTYPE html>

<div>테스트용 일반회원 ID: laeong0423@gmail.com, PW: laeong1234</div><br>

<?php
    if(isset($_SESSION['ID'])) {
?>
    <div>로그인된 상태입니다.</div>
    <br>
    <form id = "tempLogout" method = "POST" action = "logout.php">
        <button>로그아웃하기</button>
    </form><br>
<?php
    }
    else {
?>
    <form id = "loginForm" method = "POST" action = "../login/login_ok.php">
        <div>일반회원 로그인</div><br>
        <input type = "text" name = "ID" placeholder = "Email"><br>
        <input type = "text" name = "PW" placeholder = "Password"><br>
        <button name = "loginButton">로그인</button><br>
    </form>
    
    <div>카톡로그인</div><br>    
    <button type = "button">
        <img src = "api/kakao/kakaoLoginButton.png" onclick = "loginKakao()">
    </button><br>

<?php
    }
?>

<!-- 다른이미지 기능없음 display:none -->
<button type="button" style = "display: none"> 
        <img src="https://k.kakaocdn.net/14/dn/btroDszwNrM/I6efHub1SN5KCJqLm1Ovx1/o.jpg">
</button><br>

<!-- 디버깅용 -->
<?php
    if(isset($_SESSION['ID'])) {
        echo "세션ID: " . $_SESSION['ID'];
        echo "<br>";
        if(isset($_SESSION['loginAPI'])) {
            echo "loginAPI: " . $_SESSION['loginAPI'];
        }
        else {
            echo "로긴API: 업성";
        }
    }
    else {
        echo "세션ID: 업성 ";
    }
    
?>



</html>
