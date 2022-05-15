<?php
 $session = session(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= "stylesheet" type= "text/css" href= "<?php echo base_url('./css/userhistory.css'); ?>" >
    <link rel= "stylesheet" type= "text/css" href= "<?php echo base_url('./css/history.css'); ?>" >
    <title>ประวัติการจอง</title>
</head>
<body>


    <div class="box-table">
    <h1>ประวัติการจอง</h1>
        <div class="items-table">
            <table>
            <tr>
                <th>วัน/เวลาที่จอง</th>
                <th>สนามที่จอง</th>
                <th>เวลา</th>
                <th>จำนวนชั่วโมง</th>
                <th>จำนวนเงิน</th>
                <th>สลิป</th>
                <th>สถานะ</th>
            </tr>
          
<?php if ($booking) : ?>
    <?php foreach ($booking as $bookings) : ?>
            <tr>
                <td><?php echo $bookings['B_day']; ?></td>
                <td><?php echo $bookings['Name']; ?></td>  
                <td> <?php  
                $count = 0;
                        if ($detail) : ?>
                        <?php foreach ($detail as $details) : ?>
                            <?php if($details['d_id'] == $bookings['B_id']){
                                $count += 1;
                                echo  $details['T_start']; ?>-<?php echo $details['T_end'] .'<br/>' ;
                            }?>
                         <?php endforeach; ?>
                    <?php endif; ?></td> 
                <td><?php echo $count ?> ชั่วโมง</td>
                <td><?= $sumprice[] = $bookings['Price'] * $count?> บาท</td>
                <td><img class="img" src="/img_ slip/<?php echo $bookings['B_img'] ?>"></td>
            <div class="colorhis">
                <td class= <?php if($bookings['B_status']=== '3'){
                    echo 'Green';
                  } else if($bookings['B_status']=== '4'){
                    echo 'red';
                   } else if($bookings['B_status']=== '2'){
                    echo 'yellow';
                   }?>><?php echo $bookings['S_name']; ?>
            
               
                    </td>
                </div>
            </tr>
        </div>
        
    <?php endforeach; ?>
<?php endif; ?>
        
        </table>
        <br>
       <a href="/manageuser"> <button > ย้อนกลับ</button></a>
    </div>    

</body>

</html>
