<?php
    $conn = mysqli_connect("localhost","root","","calendar_system");
?>
<div class="col-sm-8 popupInput">
    <h2>Thêm lịch hẹn</h2>

    <!-- Select option chọn nhân viên -->
    <form action="#" method="post" id="myForm">
        <div class="row">
            <div class="col-sm-8">
                <div class="form-floating">
                    <select class="form-select" id="specialty" aria-label="Default select example">
                        <option disabled selected hidden>Chọn để giới hạn</option>
                        <?php
                            $sqlSpecialty = "SELECT id, title from specialty";
                            $rsSpecialty = mysqli_query($conn,$sqlSpecialty);
                            foreach($rsSpecialty as $rowSpecialty){
                                echo "<option value='".$rowSpecialty['id']."'>".$rowSpecialty['title'] ."</option>";
                            }
                        ?>
                        <option value="0">Bỏ chọn</option>
                    </select>
                    <label for="floatingSelect">Chọn khoa</label>       
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-floating">
                    <select class="form-select" id="room" aria-label="Default select example">
                        <option disabled selected hidden>Chọn để giới hạn</option>
                    </select>
                    <label for="floatingSelect">Chọn phòng</label>       
                </div>
            </div>
        </div>

        <!-- input chọn nhân viên và ngày -->
        
        <div class="row">
            <div class="col">                                                                  
                <div class="form-floating" >
                    <input type="text" class="form-control" id="staffNameInput" placeholder="Nhập tên nhân viên">
                    <label for="staffNameInput">Nhập tên nhân viên</label>
                </div>
            </div>
            <div class="col">                                                                    
                <div class="form-floating">
                    <input type="datetime-local" class="form-control input" id="meetingDate" placeholder="Chọn ngày">  
                    <label for="meetingDate">Chọn ngày hẹn</label>
            
                </div>                                                                                      
            </div>
        </div>   
        
        <!-- input hidden id nhân viên -->
        
        <input type="hidden" id="staffId">

        <!-- input nhập tên khách hàng và sdt -->

        <div class="row">
            <div class="col">                                                                  
                <form class="mb-3" >
                    <input type="text" class="form-control input" id="cusName" placeholder="Nhập tên khách hàng">   
                    
                </form>
            </div>
            <div class="col">                                                                  
                <div class="input-group mb-3">
                    <span class="input-group-text" id="sdtSpan">+84</span>
                    <input type="number" class="form-control" id="cusPhone" placeholder="Nhập số điện thoại" aria-label="Nhập số điện thoại khách hàng" aria-describedby="sdt">
                </div>                                                                                       
            </div>
        </div>      

        <!-- input ghi chú -->
        
        <div class="row">
            <div class="form-floating">
                <textarea class="form-control note" id="note"></textarea>
                <label id="labelNote" for="floatingTextarea">Ghi chú</label>
            </div>
        </div>                     

        <!-- button bar -->

        <div class="row buttonBar">
            <div class="col">
                <button type="button" id="backBtn" class="btn btn-outline-primary"><i class="bi bi-box-arrow-left" style="font-size: 1.2em;"></i> Quay lại</button>
            </div>
            <div class="col">
                <button type="button" class="btn btn-outline-primary" id="insertBtn"><i class="bi bi-plus-lg" style="font-size: 1.2em;"></i> Thêm</button>
            </div>
        </div>
    </form>
    
                
                        
    
</div>
<div class="col-sm-4 inforSidebar">

</div>
<script>
    
</script>