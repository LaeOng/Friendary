<?php 
    session_start();
    include('../../dbconn/dbconn.php');
    // include('../../serverURL.php');
    // include 주석 풀면 css 틀어지는 오류 발생 임시처리
    $serverURL = "https://memory1678.iwinv.net/hbk3/";

    if(!isset($_SESSION['ID'])) {
        echo "<script>alert('로그인 후 이용 바랍니다.');location.href = '".$serverURL."pages/main/home.php';</script>";
    }

    if(isset($_POST['group_No'])) {
        $group_No = $_POST['group_No'];
    }
    else {
        // 임시 주석처리
        // echo "<script>alert('잘못된 접근입니다.');location.href = '".$serverURL."pages/main/home.php';</script>";
    }

    if(isset($_POST['bundle_No'])) {
        $bundle_No = $_POST['bundle_No'];
    }
    else {
        empty($bundle_No);
    }
?>

<!DOCTYPE html>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('.feed_head').load("../feed/feed_head.php");

        $('.list').load("feed_list.php");
    });

    function share_btn() {
        let form = document.querySelector('#content_upload_form');
        let file = form.file;

        if(!isset(file)) {
            alert("업로드할 이미지를 선택해주세요");
        }
        else {
            form.submit();
        }
    }
</script>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <title>파일 업로드</title>
        <link rel="stylesheet" href="./uploadFile.css">
       <script src="https://kit.fontawesome.com/6a08573921.js" crossorigin="anonymous"></script>
    </head>
    <body>
      <!-- 수정 요청: feed_head가 html body 에 씌워진 justify-content: center & align-content: center 때문에 상단에 노출이 안됨 -->
      <div class = "feed_head"></div>
      <div class="wrapper">
        <form id = "content_upload_form" action ="uploadFile_ok.php" method = "POST" enctype = "multipart/form-data">
          <!-- 임시 그룹 = 1, 번들 = 0 그룹생성과 번들 생성이 구현되지 않음-->
          <input type = "hidden" name = "group_No" value = 1>
          <input type = "hidden" name = "bundle_No" value = 0>
          <div class="upload-box">
              <div class="upload-box-content">
                  <label for="fileInput">
                      <i class="fa-solid fa-camera fa-4x"></i></label>
                      <input id="fileInput" type="file" id = "file_Upload" name = "file[]" multiple>
                      <div class="upload-text">사진을 업로드 하세요</div>
              </div>
          </div> <!-- upload-box -->
        
          <div class="post-text-location">
            <div class="post-text">
             	<textarea class="post-text-input" name = "text" placeholder="추억에 도움이 될만한 글을 작성해주세요" cols="10" rows="4"></textarea>
            </div>
          <div class="post-location">
			  <input type="text" id="post-location-input" name="location" required minlength="5" maxlength="30" placeholder="장소를 입력하세요">
          </div>                
          <button type="submit" class="share" onclick = "share_btn()">공유하기</button>
          </div>
        </form>
      </div>

    </body>
    
</html>