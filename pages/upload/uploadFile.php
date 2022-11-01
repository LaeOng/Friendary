<?php 
    session_start();
    include('../../dbconn/dbconn.php');
    // include('../../serverURL.php');
    // include 주석 풀면 css 틀어지는 오류 발생 임시처리
    $serverURL = "https://memory1678.iwinv.net/hbk3/";

    if(!isset($_SESSION['ID'])) {
        echo "<script>alert('로그인 후 이용 바랍니다.');location.href = '".$serverURL."pages/main/main.php';</script>";
    }

    if(isset($_POST['group_No'])) {
        $group_No = $_POST['group_No'];
    }
    else {
        // 임시 주석처리
        // echo "<script>alert('잘못된 접근입니다.');location.href = '".$serverURL."pages/main/main.php';</script>";
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
              <span class="placeholder">추억에 도움이 될만한 글을 작성해주세요</span>
              <div class="input editable" contenteditable="true" spellcheck="false"></div>
              <div class="input readonly" contenteditable="true" spellcheck="false"></div>
            </div>
          <div class="post-location" name = "post-location">
            <span class="placeholder">장소를 입력하세요</span>
            <div class="input editable" contenteditable="true" spellcheck="false"></div>
            <div class="input readonly" contenteditable="true" spellcheck="false"></div>
          </div>                
          <button class="share" onclick = "share_btn()"><span>공유하기</span></button>
          </div>
        </form>
      </div>
<script>
editableInput = wrapper.querySelector(".editable"),
readonlyInput = wrapper.querySelector(".readonly"),
placeholder = wrapper.querySelector(".placeholder"),
button = wrapper.querySelector("share");
editableInput.onfocus = ()=>{
  placeholder.style.color = "#5B5A5A";
}
editableInput.onblur = ()=>{
  placeholder.style.color = "c5ccd3";
}
editableInput.onkeyup = (e)=>{
  let element = e.target;
  validated(element);
}
editableInput.onkeypress = (e)=>{
  let element = e.target;
  validated(element);
  placeholder.style.display = "none";
}
function validated(element){
  let text;
  let maxLength = 100;
  let currentlength = element.innerText.length;
  if(currentlength <= 0){
    placeholder.style.display = "block";
    counter.style.display = "none";
    button.classList.remove("active");
  }else{
    placeholder.style.display = "none";
    counter.style.display = "block";
    button.classList.add("active");
  }
  counter.innerText = maxLength - currentlength;
  if(currentlength > maxLength){
    let overText = element.innerText.substr(maxLength); //extracting over texts
    overText = `<span class="highlight">${overText}</span>`; //creating new span and passing over texts
    text = element.innerText.substr(0, maxLength) + overText; //passing overText value in textTag variable
    readonlyInput.style.zIndex = "1";
    counter.style.color = "#e0245e";
    button.classList.remove("active");
  }else{
    readonlyInput.style.zIndex = "-1";
  }
  readonlyInput.innerHTML = text; //replacing innerHTML of readonly div with textTag value
}</script>
    </body>
    
</html>