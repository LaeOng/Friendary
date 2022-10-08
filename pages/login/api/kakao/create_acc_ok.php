<?php
    session_start();
    include ('../../../../serverURL.php');
    include("../../../../dbconn/dbconn.php");

    //검증
    if(!$_GET['email']) {
        echo "<script>alert('잘못된 접근입니다!');</script>";
    }
    else {
        $email = $_GET['email'];
        $name = $_GET['name'];
        $gender = $_GET['gender'];
        $age_range = $_GET['age_range'];
    }

    $todate = date("Y-m-d h:i:s");

    //DB에 입력
    $query = "INSERT INTO `memory_member_table`(`ID`,`Name`,`PW`,`authority`, `type`, `reg_date`,`del`) VALUES ('".$email."','".$name."','',1,1,'".$todate."','N')";
    $result = mysqli_query($conn,$query);

    if($result) {
        $_SESSION['ID'] = $email;
        $_SESSION['loginAPI'] = 'kakao';
        header("Location: ../../login.php"); //홈으로 임시
    }
    else {
        echo "<script>alert('입력 실패!');</script>";
    }
    
    // header("Location: ../../login.php"); //홈으로 임시
?>