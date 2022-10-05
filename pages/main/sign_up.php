<?php 
    include('../../serverURL.php');
?>

<!DOCTYPE html>
<html lang="en">

<style>
* {
    margin: 0;
    padding: 0;
}
.sign_up_window{
    width: 500px;
    height: 600px;
    background-color:rgba(91,90,90,0.8);
    border-radius: 70px;
    margin: 120px auto 0 auto;
}

.sign_up_header{

    display: flex;
    flex-direction: column ;
    align-items: center;
    padding-top: 40px;
}

.sign_up_title{
        color:white;
        font-weight: 700;
        font-size:40px;
}



.sign_up_form{
    display: flex;
    flex-direction: column ;
    align-items: center;
    margin-top: 49px;
}

.sign_up_input {
    width: 313px;
    height: 15px;
    padding: 17.5px 27px;
    font-size: 14px;
    border-radius: 10px;
    border: none;
    opacity: 1;
}

.name,.email,.nickname,.password {
    margin-bottom: 14px;
}

.password_check {
    margin-bottom: 39px;
}

.sign_up_submit {
        width: 367px;
        height: 46px;
        background-color: #007AEB;
        color: white;
        border: none;
        border-radius: 10px;
        opacity: 1.0;
}

</style>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    // $(document).ready(function() {

        $("#sign_up_submit").click(function(e) {
            e.preventDefault();
            
            let sign_up_form = $("#sign_up_form").serialize();
            let sign_up_url = $serverURL + "/pages/main/sign_up_ok.php";

            $.ajax({
                type: "POST",
                url: sign_up_url,
                data: sign_up_form,
                dataType: "text",
                success: function (data) {
                    if($.trim(data) == 'e1') {
                        alert ("이미 존재하는 회원입니다!" + $.trim(data));
                        $("#sign_up_form")[0].reset();
                    }
                    else if($.trim(data) == 'e2') {
                        alert ("비밀번호가 일치하지 않습니다!" + $.trim(data));
                        $("#password_sign_up_input").val('');
                        $("#password_check_sign_up_input").val('');
                    }
                    else if($.trim(data) == 'e3') {
                        alert ("알 수 없는 오류가 발생하였습니다 관리자에게 문의해주세요!" + $.trim(data));
                        $("#sign_up_form")[0].reset();
                    }
                    else if($.trim(data) == 'e4') {
                        alert ("이름을 입력해주세요!" + $.trim(data));
                        $("#name_sign_up_input").val('');
                    }
                    else if($.trim(data) == 'e5') {
                        alert ("이메일을 입력해주세요!" + $.trim(data));
                        $("#email_sign_up_input").val('');
                    }
                    else if($.trim(data) == 'e6') {
                        alert ("비밀번호를 입력해주세요!" + $.trim(data));
                        $("#password_sign_up_input").val('');
                    }
                    else if($.trim(data) == 's1') {
                        $(".sign_up_window").load("../login/login.php");
                        alert ("회원가입을 완료하였습니다! 로그인창으로 이동합니다." + $.trim(data));
                    }
                    else {
                        alert ("알 수 없는 오류가 발생하였습니다 관리자에게 문의해주세요11!" + $.trim(data));
                        $("#sign_up_form")[0].reset();
                    }
                },
                error: function (request, status, error, data) {
                    alert ("알 수 없는 오류가 발생하였습니다. 관리자에게 문의해주세요!\n" + "code:" + request.status + "\n" + "message:"+request.responseText + "\n" + "error:" + error);
                    $("#sign_up_form")[0].reset();
                }
            });
        });
    // });

</script>


    <div class="sign_up_window">
        <div class="sign_up_header">
            <div class="sign_up_title">회원 가입</div>
        </div>
        <form class="sign_up_form" id = "sign_up_form" method = "POST">
            <input type="text" class="name sign_up_input" id="name_sign_up_input" name = "name" placeholder="이름 or 닉네임">
            <input type="text" class="email sign_up_input" id="email_sign_up_input" name = "email" placeholder="이메일">
            <input type="text" class="password sign_up_input" id="password_sign_up_input" name = "password" placeholder="비밀번호">
            <input type="text" class="password_check sign_up_input" id="password_check_sign_up_input" name ="pwdChk" placeholder="비밀번호 확인">
            <button class="sign_up_submit" id = "sign_up_submit" type="submit">회원가입</button>
        </form>
    </div>

</body>
</html>