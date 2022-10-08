<?php
    session_start();
    include ('../../../../serverURL.php');
    include("../../../../dbconn/dbconn.php");

    //카카오 코드 출처 https://mintea.tistory.com/11
    //토큰 갖고오기
    $restApiKey = "c98104b1bb817bfff92b891494185b95";
    $callback_url = $serverURL . "pages/login/api/kakao/callback.php";
    $code = $_GET['code'];

    $shell_string = "curl -v -X POST https://kauth.kakao.com/oauth/token -d 'grant_type=authorization_code' -d 'client_id={$restApiKey}' -d 'redirect_uri={$callback_url}' -d 'code={$code}'";

    $output = shell_exec($shell_string);
    $token_json = json_decode($output, true);

    if(!$token_json['access_token']) {
        echo "<script>alert('카톡 로그인 실패!');location.href = 'login.php';</script>";
        die("failed");
    }

    //토큰으로 사용자 정보 가져오기
    $shell_string = "curl -v -X POST https://kapi.kakao.com/v2/user/me -H 'Authorization: Bearer {$token_json['access_token']}'";
    $output2 = shell_exec($shell_string);
    $user_info_json = json_decode($output2, true);
    
    $name = $user_info_json['properties']['nickname'];
    $email = $user_info_json['kakao_account']['email'];
    $gender = $user_info_json['kakao_account']['gender'];
    $age_range = $user_info_json['kakao_account']['age_range'];

    //가입되어있으면 홈으로 아니면 회원가입 페이지로
    $query = "SELECT `ID` FROM `memory_member_table` WHERE `ID` = '".$email."'";
    $result = mysqli_query($conn,$query);
    $chk = mysqli_num_rows($result);

    if($chk != 0) {
        $_SESSION['ID'] = $email;
        $_SESSION['loginAPI'] = 'kakao';
        header("Location: ../../login.php"); //홈으로 임시
    }
    else { //이거 POST 방식으로 바꿔야됨
        $email = urlencode($email);
        $name = urlencode($name);
        $gender = urlencode($gender);
        $age_range = urlencode($age_range);
        $url = "Location: create_acc.php"."?email=".$email."&name=".$name."&gender=".$gender."&age_range=".$age_range;
        
        // echo $url;
        header($url);
    }
?>

