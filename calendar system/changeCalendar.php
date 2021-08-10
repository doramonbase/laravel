<?php
    $year = $_GET['year'];
    $month = $_GET['month'];

    $conn = mysqli_connect("localhost","root","","calendar_system");
    $sql = "SELECT * FROM plan WHERE MONTH(meeting_date) = '$month' AND YEAR(meeting_date) = '$year'";
    $rs = mysqli_query($conn,$sql);


    if($month == 12){
        $yearNext = $year + 1;
        $monthNext = 1;
    }else {
        $yearNext = $year;
        $monthNext = $month + 1;
    }
    if($month == 1){
        $yearBack = $year - 1;
        $monthBack = 12;
    }else {
        $yearBack = $year;
        $monthBack = $month - 1;
    }
    
    $countday = 0;
    for($i = date('N',strtotime($yearBack.'-'.$monthBack.'-'.cal_days_in_month(CAL_GREGORIAN, $monthBack, $yearBack))); $i > 0; $i--){
        if(date('N',strtotime($yearBack.'-'.$monthBack.'-'.cal_days_in_month(CAL_GREGORIAN, $monthBack, $yearBack))) == 7){
            break;
        }
        echo "<div class='col disabled'><div class='day'>".(date('d',strtotime($yearBack.'-'.$monthBack.'-'.cal_days_in_month(CAL_GREGORIAN, $monthBack, $yearBack))) - $i + 1)."</div></div>";

        $countday++;
        if($countday % 7 ==0){
            echo "<div class='w-100'></div>";
        }
    }
    for($i = 1; $i <= cal_days_in_month(CAL_GREGORIAN, $month, date('Y')); $i++ ){
        if($i == date('d') && $month == date('n') && $year == date('Y')){
            
            $noteCount = 0;
            if(mysqli_num_rows($rs) > 0){
                foreach ($rs as $row) {
                    
                    if($i == date('d', strtotime($row['meeting_date']))){
                        echo "<div class='col today enabled'><div class='day'>".$i."</div>".$row['customerName']."<br>".$row['note']."</div>";
                        $noteCount = 1;
                        break;
                    }
                }
            }
            

            if($noteCount == 0){
                echo "<div class='col today enabled'><div class='day'>".$i."</div></div>";
            }

        }else {
            $noteCount = 0;
                                    
            if(mysqli_num_rows($rs) > 0){
                foreach ($rs as $row) {
                    
                    if($i == date('d', strtotime($row['meeting_date']))){
                        echo "<div class='col enabled'><div class='day'>".$i."</div>".$row['customerName']."<br>".$row['note']."</div>";
                        $noteCount = 1;
                        break;
                    }
                }
            }

            if($noteCount == 0){
                echo "<div class='col enabled'><div class='day'>".$i."</div></div>";
            }
        }
        
        $countday++;
        if($countday % 7 ==0){
            echo "<div class='w-100'></div>";
        }
    }
    $countNextMonth = 1;
    for($i = date('N',strtotime($yearNext.'-'.$monthNext.'-1')); $i <= 7; $i++){
        if(date('N',strtotime($yearNext.'-'.$monthNext.'-1')) == 1){
            break;
        }
        echo "<div class='col disabled'><div class='day'>".$countNextMonth."</div></div>";
        $countNextMonth++;
        
    }
?>
<script>
    
    
    
</script>