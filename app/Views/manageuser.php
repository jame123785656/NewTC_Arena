<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link rel= "stylesheet" type= "text/css" href= "<?php echo base_url('./css/navbar_admin.css'); ?>" >
  <link rel= "stylesheet" type= "text/css" href= "<?php echo base_url('./css/employee.css'); ?>" >
  <link rel= "stylesheet" type= "text/css" href= "<?php echo base_url('./css/manager.css'); ?>" >
  <title>จัดการผู้ใช้</title>
</head>
<body>
<?php require('component/navbar_admin.php') ?>
    
    <center>
        <h1>จัดการผู้ใช้</h1>
    <center>
    <div class="table-style">
    <table style="width:100%">
     <tr>
        <td>ชื่อลูกค้า</td>
        <td>ชื่อ-นามสกุล</td>
        <td>อีเมล์</td>
        <td>เบอร์โทรศัพท์</td>
        <td>สถานะ</td>
      </tr>
      
      <?php if ($user) : ?>
    <?php foreach ($user as $user) : ?>
     <tr>
        <td><?php echo $user['username']?></td>
        <td><?php echo $user['name']?></td>
        <td><?php echo $user['Email']?></td>
        <td><?php echo $user['phone']?></td>
        <td class= <?php if($user['status']==='admin'){
                    echo 'red';
                  } else if($user['status']==='member'){
                    echo 'Green';
                   } ?>><?php echo $user['status']?></td>
        <td><a href="/historyadmin/<?php echo $user['ID']?>"> <img src="https://cdn.discordapp.com/attachments/934731258976677898/946017908411236382/bin.png" width="15px" height="15px" ></a></td>
      </tr>
      <?php endforeach; ?>
<?php endif; ?>
    </table>
</div>

</center>
    
  </body>

</html>