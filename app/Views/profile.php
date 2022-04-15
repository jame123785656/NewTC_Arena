<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= "stylesheet" type= "text/css" href= "<?php echo base_url('./css/profile.css'); ?>" >
    <title>โปรไฟล์</title>
</head>
<body>
    <div class="areaBackground">
        <div class="areaBox">
            <div class="boxLeft">
                <h1 class="profileText">ข้อมูลส่วนตัว</h1>
                <div class="tableName">
                    <h3>ชื่อ-นามสกุล</h3>
                    <p><?php echo  $session->get('name'); ?></p>
                    <h3>ชื่อผู้ใช้</h3>
                    <p><?php echo  $session->get('username'); ?></p>
                    <h3>เบอร์โทรศัพท์</h3>
                    <p><?php echo  $session->get('phone'); ?></p>
                    <h3>อีเมล์</h3>
                    <p><?php echo  $session->get('Email'); ?></p>
                </div>
                <?php $ID = $session->get('ID'); ?>
                <a href="<?php echo base_url('/editprofile/'.$ID) ?>" id="text"><button type="button" class="btnprofile">แก้ไขข้อมูลส่วนตัว</button></a>

            </div>
            <div class="boxRight">
                <img src="/img/<?php echo $session->get('image') ?>"   alt="">
                <a href="/user"><button type="button" class="btnback">ย้อนกลับ</button></a>
            </div>
        </div>
    </div>
</body>

</html>