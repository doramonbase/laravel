<?php
    
    
    $cusName = $_POST['cusName'];
    $cusPhone = $_POST['cusPhone'];
    $meetingDate = $_POST['meetingDate'];
    $note = $_POST['note'];
    $staffId = $_POST['staffId'];


    $conn = mysqli_connect("localhost","root","","calendar_system");


    if($note == "" || $note == null){
        $sql = "INSERT into plan values (null,'$cusName',null,'$meetingDate','$cusPhone','$staffId', null)";
    }else{
        $sql = "INSERT into plan values (null,'$cusName',null,'$meetingDate','$cusPhone','$staffId', $note)";
    }
    
    $result = mysqli_query($conn,$sql);
    if ($result == true) {
        echo "Thêm thành công!";
    }else {
        echo "Xảy ra lỗi khi thêm!";
    }
    
?>