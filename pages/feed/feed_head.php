<style>
* {
    margin: 0;
    padding: 0;
}

html, body {
  height: 100%;
  width: 100%;
}

.header {
    display: flex;
    width: 100%;
    height: 81px;
    align-items: center;
    border-bottom: 1px solid #F5F5F5;
    padding-top: 10px;
    border:none;
    background-color: #D9D9D9;
}

.button_root {
    display: flex;
    align-items: center;

}

.icon{
    display: flex;
    margin-left: 1%;
    margin-right:40%;
}

.boundary{
    margin-right: 3%;
}

.upload_button{
    align-items: center;
    width:200px;
    height: 50px;
    background-color:#007AEB;
    border-radius: 50px;
    border:none;
    color: #FFFFFF;     
    margin-right: 10%;
}

.folder_button{
    align-items: center;
    width:200px;
    height: 50px;
    border-radius: 50px;
    margin-right: 10%;
    border:none;
}

.invite_button{
    align-items: center;
    width:200px;
    height: 50px;
    border-radius: 50px;
    border:none;
    margin-right: 20%;
}
.user_logo{
    width: 45px;
    height: 45px;
}

.user_menu {
    display: flex;
    height: 200px;
    width: 150px;
    border: 1px solid;
    float: right;
}
.user_menu ul {
    border: 1px solid;
}

.user_menu ul li {
    border: 1px solid;
    height: 30px;
    width: 150px;
    text-align: center;
}

<?php
    $req = $_POST['popup'];
?>


</style>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(".user_menu").hide(); //초기값

        //슬라이드 함수
        $(".user_logo").click(function() {
            $(".user_menu").slideToggle("fast");
        });

    });
</script>

<?php
    //페이지별 구분
    if(isset($_POST['ptype'])) {
        $ptype = $_POST['ptype'];
    }
    else {
        $ptype = "standard";
    }

    //피드일 경우
    if ($ptype == "feed") {
        $style_input = "style = 'visibility : visible;'";
    }
    else {
        $style_input = "style = 'visibility : hidden;'";
    }
?>

<html>
<div class = "header">
    <div class="icon">
        <img class="boundary" src="../../asset/boundary.png"/>
        <img class="Friendary" src="../../asset/FrienDary.png"/>
    </div>
    <div class="button_root">
        <button class="upload_button" <?php echo $style_input?>><a href = "../upload/uploadFile.php">업로드</a></button>
        <button class="folder_button" <?php echo $style_input?>>그룹 생성</button>
        <button class="invite_button" <?php echo $style_input?>>사람 초대</button>
        <img class="user_logo"src="../../asset/account.png" alt="user_logo"/>
    </div>
</div>
<div class = "user_menu" style = "display: none">
    <ul>
        <li>내 프로필</li>
        <li>그룹관리</li>
        <li><a href = "../my_account/acc_modify.php">프로필 수정</a></li>
        <li>결제 정보 관리</li>
        <li>로그아웃</li>
    </ul>
</div>
</html>