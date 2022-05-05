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
  <title>จัดการผู้ใช้</title>
</head>
<body>
<?php require('component/navbar_admin.php') ?>
    
    <center>
        <h1>จัดการผู้ใช้</h1>
         <form class="search">
        <input type="text" placeholder="ค้นหา" >
        <img src="https://cdn.discordapp.com/attachments/934731258976677898/946021229440172072/search.png" width="20px" height="20px">
      </center>
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
        <td> <img src="https://cdn.discordapp.com/attachments/934731258976677898/946017908411236382/bin.png" width="15px" height="15px" ></td>
      </tr>
      <?php endforeach; ?>
<?php endif; ?>
    </table>
</div>

</center>
    
    
<style>
    /*
Table_Reservation
*/
.table-style{
    border-collapse: collapse;
    background-color:#dddd ;
    border: 1px solid #DADBDB;
    width: 60%;
    border-radius: 2%;
 

}
  
    td {

        border-bottom: 2px solid #cfcbcb;
        text-align: center;
        padding: 8px;
    }

    th {
        background-color: #70635f;
        border: 1px solid #f7f2f2;
        text-align: center;
        padding: 8px;

    }
    .search{
        border-radius: 25px;
     margin-left: 68%;
        margin-bottom: 10px;
        display:flex;

    }
    .red{
      color: red;
    }
    .Green{
      color: #25E327;
    }

</style>
  </body>

</html>