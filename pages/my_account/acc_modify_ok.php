<?php 
    session_start();
    include('../../dbconn/dbconn.php');
    include('../../serverURL.php');

    if(!isset($_SESSION['ID'])) {
        echo "<script>alert('로그인 이후 이용 가능합니다.');location.href = '../main/home.php';</script>";
    }

    $history = $_SERVER['HTTP_REFERER'];

    $m_ID = $_SESSION['ID']; 
    $query = "SELECT `id_No` FROM `memory_member_table` WHERE `ID` = '".$m_ID."'";
    $data = mysqli_fetch_array(mysqli_query($conn,$query));
    $id_No = $data['id_No'];

    $name = $_POST['name'];
    $password = $_POST['password'];
    
    $query = "UPDATE `memory_member_table` SET `Name` = '$name', `PW` = '$password' WHERE `id_No` = $id_No";
    mysqli_query($conn,$query);

    $file = $_FILES['file'];
    $f_name = $file['name'];

    if(!empty($f_name)) {
        $f_size = $file['size'];
        $mb_size = $f_size/1024/1024;
        $f_tmp_name = $file['tmp_name'];
        $availExt = array("gif","jpeg","jpg","png");
        $rs_name = date("Y_m_d_h_i_s");
        $todate = date("Y-m-d h:i:s");

        //확장자 검사
        $f_type = explode(".",$f_name);
        $avail_type = array(0,'jpeg','gif','png', 'jpg');
        if(array_search($f_type[1],$avail_type) == 0) {
            echo $f_type . "<script>alert('이미지 파일만 업로드 가능합니다');location.href = '".$history."';</script>";
        }
        else if($mb_size > 5){
            echo "<script>alert('이미지는 5mb를 초과할 수 없습니다');location.href = '".$history."';</script>";
        }
        else {
            //이미 지정된 프로파일 있으면 삭제
            $query = "SELECT `pimg_No` FROM `memory_profile_image_table` WHERE `id_No` = '$id_No' AND `del` = 'N'";
            $result = mysqli_query($conn,$query);
            $data = mysqli_fetch_array($result);
            if(!empty($data['pimg_No'])) {
                $query = "UPDATE `memory_profile_image_table` SET `del` = 'Y' WHERE `id_No` = '$id_No' AND `del` = 'N'";
                mysqli_query($conn,$query);
            }

            //프로필 이미지 DB 삽입
            // echo $todate;
            $query = "INSERT INTO `memory_profile_image_table`(`id_No`, `f_type`, `reg_date`, `del`) VALUES('$id_No', '$f_type[1]', '$todate', 'N')";
            mysqli_query($conn,$query);

            // 프로필 이미지 이름 설정
            $query = "SELECT `pimg_No` FROM `memory_profile_image_table` WHERE `id_No` = '$id_No' AND `del` = 'N'";
            $data = mysqli_fetch_array(mysqli_query($conn,$query));
            $pimg_No = $data['pimg_No'];
            $new_name = $pimg_No . "_" . $id_No . "." . $f_type[1];

            //이미지 업로드
            echo $new_name;
            $saveURL = "../../asset/user_profile/{$new_name}";
            $upload = move_uploaded_file($f_tmp_name, $saveURL);

            if($upload != true) {
                echo "<script>alert('알수 없는 오류로 변경에 실패했습니다');location.href = 'acc_modify.php';</script>"; //임시
            }
          
        }
    }
    echo "hi";
    echo "<script>alert('변경이 완료되었습니다');location.href = 'acc_modify.php';</script>"; //임시
?>
