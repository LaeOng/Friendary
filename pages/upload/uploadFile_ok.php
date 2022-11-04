<?php 
    session_start();
    include('../../dbconn/dbconn.php');
    include('../../serverURL.php');

    if(!isset($_SESSION['ID'])) {
        echo "<script>alert('로그인 후 이용 바랍니다.');location.href = '".$serverURL."pages/main/main.php';</script>";
    }

    $m_ID = $_SESSION['ID']; 
    $query = "SELECT `id_No` FROM `memory_member_table` WHERE `id_No` - '".$m_ID."'";
    $result = mysqli_query($conn,$query);
    $mid_No = mysqli_fetch_array($result);

    if(isset($_POST['group_No'])) {
        $group_No = $_POST['group_No'];
    }
    else {
        // 임시 주석 처리
        // echo "<script>alert('잘못된 접근입니다.');location.href = '".$serverURL."pages/main/main.php';</script>";
    }

    if(isset($_POST['bundle_No'])) {
        $bundle_No = $_POST['bundle_No'];
    }
    else {
        $bundle_No = 0;
    }

    //파일 유효성 검증
    $file_chk = 1;

    //그룹 임시로 1번 그룹으로 고정
    $group_No = 1;

    $file = $_FILES['file'];
    $text = $_POST['text'];
    $location = $_POST['location'];


    $availExt = array(0, "gif","jpeg","jpg","png");
    $rs_name = date("Ymd");
    $todate = date("Y-m-d h:i:s");
    $f_count = count($file['name']);

    if(isset($file)) {
        
        for ($i = 0; $i < $f_count; $i++) {
            $f_name = $file['name'][$i];
            $f_size = $file['size'][$i];

            $mb_size = $f_size/1024/1024;

            //파일 검사
            $f_type = explode(".",$f_name);
            $avail_type = array(0,'jpeg','gif','png', 'jpg');
            if(array_search($f_type[1],$avail_type) == 0) {
                echo $f_type . "<script>alert('이미지 파일만 업로드 가능합니다');location.href = 'uploadFile.php';</script>";
            }
            else if($mb_size > 5){
                $file_chk = 0;
                echo "<script>alert('이미지는 5mb를 초과할 수 없습니다');location.href = 'uploadFile.php';</script>";
            }
        }

        //업로드
        if($file_chk = 1) {
  
            for($i = 0; $i < $f_count; $i++) {
                $f_name = $file['name'][$i];
                $f_tmp_name = $file['tmp_name'][$i];

                $f_type = explode(".",$f_name);

                $query = "INSERT INTO `memory_content_table`(`group_No`, `bundle_No`, `detail`, `location`, `love`, `hate`, `reg_date`, `del`) VALUES ('$group_No', '$bundle_No', '$text', '$location', '0','0','$todate','N')";
                mysqli_query($conn,$query);

                $query = "SELECT `content_No` FROM `memory_content_table` WHERE `group_No` = '$group_No' ORDER BY `content_No` DESC LIMIT 1";
                $data = mysqli_fetch_array(mysqli_query($conn,$query));

                $new_name = $data['content_No'] . "_" . $group_No . "_" . $bundle_No . "." . $f_type[1];
                $saveURL = "../../content/{$new_name}";

                $upload = move_uploaded_file($f_tmp_name, $saveURL);

            }
            
            echo "<script>location.href = 'uploadFile.php';</script>";
        }
    }
?>