<?php 
    session_start();
    include('../../dbconn/dbconn.php');
    // include('../../serverURL.php');
    
    header("Content-Type: application/json"); //json 필수

    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pwdChk = $_POST['pwdChk'];

    if($password != $pwdChk) {
        echo "e2";
    }
    else if (empty($name)) {
        echo "e4";
    }
    else if (empty($email)) {
        echo "e5";
    }
    else if (empty($password)) {
        echo "e6";
    }

    else {
        $query = "SELECT `ID` FROM `memory_member_table` WHERE `ID` = '".$email."'";
        $result = mysqli_query($conn,$query);
        $data = mysqli_fetch_array($result);

        //이미 존재하는 회원일 경우
        if($data) {
            echo "e1";
        }
        else {
            $todate = date("Y-m-d h:i:s");
            $query2 = "INSERT INTO `memory_member_table`(`ID`, `Name`, `PW`, `authority`, `type`, `reg_date`, `del`) VALUES ('".$email."', '".$name."', '".$password."', 1, 1, '".$todate."', 'N')";
            $result2 = mysqli_query($conn,$query2);
            if($result) {
                echo "s1";
            }
            
            else {
                echo "e3";
            }
        }
    }
?>

