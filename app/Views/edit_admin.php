<?php
 $session = session(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- JavaScript Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- ส่วนประกอบเพิ่มเติม -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel= "stylesheet" type= "text/css" href= "<?php echo base_url('./css/employee.css'); ?>" >
    <link rel= "stylesheet" type= "text/css" href= "<?php echo base_url('./css/navbar_admin.css'); ?>" >
  <title>Employee</title>
</head>


<body>
  <?php require('component/navbar_admin.php') ?>
  <div class="text-header">
    
  <form action="<?= base_url('/Index_admin/update') ?>" method="post" enctype="multipart/form-data" class="form-container-edit">
        <input type="hidden" name="F_ID" value="<?php echo  $field['F_ID']; ?>">
                <h3>แก้ไขข้อมูลสนาม</h3>
                <br>
                <img src="/adminimage_stadium/<?php echo $field['f_image'] ?>">
               <input type="file" name="f_image"  accept="adminimage_stadium/*">
               <input type="hidden" name="old_image" value="<?php echo $field['f_image'] ?>">
            <div class="form-field">
                <p for="inputName">เพิ่มชื่อสนาม</p>
                <input type="text" name="Name" id="inputforName" value="<?php echo $field['Name']; ?>" >
                <p for="inputType">เพิ่มขนาดสนาม</p>
                <select name="Type" id="Type" class="type">
                     <?php if ($type) : ?>
                      <?php foreach ($type as $type) : ?>
                  <option value="<?php echo $type['T_id'] ?>" <?php if($field['Type']==$type['T_id']){
                    echo 'selected';
                  } ?>><?php echo $type['T_name']; ?></option>
               
                  <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <p for="inputperson">เพิ่มจำนวนผู้เล่น</p>
                <input type="text" name="person" id="inputforperson" value="<?php echo $field['person']; ?>">
                <p for="inputPrice">เพิ่มค่าบริการ/ชม.</p>
                <input type="text"  name="Price" id="inputforPrice" value="<?php echo $field['Price']; ?>">
                <p>เพิ่มโปรโมชั่น</p>
                <select name="Promotion" id="Promotion" class="type">
                      <?php if ($promotion) : ?>
                      <?php foreach ($promotion as $promotion) : ?>
                  <option value="<?php echo $promotion['p_id'] ?>" <?php if($field['Promotion']==$promotion['p_id']){
                    echo 'selected';
                  } ?>><?php echo $promotion['p_name']; ?></option>
               
                  <?php endforeach; ?>
                    <?php endif; ?>
                </select>      

                <p>เปิด-ปิดสนาม</p>
                <select name="f_status" id="f_status" class="type">
             <?php if ($status) : ?>
                      <?php foreach ($status as $status) : ?>
                  <option value="<?php echo $status['S_id'] ?>" <?php if($field['f_status']==$status['S_id']){
                    echo 'selected';
                  } ?>><?php echo $status['S_name']; ?></option>
               
                  <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="form-btn-edit">
                <button class="btnCf" type="submit" >ยืนยัน</button>
                <a href="/index_admin"><button class="btnCancel" type="button">ยกเลิก</button></a>
            </div>
</form>


  </body>

</html>
<script>
$(document).ready(function() {
    <?php if(session()->getFlashdata('swel_title')) { ?>
    swal({
        title: "<?= session()->getFlashdata('swel_title') ?>",
        text: "<?= session()->getFlashdata('swel_text') ?>",
        icon: "<?= session()->getFlashdata('swel_icon') ?>",
        button: "<?= session()->getFlashdata('swel_button') ?>",
    });
    <?php } ?>
});
</script>