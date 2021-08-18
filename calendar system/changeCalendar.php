<?php
    $year = $_GET['year'];
    $month = $_GET['month'];

    $conn = mysqli_connect("localhost","root","","calendar_system");
    $sql = "SELECT COUNT(DAY(meeting_date)) AS count, DAY(meeting_date) AS date FROM plan WHERE MONTH(meeting_date) = '$month' AND YEAR(meeting_date) = '$year' GROUP BY DAY(meeting_date)";
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
    
    // Print days in month

    $countday = 0;

    // Print days in previous month

    for($i = date('N',strtotime($yearBack.'-'.$monthBack.'-'.cal_days_in_month(CAL_GREGORIAN, $monthBack, $yearBack))); $i > 0; $i--){
        if(date('N',strtotime($yearBack.'-'.$monthBack.'-'.cal_days_in_month(CAL_GREGORIAN, $monthBack, $yearBack))) == 7){
            break;
        }
        echo "<div class='col disabled'><div class='day'>".(date('d',strtotime($yearBack.'-'.$monthBack.'-'.cal_days_in_month(CAL_GREGORIAN, $monthBack, $yearBack))) - $i + 1)."</div></div>";

        // Line break day 

        $countday++;
        if($countday % 7 ==0){
            echo "<div class='w-100'></div>";
        }
    }

    // Print days in this month

    for($i = 1; $i <= cal_days_in_month(CAL_GREGORIAN, $month, date('Y')); $i++ ){   
        if($i == date('d') && $month == date('n') && $year == date('Y')){

            // Print today

            $noteCount = 0;

            // Check if today has plan and print the number of plans

            if(mysqli_num_rows($rs) > 0){
                foreach ($rs as $row) {
                    
                    if($i == $row['date']){
                        echo "<div class='col today enabled' value='".$i."'><div class='day'>".$i."</div><span>".$row['count']."</span></div>";
                        $noteCount = 1;
                        break;
                    }
                }
            }
            
            // Print today if it has no plan

            if($noteCount == 0){
                echo "<div class='col today enabled' value='".$i."'><div class='day'>".$i."</div></div>";
            }
        }else {

            // Print other day

            $noteCount = 0;

            // Check if day has plan and print the number of plans
            
            if(mysqli_num_rows($rs) > 0){
                foreach ($rs as $row) {
                    
                    if($i == $row['date']){
                        echo "<div class='col enabled' value='".$i."'><div class='day'>".$i."</div><span>".$row['count']."</span></div>";
                        $noteCount = 1;
                        break;
                    }
                }
            }

            // Print day if it has no plan

            if($noteCount == 0){
                echo "<div class='col enabled' value='".$i."'><div class='day'>".$i."</div></div>";
            }
        }
        
        // Line break day 

        $countday++;
        if($countday % 7 ==0){
            echo "<div class='w-100'></div>";
        }
    }

    // Print days in next month

    $countNextMonth = 1;
    for($i = date('N',strtotime($yearNext.'-'.$monthNext.'-1')); $i <= 7; $i++){
        if(date('N',strtotime($yearNext.'-'.$monthNext.'-1')) == 1){
            break;
        }
        echo "<div class='col disabled'><div class='day'>".$countNextMonth."</div></div>";
        $countNextMonth++;
        
    }
?>
