<?php
require "../db_conn1.php";
require "../UserInfo.php";

if (isset($_POST['submit'])){

    $userInfoIp = UserInfo::get_ip();
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $message = $_POST['message'];

    $hinhanhpath=basename($_FILES['fileToUpload']['name']);

    //upload file
    $target_dir = "../../uploads/";
    $target_file = $target_dir.$hinhanhpath;
    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file);
    
    $hinhanh = '';
    
    //check upload file
    if(!$hinhanhpath){
        $hinhanh = '[No Image]';
    }
    elseif($hinhanhpath){
        $hinhanh = 'uploads/'.$hinhanhpath.'';
    }

    $sql="insert into `message` (message, image, ip, user_agent)
    value('$message', '$hinhanh', '$userInfoIp', '$userAgent')";
    $result=mysqli_query($conn,$sql);
    if($result){
        header("Location: ../../../?info_form=successfully");
        exit();
    }else{
        die(mysqli_error($conn));
    }

}

?>