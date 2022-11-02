<?php $session = session(); ?>
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
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('./css/employee.css'); ?>">
  <title>จัดการสนาม</title>
</head>


<body>
  <?php require('component/navbar_admin.php') ?>
  <div class="big-card">

  <div class="text-section">
    <h1>จัดการสนาม</h1>
    <h4 onclick="openForm()"><i class="fas fa-plus"></i></h4>

  </div>

  <hr width="60%">



  <div class="box-card">
    <div class="row">

      <?php if ($field) : ?>
        <?php foreach ($field as $field) : ?>
          <div class="card" id="div-f-<?= $field['F_ID'] ?>">
              <input type="hidden" name="F_ID" value="<?php echo  $field['F_ID']; ?>">
              <div class="title-section">
                  <h3><?php echo $field['Name']; ?></h3>
                  <p>
                  <?php
                    $count = 0;
                    if ($booking) : ?>
                      <?php foreach ($booking as $bookings) : ?>
                        <?php if ($field['F_ID'] == $bookings['B_idFeld']) {
                          $count += 1;
                        } ?>
                      <?php endforeach; ?>
                    <?php endif; ?>
                    จำนวนการจอง <?php echo $count ?> ครั้ง</p>
                </div>
              <div class="img-show">
                <img src="/adminimage_stadium/<?php echo $field['f_image'] ?>">
              </div>
              <div class="text-show">
                <h3><?php echo $field['T_name']; ?></h3>
                <p class=<?php if ($field['f_status'] === '5') {
                            echo 'Green';
                          } else if ($field['f_status'] === '6') {
                            echo 'red';
                          } ?>>สถานะ:<?php echo $field['S_name'] ?></p>
                <p>รองรับผู้เล่นได้มากสุด <?php echo $field['person']; ?> คน</p>
                <p>อัตราค่าบริกการ ชั่วโมงละ <?php echo $field['Price']; ?> บาท</p>
                <p><?php echo $field['p_name']; ?></p>
              </div>
              <div class="btn-show">
                <a href="<?php echo base_url('/edit_admin/' . $field['F_ID']) ?>"><button type="button" class="btnEdit">แก้ไข</button></a>
                 <button type="button" class="btndelete" onclick="deletefield(<?= $field['F_ID'] ?>)">ลบ</button>
              </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>


    </div>
  </div>

  <!-- Popup -->
  <div class="form-popup" id="myForm">
    <form method="post" action="<?php echo base_url('Index_admin/insert'); ?>" enctype="multipart/form-data">
      <div class="text-header">
        <h3>เพิ่มข้อมูลสนาม</h3>
        <input type="file" name="file" class="form-control" required>
      </div>

      <div class="form-field">
        <p>เพิ่มชื่อสนาม</p>
        <input type="text" name="Name" placeholder="กรุณาใส่ชื่อสนาม" required value="<?= set_value('Name'); ?>">
        <p>เพิ่มขนาดสนาม</p>
        <select name="Type" id="Type" class="type">
          <?php if ($type) : ?>
            <?php foreach ($type as $type) : ?>
              <option value="<?php echo $type['T_id'] ?>" <?php if ($field['Type'] == $type['T_id']) {
                                                            echo 'selected';
                                                          } ?>><?php echo $type['T_name']; ?></option>

            <?php endforeach; ?>
          <?php endif; ?>
        </select>
        <p>เพิ่มจำนวนผู้เล่น</p>
        <input type="text" name="person" placeholder="กรุณาใส่จำนวนผู้เล่น" required value="<?= set_value('person'); ?>">
        <p>เพิ่มค่าบริการ/ชม.</p>
        <input type="text" name="Price" placeholder="กรุณาใส่ค่าบริการ/ชม." required value="<?= set_value('Price'); ?>">
        <p>เพิ่มโปรโมชั่น</p>
        <select name="Promotion" id="Promotion" class="type">
          <?php if ($promotion) : ?>
            <?php foreach ($promotion as $promotion) : ?>
              <option value="<?php echo $promotion['p_id'] ?>" <?php if ($field['Promotion'] == $promotion['p_id']) {
                                                                  echo 'selected';
                                                                } ?>><?php echo $promotion['p_name']; ?></option>

            <?php endforeach; ?>
          <?php endif; ?>
        </select>
      </div>
      <div class="form-btn">
        <button class="btnCf" type="submit">ยืนยัน</button>
        <button onclick="closeForm()" class="btnCancel" type="button">ยกเลิก</button>
      </div>
    </form>
  </div>

  <!-- Editform -->

  <!-- <div class="form-popup" id="EditForm">
        <form action="<?= base_url('/Edit/edit') ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="F_ID" value="<?php echo  $field['F_ID']; ?>">
            <div class="text-header">
                <h3>แก้ไขข้อมูลสนาม</h3>
                <img src="/img/<?php echo $field['f_image'] ?>">
                <input type="file" name="image"  accept="img/*">
            </div>

            <div class="form-field">
                <p>เพิ่มชื่อสนาม</p>
                <input type="text" name="Name" placeholder="<?php echo $field['Name']; ?>" >
                <p>เพิ่มขนาดสนาม</p>
                <input type="text" name="Type"  placeholder="<?php echo $field['Type']; ?>">
                <p>เพิ่มจำนวนผู้เล่น</p>
                <input type="text" name="person" placeholder="<?php echo $field['person']; ?>">
                <p>เพิ่มค่าบริการ/ชม.</p>
                <input type="text"  name="Price" placeholder="<?php echo $field['Price']; ?>">
                <p>เพิ่มโปรโมชั่น</p>
                <input type="text" name="Promotion" placeholder="<?php echo $field['Promotion']; ?>">         
            </div>
            <div class="form-btn">
                <button class="btnCf" type="submit">ยืนยัน</button>
               <a href="/index_admin"><button class="btnCancel" type="button">ยกเลิก</button></a>
            </div>
        </form>
    </div> -->


  <script>
    function openForm() {
      document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }

    // function EditForm() {
    //   document.getElementById("EditForm").style.display = "block";
    // }
  </script>

  <script>
    $(document).ready(function() {
      <?php if (session()->getFlashdata('swel_title')) { ?>
        swal({
          title: "<?= session()->getFlashdata('swel_title') ?>",
          text: "<?= session()->getFlashdata('swel_text') ?>",
          icon: "<?= session()->getFlashdata('swel_icon') ?>",
          button: "<?= session()->getFlashdata('swel_button') ?>",
        });
      <?php } ?>
    });
  </script>
  <script>
  function deletefield(f_id) {
    swal({
        title: "คุณเเน่ใจที่จะลบสนามหรือไม่?",
        buttons: true,
        icon: 'warning',
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            type: "POST",
            url: "./ajax/ajax_deletefield.php",
            dataType: "html",
            data: {
              f_id: f_id,
            },
            error() {
              alert("มีบางอย่างผิดพลาด โปรดติดต่อผู้ดูแลระบบโดยด่วน!");
            }
          });
          document.getElementById("div-f-" + f_id).style.display = "none";
          swal("ยืนยันการลบสนามเสร็จสิ้น", {
            icon: "success",
          });
        }
      });
  }
</script>



  </div>
</body>

</html>