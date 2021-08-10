<?php
    $id = $_GET['id'];
    if($id != 0){
        $conn = mysqli_connect("localhost","root","","calendar_system");
        $sql = "SELECT id, title FROM room WHERE specialty = '$id'";
        $rs = mysqli_query($conn,$sql);
        echo "<option disabled selected hidden>Chọn để giới hạn</option>";
        foreach($rs as $row){
            
            echo "<option value='".$row['id']."'>".$row['title'] ."</option>";
        }
        echo "<option value='0'>Bỏ chọn</option>";
    }else {
        echo "<option disabled selected hidden>Chọn để giới hạn</option>";
    }
    
    
?>