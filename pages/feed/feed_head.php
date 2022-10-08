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

.boundary{
    margin-right: 3%;
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

</style>

<html>
<div class="icon">
    <img class="boundary" src="../../asset/boundary.png"/>
    <img class="Friendary" src="../../asset/FrienDary.png"/>
</div>
<div class="button_root">
    <button class="upload_button">업로드</button>
    <button class="folder_button">폴더 생성</button>
    <button class="invite_button">사람 초대</button>
    <img class="user_logo"src="../../asset/account.png" alt="user_logo"/>
</div>
</html>