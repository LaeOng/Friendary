<?php
    session_start();
    include('../../dbconn/dbconn.php');

    $ID = $_POST['ID'];
    $PW = $_POST['PW'];

    $query = "SELECT * FROM `memory_member_table` WHERE `ID` ='".$ID."' AND `PW` = '".$PW."'";
    $query2 = "SELECT * FROM `memory_member_table` WHERE `ID` ='".$ID."'";
        
    $result = mysqli_query($conn,$query);
    $result2 = mysqli_query($conn,$query2);

    $user_data = mysqli_fetch_array($result);
    $user_data2 = mysqli_fetch_array($result2);

    if(isset($user_data)){
        $_SESSION['ID'] = $user_data['ID'];
        header("Location: login.php");
        echo $_SESSION['ID'];
        echo $user_data['ID'];
    }
    else if(isset($user_data2)){
        echo "<script>alert('비밀번호를 다시 확인해주세요!');location.href = 'login.php';</script>";
    }
    else {
        echo "<script>alert('존재하지 않는 회원입니다.');location.href = 'login.php';</script>";
    }

?>





