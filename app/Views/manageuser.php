<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('./css/employee.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('./css/manager.css'); ?>">
  <title>จัดการผู้ใช้</title>
</head>

<body>
  <?php require('component/navbar_admin.php') ?>

  <div class="big-cardman">
  <center>
    <h1>จัดการผู้ใช้</h1>
    <center>
      <hr width="50%">
      
        <p class="num-user">
          <?php
          $count = 0;
          if ($user) : ?>
            <?php foreach ($user as $users) : ?>
              <?php if ($users['status'] === 'member') {
                $count += 1;
              } ?>
            <?php endforeach; ?>
          <?php endif; ?>
          จำนวนผู้ใช้ <?php echo $count ?> คน
        </p>
      <div class="table-style">
        <table style="width:100%">
          <tr>
            <td bgcolor="#111F2C"><font color="white">ชื่อลูกค้า</font></td>
            <td bgcolor="#111F2C"><font color="white">ชื่อ-นามสกุล</font></td>
            <td bgcolor="#111F2C"><font color="white">อีเมล์</font></td>
            <td bgcolor="#111F2C"><font color="white">เบอร์โทรศัพท์</font></td>
            <td bgcolor="#111F2C"><font color="white">สถานะ </font></td>
          </tr>

          <?php if ($user) : ?>
            <?php foreach ($user as $user) : ?>
              <tr>
                <td><?php echo $user['username'] ?></td>
                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['Email'] ?></td>
                <td><?php echo $user['phone'] ?></td>
                <td class=<?php if ($user['status'] === 'admin') {
                            echo 'red';
                          } else if ($user['status'] === 'member') {
                            echo 'Green';
                          } ?>><?php echo $user['status'] ?><a href="/historyadmin/<?php echo $user['ID'] ?>"> <img src="/image/iconeyes.png" width="15px" height="15px" align="right"></a></td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </table>
      </div>

    </center>
</div>
                        </body>
</html>