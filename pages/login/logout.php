<?php
session_start();

// API들 로그아웃 추가해야함

session_destroy();
?>

<?php 
    echo "<script>alert('안전하게 로그아웃 되었습니다.');location.href = '../main/home.php';</script>";
?>
