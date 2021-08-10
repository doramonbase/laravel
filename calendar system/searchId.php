<?php
    $id = $_GET['id'];
    $day = $_GET['day'];
    $year = $_GET['year'];
    $month = $_GET['month'];
    $conn = mysqli_connect("localhost","root","","calendar_system");
    $sql = "SELECT name, room.title as room, specialty.title as specialty FROM staff INNER JOIN room ON room.id = staff.room INNER JOIN specialty ON specialty.id = room.specialty WHERE staff.id = '$id'";
    $rs = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($rs);
    echo "<h2 class='text-center'>".$row['name']."<h1>";
    echo "<h4>Khoa: ".$row['specialty']."<h4>";
    echo "<h4>Phòng: ".$row['room']."<h4>";

   

    $sqlStaff = "SELECT customerName, HOUR(meeting_date) as hour, MINUTE(meeting_date) as minute, phone FROM plan where staffId = '$id' AND DAY(meeting_date) = '$day' AND MONTH(meeting_date) = '$month' AND YEAR(meeting_date) = '$year'";
    $rsStaff = mysqli_query($conn,$sqlStaff);
    if(mysqli_num_rows($rsStaff) > 0 ){
        echo "<div class='d-grid gap-2'><button class='btn btn-success disabled' tabindex='-1' type='button'>Lịch làm việc</button></div>";
        echo "<div class='accordion accordion-flush'>";

        foreach($rsStaff as $rowStaff){
            echo "<div class='accordion-item'>";
                echo "<h2 class='accordion-header' id='flush-headingOne'>
                    <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#flush-collapseOne' aria-expanded='false' aria-controls='flush-collapseOne'>";
                        
                        echo $rowStaff['hour'].":".$rowStaff['minute'];
                echo "</button>
                <h2>";
                echo "<div id='flush-collapseOne' class='accordion-collapse collapse' aria-labelledby='flush-headingOne' data-bs-parent='#accordionFlushExample'>";
                    echo "<div class='accordion-body'>".$rowStaff['customerName']."<br>".$rowStaff['phone']."</div>";
                echo "</div>";
            echo "</div>";
        }

      echo "</div>";
    }else{
        echo "<div class='d-grid gap-2'><button class='btn btn-secondary disabled' tabindex='-1' type='button'>Lịch làm việc</button></div>";
    }
?>