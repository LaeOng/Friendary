<?php 
    session_start();
    include('../../dbconn/dbconn.php');
    include('../../serverURL.php');
?>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {

$("#sign_up").click(function(){
    $(".home_window").load("sign_up.php");
});

});

</script>

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

<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../style/login.css">
        <meta name="google-signin-scope" content="profile email">
        <meta name="google-signin-client_id" content="90400337573-emv9t0inkc50gnvjabea71vb6914oi1r.apps.googleusercontent.com">
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
        <title>Friendary login page</title>
    </head>
 
<body>
    <div class="login-content">
        <div class="login-content-body">
            <div class="login-content-body-main">
                <div class="login-content-body-main-title">
                    <div class="login-content-body-main-title-logo">FrienDary</div>
                </div>
                <div class="login-content-body-main-title-text">프렌더리에 오신 것을 환영합니다.</div>
                <div class="login-content-body-main-info">
                    <div class="login-content-body-main-info-id">
                        <input id="userEmail" name="userEmail" placeholder="이메일" type="email" />
                    </div>
                    <div class="login-content-body-main-info-pw">
                        <input id="userPw" name="userPw" placeholder="비밀번호" type="pw" />
                    </div>
                    <div class="login-content-body-main-btn-login">
                        <button type="submit" id="login">
                    로그인
                    </button>
                  </div>
                  </div>
            <div class="divider">
                <div class="line"></div>
                <p>OR</p>
                <div class="line"></div>
             </div>

             <div class="login-content-body-main-social">
               <button type="submit" class="social-login-google" onclick="onSignIn();">
                    <img src="../../asset/GoogleIcon.png" alt="" class="google-img">
                    <span>Sign in with Google</span>
                </button>
                <br>
                <button type="submit" class="social-login-kakao">
                    <img src="../../asset/kakaoBtn.png.crdownload" alt="" class="kakao-img">
                    <span>Sign in with Kakao</span>
                </button>
            </div>

            <div class="login-content-body-main-signup">
                <div class="login-content-body-main-signup-intro">아직 계정이 없으신가요?</div>
                <div class="login-content-body-main-signup-btn">
                   회원가입
                </div>
            </div>
            </div>
            </div>
            <script>
                function onSignIn(googleUser){
                    var profile = googleUser.getBasicProfile();
                    console.log("ID: " + profile.getId());
                    console.log('Full Name: ' + profile.getName());
                    console.log('Given Name: ' + profile.getGivenName());
                    console.log('Family Name: ' + profile.getFamilyName());
                    console.log("Image URL: " + profile.getImageUrl());
                    console.log("Email: " + profile.getEmail());
                    
                    // The ID Token 
                    var id_token = googleUser.getAuthResponse().id_token;
                    console.log("ID Token: " + id_token);
                }
                <a href="javascript:kakaoLogin();"></a>
            <script src="https://developers.kakao.com/sdk/js/kakao.js"></script>
            <script>
             window.kakao.init("727f6c3715e6aa8d8a2767b481562f58"); //727f6c3715e6aa8d8a2767b481562f58 javascript key

             function kakaoLogin(){
             window.Kakao.Auth.login({
             scope:'profile, account_email, gender',
             suceess: function(authObj){
                console.log(authObj);
                window.Kakao.API.request({
                    url:'/v2/user/me',
                    success: res => {
                        const kakao_account = res.kakao_account;
                        console.log(kakao_account);
                    }
                });
            }
        })
    }
// http://localhost:5500/pages/login/login.php => redirect uri
            </body>

            </html>

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
