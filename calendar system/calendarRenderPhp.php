<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font awesome 5 -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <!-- font awesome 4 -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- script jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity= "sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <!-- script jquery ui for auto complete -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- css jquery ui auto complete -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- script jquery ui validate -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- css boostrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- script boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Calendar PHP</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -o-box-sizing: border-box;
            font-family: sans-serif;
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield;
        }

        .content{
            width: 100%;
            min-height: 100vh;         
            background-color: #fff;
            display: block;
            overflow-x: hidden;
            position: relative;
            
            
        }
        .content.display{
            filter: brightness(10%);
            user-select: none;
            pointer-events: none;
        }

        .calendar {
            background-color: #333;
        }
        .calendarTitle {
            width: 100%;
            height: 15vh;
            background-color: #009933;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            text-align: center;
            color: #fff;
            margin-top: 30px;
        }
        .calendarTitle .month {
            font-size: 3em;
        }
        .calendarTitle i {
            font-size: 3.5em;
        }
        .calendarTitle i:hover {
            cursor: pointer;
        }
        .calendarContent {
            color: #fff;
            text-align: center;
        }
        .weekday {
            font-size: 1.5em;
            padding: 0.5em;
        }
        .days {
            font-size: 1.5em;
        }
        .row {
            width: 100%;
            display: inline-flex;
        }
        .col {
            display: inline-block;
        }
        .days .today {
            background-color: #009933;
        }
        .days .disabled {
            color: #737373;
        }
        .days .col {
            width: auto;
            height: 5em;
            font-size: 20px;
            position: relative;
            justify-content: center;
            line-height: 100px;
            
        }
        .days .col span {
            display: inline-block;
            vertical-align: middle;
            font-size: 25px;
        }
        .days .col .day {
            position: absolute;
            top: -1.5em;
            left: 0.2em;
        }
        .days .col.enabled:hover:not(.today) {
            background-color: #404040;
        }

        

        .popup {
            position: fixed;
            top: 30%;
            left: 50% ;
            transform: translate(-50%,-50%);
            width: 60%;
            height: 60%;
            visibility: hidden;
            opacity: 0;
            transition: all 0.5s, left 0s;
            pointer-events: none;
            z-index: 15;
            background-color: #fff;
            border-radius: 10px;
            display: inline-block;
            box-shadow: rgb(204, 219, 232) 3px 3px 6px 0px inset, rgba(255, 255, 255, 0.5) -3px -3px 6px 1px inset;
        }
        .popup.display{
            visibility: visible;
            opacity: 1;
            pointer-events: initial;
            top: 40%;
        }
        
        #cancel {
            position: absolute;
            top: 8px;
            right: 10px;
            color: #808080;
            font-size: 25px;
            /* cursor: pointer; */
            
            
        }
        
        
        #cancel:hover {
            color: #000 !important;
        }
        .popup .dayTitle {
            border-bottom: 1px solid #000;
            margin-left: 0px;
            height: 10%;
            
        }
        .popup .dayTitle h1 {
            font-size: 4.5vh;
        }
        .popup .popupContent {
            margin-left: 0px;
            height: 90%;
            position: relative;
        }
        .popupInput {
            padding-top: 10px;
            text-align: center;
            align-items: center;
            justify-content: center;
            position: relative;
            padding-bottom: 60px;
        }
        .input-group {
            margin-top: 10px;
        }

        
        .form-floating {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .note {
            resize: none;
        }
        .input {
            margin-top: 10px;
            margin-bottom: 10px;
        }
        #labelNote {
            margin-left: 10px;
        }

        .buttonBar {
            position: absolute;
            bottom: 10px;
            left: 0;
        }


        .inforSidebar {
            height: 100%;
            padding-top: 10px;
            border-left: 1px solid #000;
            overflow: auto;
        }
        .inforSidebar::-webkit-scrollbar {
            display: none;
        }

        
        .inforSidebar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }

        .input-group-text {
            background-color: #fff;
            
        }

        /* Autocomplete */
        .ui-autocomplete {
            max-height: 200px;
            overflow-y: auto;
            /* prevent horizontal scrollbar */
            overflow-x: hidden;
        }
        /* IE 6 doesn't support max-height
        * we use height instead, but this forces the menu to always be this tall
        */
        * html .ui-autocomplete {
            height: 200px;
        }
        
    </style>
</head>
<body>
    <?php
        $month = date('n');
        $year = date('Y');
        $conn = mysqli_connect("localhost","root","","calendar_system");
        $sql = "SELECT COUNT(DAY(meeting_date)) AS count, DAY(meeting_date) AS date FROM plan WHERE MONTH(meeting_date) = '$month' AND YEAR(meeting_date) = '$year' GROUP BY DAY(meeting_date)";
        $rs = mysqli_query($conn,$sql);

    ?>

    <div class="popup">
        
        <a href="" id="cancel"><i class="fa fa-times" aria-hidden="true"></i></a>
        <div class="row dayTitle">
            <h1 class="text-center">Ngày <span id="day"></span>, <span id="monthYear"></span></h1>
        </div>
        <div class="row popupContent">
            
        </div>
                         
    </div>


    <div class="content">
        <div class="container">
            <div class="calendar">
                <div class="calendarTitle">
                    <i class="fa fa-angle-left" id="prevBtn" aria-hidden="true"></i>

                    <div class="month">Tháng <?php echo $month.', '.date('Y') ?></div>

                    <i class="fa fa-angle-right" id="nextBtn" aria-hidden="true"></i>
                </div>
                <div class="calendarContent">
                    <div class="row weekday">
                        <div class="col">Thứ 2</div>
                        <div class="col">Thứ 3</div>
                        <div class="col">Thứ 4</div>
                        <div class="col">Thứ 5</div>
                        <div class="col">Thứ 6</div>
                        <div class="col">Thứ 7</div> 
                        <div class="col">Chủ Nhật</div>
                    </div>
                    <div class="days">
                        <div class="row">
                            <?php
                                
                                if($month == 12){
                                    $yearNext = date('Y') + 1;
                                    $monthNext = 1;
                                }else {
                                    $yearNext = date('Y');
                                    $monthNext = $month + 1;
                                }
                                if($month == 1){
                                    $yearBack = date('Y') - 1;
                                    $monthBack = 12;
                                }else {
                                    $yearBack = date('Y');
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

                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
    
    <script>
        const date = new Date();
        let month = date.getMonth() + 1;
        let year = date.getFullYear();
        
        $(document).ready(function(){
            
            //  Go to next month

            $("#prevBtn").click(function(e){
                e.preventDefault();
                if(month == 1){
                    month = 12;
                    year -=1;
                }else{
                    month -=1;
                }
                $.get("changeCalendar.php", {month:month,year:year},function (data) {
                    $('.days .row').html(data);
                });
                $('.month').html("Tháng " + month + ", " + year);
            });

            // Go to previous month

            $("#nextBtn").click(function(e){
                e.preventDefault();
                if(month == 12){
                    month = 1;
                    year +=1;
                }else{
                    month +=1;
                }
                $.get("changeCalendar.php", {month:month,year:year},function (data) {
                    $('.days .row').html(data);
                });
                $('.month').html("Tháng " + month + ", " + year);
            });

            // Toggle popup for all days in this month
            
            $('.row').on('click','.enabled',function(e){
                e.preventDefault();
                $(".content").addClass("display");
                $(".popup").addClass("display");
                $(".dayTitle #day").html($(this).find('.day').text());
                $(".dayTitle #monthYear").html("Tháng " + month + ", Năm " + year);
                $.get("popup.php", {}, function (data){
                    $(".popupContent").html(data);
                    
                });
                
                
            });

            // Hide popup when click close button

            $("#cancel").click(function(e){
                e.preventDefault();
                $(".content").removeClass("display");
                $(".popup").removeClass("display");
                $("#myForm").trigger('reset');
                $(".inforSidebar").empty();
                $.get("changeCalendar.php", {month:month,year:year},function (data) {
                    $('.days .row').html(data);
                });
                $('.month').html("Tháng " + month + ", " + year);
            });

            // display room when chose specilaty

            $('.popup').on('change','#specialty',function(e){ 
                e.preventDefault();
                $.get("searchRoom.php", {id:$('#specialty').val()},function (data) {
                    $('#room').html(data);
                });
            });

            
            // autocomplete find staff name

            $('.popup').on('keyup','#staffNameInput',function(e){
                e.preventDefault();
                
                $.get("searchName.php", {key:$(this).val(),room:$('#room').val(),specialty:$('#specialty').val()},function (data) {
                    
                    if(data.length == 0){
                        
                        newTags = [];
                        
                    }else {
                        
                        
                        newTags = JSON.parse(data);
                        
                    }
                    
                    console.log(newTags);
                    
                    var accentMap = {
                        "á" : "a",
                        "à" : "a",
                        "ã" : "a",
                        "ả" : "a",
                        "ạ" : "a",

                        "ă" : "a",
                        "ắ" : "a",
                        "ằ" : "a",
                        "ẵ" : "a",
                        "ẳ" : "a",
                        "ặ" : "a",

                        "â" : "a",
                        "ấ" : "a",
                        "ầ" : "a",
                        "ẩ" : "a",
                        "ẫ" : "a",
                        "ậ" : "a",

                        "đ" : "d",

                        "é" : "e",
                        "è" : "e",
                        "ẽ" : "e",
                        "ẻ" : "e",
                        "ẹ" : "e",

                        "ê" : "e",
                        "ế" : "e",
                        "ề" : "e",
                        "ễ" : "e",
                        "ể" : "e",
                        "ệ" : "e",

                        "í" : "i",
                        "ì" : "i",
                        "ĩ" : "i",
                        "ỉ" : "i",
                        "ị" : "i",
                        
                        "ó" : "o",
                        "ò" : "o",
                        "õ" : "o",
                        "ỏ" : "o",
                        "ọ" : "o",

                        "ô" : "o",
                        "ố" : "o",
                        "ồ" : "o",
                        "ỗ" : "o",
                        "ổ" : "o",
                        "ộ" : "o",

                        "ơ" : "o",
                        "ớ" : "o",
                        "ờ" : "o",
                        "ỡ" : "o",
                        "ở" : "o",
                        "ợ" : "o",

                        "ú" : "u",
                        "ù" : "u",
                        "ũ" : "u",
                        "ủ" : "u",
                        "ụ" : "u",

                        "ư" : "u",
                        "ứ" : "u",
                        "ừ" : "u",
                        "ữ" : "u",
                        "ử" : "u",
                        "ự" : "u",

                        "ý" : "y",
                        "ỳ" : "y",
                        "ỹ" : "y",
                        "ỷ" : "y",
                        "ỵ" : "y",
                    };

                    var normalize = function( term ) {
                        var ret = "";
                        for ( var i = 0; i < term.length; i++ ) {
                            ret += accentMap[ term.charAt(i) ] || term.charAt(i);
                        }
                        return ret;
                    };

                    $("#staffNameInput").autocomplete({ 
                        source: function( request, response ) {
                            var matcher = new RegExp( $.ui.autocomplete.escapeRegex( request.term ), "i" );
                            response( $.grep( newTags, function( value ) {
                                value = value.label || value.value || value;
                                return matcher.test( value ) || matcher.test( normalize( value ) );
                            }) );
                        },
                        select: function (event, ui) {
                            
                            // $("#nameInput").val(ui.item.label); // display the selected text
                            // $(".nameInputId").html(ui.item.id); // save selected id to hidden input
                            $.get("searchId.php", {id:ui.item.id,day:$(".dayTitle #day").text(),month:month,year:year},function (data) {
                                $('.inforSidebar').html(data);
                            });
                            $("#staffId").val(ui.item.id);
                        }
                    });
                });

                
               
            });
            

            // Insert plan
            
            $(".popup").on('click','#insertBtn',function(e){
                e.preventDefault();
                
                $.post("insertPlan.php", {cusName:$('#cusName').val(),cusPhone:$('#cusPhone').val(),meetingDate:$('#meetingDate').val(),note:$('#note').val(),staffId:$('#staffId').val()},function (data) {
                    alert(data);
                });
                
            });
        });
        
        
            
            
        
        

    </script>
</body>
</html>