<?php 
    session_start();
    include('../../dbconn/dbconn.php');
    include('../../serverURL.php');
    // session_cache_limiter("private_no_expire");

    $sessiosn = $_SESSION['ID'];
    if(!isset($_SESSION['ID'])) {
        echo "<script>alert('로그인 이후 이용 가능합니다.');location.href = '../main/home.php';</script>";
    }
?>

<style>
* {
    margin: 0;
    padding: 0;
}
html, body {
  height: 100%;
  width: 100%;
}

.icon{
    display: flex;
    margin-left: 1%;
    margin-right:40%;
}

.header {
    display: flex;
    width: 100%;
    height: 81px;
    align-items: center;
    border-bottom: 1px solid #F5F5F5;
    padding-top: 10px;
    border:none;
    /* justify-content: space-between; */
    
    background-color: #D9D9D9;
}

#back_button{
    background-color: white;
    margin-left: 30px;
    margin-top: 30px;
    border:none;
    width:20px;
    height: 40px;
}

#window{
    width:700px;
    height: 400px;
    margin: 60.05px auto 141.05px;
    border-radius: 10px;
    background-color: #EFEFEF;
}

#profile_title{
    font-size: 24px;
    padding-top: 30px;
}

#photo_and_profile{
    display:flex;
}

#img-container {
    width: 100%;
    text-align: center;
    
    margin-bottom: 16px;
}

#photo_domain{
    height: 338px;
    width: 40%;
    display:flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

#user_profile {
    box-sizing: border-box;
    display:inline-block;
    width: 200px;
    height: 200px;
}

#upload_button{
    background-color: white;
    border-radius: 20px;
    width:150px;
    border: none;
    height: 30px;
}

#profile_domain{
    height: 338px;
    width: 60%;
    display: flex;
    flex-direction: column;
}

#profile_form{
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 50px;
}

.input{
    width: 300px;
    height: 35px;
    margin-bottom: 20px;
    border:none;
    border-radius: 10px;
    padding-left: 20px;
}

#button_domain{
    display: flex;
    flex-direction: row;
    margin-top: 35px;
}

#correction_button{
    border: none;
    border-radius: 10px;
    background-color: #007AEB;
    width:100px;
    height: 36px;
    margin-left: 100px;
}

#cancel_button{
    border:none;
    border-radius: 10px;
    width:100px;
    height: 36px;
    background-color: white;
    margin-left: 25px;
}

.dbChk {
    width: 300px;
    height: 20px;
    border: none;
    background-color: #EFEFEF;
    padding-left: 20px;
    font-size: 10px;    
}

.filebox input[type="file"] {
    position: absolute;
    width: 0;
    height: 0;
    padding: 0;
    overflow: hidden;
    border: 0;
}

</style>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>

    $(document).ready(function() {

    });

    //수정버튼
    function correction_btn() {

        let form = document.querySelector('#profile_form');
        let name = form.name.value;
        let password = form.password.value;
        let pwdChk = form.pwdChk.value;

        $('#pass')

        if(password.length <= 8) {
            event.preventDefault();
            alert("비밀번호는 최소 8자 이상이어야 합니다");
            $('#password_dbChk').text("비밀번호는 최소 8자 이상이어야합니다");
        }
        else if(password != pwdChk) {
            event.preventDefault();
            alert("비밀번호가 일치하지 않습니다");
            $('#password_dbChk').text("비밀번호가 일치하지 않습니다");
        }
        else {
            // alert("Not Hello");
            form.submit();
        }
    }


</script>

<?php
    //사용자 정보 가져오기
    $sessionid = $_SESSION['ID'];

    $query = "SELECT `ID`, `Name` FROM `memory_member_table` WHERE `ID` = '$sessionid'";
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_array($result);
?>
    
<html>

    <div class="header">
        <div class="icon">
            <img class="logo" src="../../asset/FriendaryLogo.png"/>
        </div>
    </div>

    <!-- <button id="back_button"><img id="back_image" src="../../asset/backspace_button.png"></button> -->


    <!-- 수정요청: user_profile.png (이전 empty_profile.png) 와 backspace_button.png 파일이 없어 자꾸 오류가 뜨므로 주석처리함 -->
    <div id="window">
        <div id="profile_title" style="text-align: center;">프로필 수정</div>
        <!-- 수정요청: 폼태크 범위를 위아래로 늘림에 따라 css 틀어짐 / 사유: 업로드 버튼과 수정,취소 버튼이 모두 form 태그 안에 포함되어야함-->
        <form id="profile_form" method="POST" enctype = "multipart/form-data" action = "acc_modify_ok.php">
            <div id="photo_and_profile">
                <div id="photo_domain">
                    <div id="img-container">
                        <?php
                        //프사 불러오기
                        // 수정요청: user_profile 이미지 사이즈 자동조절요청 / 직접 회원가입해서 이미지 업로드 하면서 해봐야할듯
                        $query = "SELECT a.`id_No`, b.`pimg_No`, b.`f_type` FROM `memory_member_table` AS a INNER JOIN `memory_profile_image_table` AS b ON a.`id_No` = b.`id_No` WHERE a.`ID` = '$sessionid' AND b.`del` = 'N'";
                        $data2 = mysqli_fetch_array(mysqli_query($conn,$query));
                        echo $data2['pimg_No'];
                        if($data2['pimg_No']) {
                            echo "set";
                        }
                        else {
                            echo "not set";
                        }
                        if(isset($data2['pimg_No'])) {
                            $f_name = $data2['pimg_No'] . "_" . $data2['id_No'] . "." . $data2['f_type'];
                            echo $f_name;
                        ?>
                            <img class="user_profile" src="../../asset/user_profile/<?php echo $f_name?>"/>

                        <?php    
                        }             
                        else {
                        ?>
                        <!-- <img class="user_profile" src="../../asset/user_profile.png" alt="user_profile"/> -->
                        <?php 
                        } 
                        ?>    
                    </div>
                    <!-- <input type = "file" name = "fileUp" id = "upload_button" value = "업로드"></input> -->
                    <div class="filebox">
                        <label for="file" id = "upload_button">파일찾기</label> 
                        <input type="file" id="file" name = "file">
                    </div>
                    <!-- <button id="upload_button">업로드</button> -->
                </div>
                <div id="profile_domain">
                    <input type="text" class="input" id="name_input" name = "name" value="<?php echo $data['Name']?>">
                    <!-- <span class = "dbChk" id = "name_dbChk"></span> //닉네임 중복 체크 안해도 되지 않나요-->
                    <!-- 수정요청: 임시 css 적용됨 차후에 수정 요청 / 이메일은 disabled 처리해야함-->
                    <input type="text" class="input" id="email_input" name = "email" value="<?php echo $data['ID']?>" style = "border: 1px solid" disabled/>
                    <input type="text" class="input" id="password_input" name = "password">
                    <span class = "dbChk" id = "password_dbChk"></span>
                    <input type="text" class="input" id="pwdChk_input" name = "pwdChk">
                    <span class = "dbChk" id = "pwdChk_dbChk"></span>

                    <div id="button_domain">
                        <button id="correction_button" onclick = "correction_btn()">수정</button>
                        <button id="cancel_button" onclick = "location.href = 'my_account.php';">취소</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</html>