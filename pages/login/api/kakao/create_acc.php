<?php
    include ('../../../../serverURL.php');
    include("../../../../dbconn/dbconn.php");

    if(!$_GET['email']) {
        echo "<script>alert('잘못된 접근입니다!');</script>";
    }
    else {
        $email = $_GET['email'];
        $name = $_GET['name'];
        $gender = $_GET['gender'];
        $age_range = $_GET['age_range'];
    }
?>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("input:checkbox").on('click',function(){

            if($("#realNameChk").is(":checked")) {
                document.getElementById("nickName").value = "<?php echo $name?>";
            }
            else {
                document.getElementById("nickName").value = "";
            }
        });
    }); 
</script>

<!DOCTYPE html>

<form id = "create_acc_form" method = "GET" action = "create_acc_ok.php">
    사용하실 이름을 적어주세요 <input type = "text" id = "nickName" name = "name" placeholder = "이름 or 닉네임"><br>
    실명 사용하기 <input type = "checkbox" id = "realNameChk">
    <input type = "hidden" name = "email" value = "<?php echo $email ?>">
    <input type = "hidden" name = "gender" value = "<?php echo $gender ?>">
    <input type = "hidden" name = "age_range" value = "<?php echo $age_range ?>">
    <button type = "submit">시작하기</button>
</form>

    