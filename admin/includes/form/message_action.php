<?php

require "../db_conn1.php";

if(isset($_GET['messageid_canceldashboard'])){
    $id = $_GET['messageid_canceldashboard'];

    $sql = "SELECT `message`, `image`, `ip`, `user_agent` FROM `message` WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        $row = mysqli_fetch_assoc($result);

        $message_cancel = $row['message'];
        $image = $row['image'];
        $userInfoIp = $row['ip'];
        $userAgent = $row ['user_agent'];

        $sql1 = "INSERT INTO `message_cancel` (`message`, `image`, `ip`, `user_agent`) VALUES ('$message_cancel', '$image', '$userInfoIp', '$userAgent')";
        $result1 = mysqli_query($conn, $sql1);

        if($result1){
            $sql2="delete from `message` where id =$id";

            $result2=mysqli_query($conn,$sql2);
            if($result2){
                header("Location: ../../home.php");
                exit();
            }else{
                die(mysqli_error($conn));
            }  
        }
        else{
            die(mysqli_error($conn));
        }
    }
}

// phần này lỗi Unknown column 'image' in 'field list'
if(isset($_GET['messageid_cancelchecked'])){
    $id = $_GET['messageid_cancelchecked'];

    $sql = "SELECT `message`, `image`, `ip`, `user_agent` FROM `message_cancel` WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        $row = mysqli_fetch_assoc($result);

        $message_cancelchecked = $row['message'];
        $image = $row['image'];
        $userInfoIp = $row['ip'];
        $userAgent = $row['user_agent'];

        $sql1 = "INSERT INTO `message_checked` (`message`, `image`, `ip`, `user_agent`) VALUES ('$message_cancelchecked', '$image', '$userInfoIp', '$userAgent')";
        $result1 = mysqli_query($conn, $sql1);

        if($result1){
            $sql2="delete from `message_cancel` where id =$id";

            $result2 = mysqli_query($conn,$sql2);
            if($result2){
                header("Location: ../../message_cancel.php");
                exit();
            }else{
                die(mysqli_error($conn));
            }  
        }
        else{
            die(mysqli_error($conn));
        }
    }
}

if(isset($_GET['messageid_checked'])){
    $id = $_GET['messageid_checked'];

    $sql = "SELECT `message`, `image`, `ip`, `user_agent` FROM `message` WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        $row = mysqli_fetch_assoc($result);

        $message_checked = $row['message'];
        $image = $row['image'];
        $userInfoIp = $row['ip'];
        $userAgent = $row['user_agent'];

        $sql1 = "INSERT INTO `message_checked` (`message`, `image`, `ip`, `user_agent`) VALUES ('$message_checked', '$image', '$userInfoIp', '$userAgent')";
        $result1 = mysqli_query($conn, $sql1);

        if($result1){
            $sql2="delete from `message` where id =$id";

            $result2=mysqli_query($conn,$sql2);
            if($result2){
                header("Location: ../../home.php");
                exit();
            }else{
                die(mysqli_error($conn));
            }  
        }
        else{
            die(mysqli_error($conn));
        }
    }
}

if(isset($_GET['messageid_checkedcancel'])){
    $id = $_GET['messageid_checkedcancel'];

    $sql = "SELECT `message`, `image`, `ip`, `user_agent` FROM `message_checked` WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        $row = mysqli_fetch_assoc($result);

        $message_checkedcancel = $row['message'];
        $image = $row['image'];
        $userInfoIp = $row['ip'];
        $userAgent = $row['user_agent'];

        $sql1 = "INSERT INTO `message_cancel` (`message`, `image`, `ip`, `user_agent`) VALUES ('$message_checkedcancel', '$image', '$userInfoIp', '$userAgent')";
        $result1 = mysqli_query($conn, $sql1);

        if($result1){
            $sql2="delete from `message_checked` where id =$id";

            $result2=mysqli_query($conn,$sql2);
            if($result2){
                header("Location: ../../message_checked.php");
                exit();
            }else{
                die(mysqli_error($conn));
            }  
        }
        else{
            die(mysqli_error($conn));
        }
    }
}

?>