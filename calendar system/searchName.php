<?php
    $key = $_GET['key'];
    $room = $_GET['room'];
    $specialty = $_GET['specialty'];
    $conn = mysqli_connect("localhost","root","","calendar_system");

    if($room == 0 && $specialty == 0){
        $sql = "SELECT id, name as label FROM staff WHERE name LIKE '%$key%'";
    }else if($specialty != 0 && $room == 0){
        $sql = "SELECT staff.id, name as label FROM staff INNER JOIN room ON room.id = staff.room WHERE name LIKE '%$key%' AND specialty = '$specialty'";
    }else{
        $sql = "SELECT id, name as label FROM staff WHERE name LIKE '%$key%' AND room = '$room'";
    }
    
    $rs = mysqli_query($conn,$sql);
    while( $row = mysqli_fetch_assoc($rs)){
        $arr[] = $row; 
    }
    if(mysqli_num_rows($rs) > 0){
        echo json_encode($arr);
    }
    
?>