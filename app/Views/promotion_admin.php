<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link rel= "stylesheet" type= "text/css" href= "<?php echo base_url('./css/employee.css'); ?>" >
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('./css/promotion.css'); ?>">

  <title>จัดการโปรโมชั่น</title>
</head>


<body>
  <?php require('component/navbar_admin.php') ?>

  <center>
    <h1>จัดการการโปรโมชั่น</h1>
  </center>
  <hr width="30%">
  <br>




  <center>
    <div class="table-style">
      <table style="width:100%">
        <tr>
          
          <th bgcolor="#DDD">รายละเอียดโปรโมชั่น</th>
          <th bgcolor="#DDD"><img src="https://cdn.discordapp.com/attachments/934731258976677898/957855022903857152/plus_1.png" width="30px" height="30px" onclick="AddPromotion()"></th>

        </tr>
        <?php if ($promotion) : ?>
    <?php foreach ($promotion as $promotion) : ?>
        <tr>
          <td><?php echo $promotion['p_name']?></td>
          <td>
          <a href="<?php echo base_url('/Index_admin/p_delete/'.$promotion['p_id'])?>"> <img src="https://cdn.discordapp.com/attachments/934731258976677898/946017908411236382/bin.png"  width="25px" height="25px"></a>
          </td>
        </tr>
        <?php endforeach; ?>
<?php endif; ?>
      </table>


    </div>
    <div class="form-popup" id="myForm">
      <form action="/Index_admin/p_insert" class="form-container">
        <h3>เพิ่มข้อมูลโปรโมชั่น</h3>
        <div class="form-promotion">
          <input type="text" name="p_name" placeholder="กรุณากรอกโปรโมชั่น"  value="<?= set_value('p_name'); ?>">
          <div class="form-btn">
            <button class="btnCf" type="submit">ยืนยัน</button>
            <button onclick="closeForm()" class="btnCancel" type="button">ยกเลิก</button>
          </div>
      </form>
    </div>

  </center>

</body>

<script>
  function AddPromotion() {
    document.getElementById("myForm").style.display = "block";
  }

  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }
</script>

</html>