<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link rel= "stylesheet" type= "text/css" href= "<?php echo base_url('./css/employee.css'); ?>" >
  <link rel= "stylesheet" type= "text/css" href= "<?php echo base_url('./css/manager.css'); ?>" >
  <title>จัดการผู้ใช้</title>
</head>
<body>
<?php require('component/navbar_admin.php') ?>
    
    <center>
        <h1>จัดการผู้ใช้</h1>
    <center>
    <hr width="50%">
    <br>
    <div class="table-style">
    <table style="width:100%">
     <tr>
        <td bgcolor="#DDD">ชื่อลูกค้า</td>
        <td bgcolor="#DDD">ชื่อ-นามสกุล</td>
        <td bgcolor="#DDD">อีเมล์</td>
        <td bgcolor="#DDD">เบอร์โทรศัพท์</td>
        <td bgcolor="#DDD">สถานะ </td>
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
                   } ?>><?php echo $user['status']?><a href="/historyadmin/<?php echo $user['ID']?>"> <img src="/image/iconeyes.png" width="15px" height="15px" align="right"></a></td>
      </tr>
      <?php endforeach; ?>
<?php endif; ?>
    </table>
</div>

</center>
    
  </body>

</html>