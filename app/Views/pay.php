<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel= "stylesheet" type= "text/css" href= "<?php echo base_url('./css/pay.css'); ?>" >
    <link rel= "stylesheet" type= "text/css" href= "<?php echo base_url('./css/navbar_user.css'); ?>" >
    <title>Pay</title>
</head>
<body>


        <div class="from-pay">
            <h4>ชำระเงิน</h4>
        </div> 
            <div class="detailsPay">
           
                <div class="detailsLeft">
                <?php if ($booking) : ?>
                        <?php foreach ($booking as $booking) : ?>
                <img src="/adminimage_stadium/<?php echo $booking['f_image'] ?>">
                </div>
                <div class="detailsRight">
                    <h3><?php echo $booking['Name']; ?></h3>
                    <p>- วันที่ <?php echo $booking['B_day']; ?></p>
                    <?php endforeach; ?>
                            <?php endif; ?>
                          
                            <?php if ($detail) : ?>
                        <?php foreach ($detail as $details) : ?>
                    <p>- เวลา <?php echo $details['T_start']; ?>-<?php echo $details['T_end']; ?></p>
                    <?php endforeach; ?>
                            <?php endif; ?>
                    <p>   <?php echo count((array)$detail) ?> ชั่วโมง</p>       
                    <p>ราคารวม <?= $sumprice[] = $booking['Price'] * count ((array)$detail) ?> บาท </p> 
                            
                 
                </div>
              
            </div>
        
        <div class="from-payB">
            <div class="fromLeft">
                <div class="box-icon">
                    <img src="/image/icon-museum.png" alt="">
                    <p>โอนเข้าบัญชี</p>
                </div>
                <div class="box-bank">
                    <div class="img-left">
                        <img src="/image/kungthai.png" alt="">
                    </div>
                    <div class="text-right">
                        <h4>ธนาคารกรุงไทย</h4>
                        <p>เลขที่บัญชี</p>
                        <p>: 123-4-56789-0</p>
                        <p>ชื่อ TC Arena</p>
                        
                    </div>
                    <div class="qrCode">
                        <img src="/image/QRcode.png" alt="">
                    </div>
                </div>
                <div class="box-warn">
                    <div class="warn-left">
                        <img src="/image/warning.png" alt="">
                    </div>
                    <div class="Text-right">
                        <h4>หมายเหตุ</h4>
                        <p>เนื่องจาก ป้องกันความผิดพลาด
                        ลูกค้ากรุณาตรวจสอบ ข้อมูลการจองและ
                        จำนวนเงินให้ถูกต้อง
                        </p>
                    </div>
                </div>
                <div class="Text-note">
                    <h4>เขียนหมายเขียน</h4>
                    <input type="text" placeholder="ช่องสำหรับเขียนหมายเหตุ">
                </div>
            </div>
           
            <div class="fromRight">
                <div class="icon-img">
                    <img src="/image/add-image.png" alt="">
                    <p>แนบสลิป</p>
                </div>
                <form action="<?= base_url('/Pay/p_update') ?>" method="post" enctype="multipart/form-data" class="form-container-edit">
                <input type="hidden" name="B_id" value="<?php echo  $booking['B_id']; ?>">
                <div class="img-check">
                    <img src="/image/img.png"id="profileDisplay" onclick="triggerClick()" value="" alt=""  >
                    <input type="file" name="B_img" onchange ="displayImage(this)" id="profileimage" required=""oninvalid="this.setCustomValidity('กรุณาแนบสลิป')" oninput="this.setCustomValidity('')" >
                    </asp:TextBox>
                </div>
                <div class="btnO">
                    <button class="btncf" type="submit">ยืนยัน</button>
                    <a href="<?php echo base_url('/Pay/pay_delete/'.$booking['B_id'])?>"> <button class="btncan" type="button">ยกเลิก</button></a>
                </div>
            </div>
        </div>

        </form>

</body>
</html>

<script>
    function triggerClick(){
    document.querySelector('#profileimage').click();
}

function displayImage(e){
    if(e.files[0]){
        var reader= new FileReader();

        reader.onload=function(e){
            document.querySelector('#profileDisplay').setAttribute('src',e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}
</script>