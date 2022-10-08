<?php 
    include('../../serverURL.php');
?>

<!DOCTYPE html>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>

    //회원가입시 성공&오류 처리 e(1~n) = 에러, s(1~n) = 성공
    $("#submit_btn").click(function(e) {
        e.preventDefault();
        
        let window_form = $("#window_form").serialize();
        let sign_up_url = $serverURL + "/pages/main/sign_up_ok.php";

        $.ajax({
            type: "POST",
            url: sign_up_url,
            data: window_form,
            dataType: "text",
            success: function (data) {
                if($.trim(data) == 'e1') {
                    alert ("이미 존재하는 회원입니다!" + $.trim(data));
                    $("#window_form")[0].reset();
                }
                else if($.trim(data) == 'e2') {
                    alert ("비밀번호가 일치하지 않습니다!" + $.trim(data));
                    $("#password_input").val('');
                    $("#password_check_input").val('');
                }
                else if($.trim(data) == 'e3') {
                    alert ("알 수 없는 오류가 발생하였습니다 관리자에게 문의해주세요!" + $.trim(data));
                    $("#window_form")[0].reset();
                }
                else if($.trim(data) == 'e4') {
                    alert ("이름을 입력해주세요!" + $.trim(data));
                    $("#name_input").val('');
                }
                else if($.trim(data) == 'e5') {
                    alert ("이메일을 입력해주세요!" + $.trim(data));
                    $("#email_input").val('');
                }
                else if($.trim(data) == 'e6') {
                    alert ("비밀번호를 입력해주세요!" + $.trim(data));
                    $("#password_input").val('');
                }
                else if($.trim(data) == 's1') {
                    $(".show_window").load("../login/login.php");
                    alert ("회원가입을 완료하였습니다! 로그인창으로 이동합니다." + $.trim(data));
                }
                else {
                    alert ("알 수 없는 오류가 발생하였습니다 관리자에게 문의해주세요11!" + $.trim(data));
                    $("#window_form")[0].reset();
                }
            },
            error: function (request, status, error, data) {
                alert ("알 수 없는 오류가 발생하였습니다. 관리자에게 문의해주세요!\n" + "code:" + request.status + "\n" + "message:"+request.responseText + "\n" + "error:" + error);
                $("#window_form")[0].reset();
            }
        });
    });

</script>

<html lang="en">

<link rel="stylesheet" href="home_input.css">

    <div class="show_window">
        <div class="window_header">
            <div class="window_title">회원 가입</div>
        </div>
        <form class="window_form" id = "window_form" method = "POST">
            <input type="text" class="input" id="name_input" name = "name" placeholder="이름 or 닉네임">
            <input type="text" class="input" id="email_input" name = "email" placeholder="이메일">
            <input type="text" class="input" id="password_input" name = "password" placeholder="비밀번호">
            <input type="text" class="input" id="pwdChk_input" name ="pwdChk" placeholder="비밀번호 확인">
            <button class="submit_btn" id = "submit_btn" type="submit">회원가입</button>
            <button class = "cancel">취소</button>
        </form>
    </div>

</body>
</html>