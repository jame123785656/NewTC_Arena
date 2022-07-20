<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- ส่วนประกอบเพิ่มเติม -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('./css/login.css'); ?>">
    <title>ลืมรหัสผ่าน</title>
</head>

<body>

    <div class="areaBackground">
        <div class="areaBox" style="background-image: url(/image/backgroundArena.png)" ;>
            <div class="boxLeft">
                <div class="tableName">
                    <h2 class="loginText">ลืมรหัสผ่าน</h2>
                    <?php if (session()->getFlashdata('msg')) : ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('msg'); ?></div>
                    <?php endif; ?>

                    <?php if (isset($validation)) : ?>
                        <div class="alert alert-danger">หมดเวลากดลิงค์กรุณากรอกอีเมล์เพื่อส่งลิงค์ใหม่อีกครั้ง</div>
                    <?php endif; ?>

                    <form action="/Forgotpassword/sendemail" method="post">
                        <p for="Email">อีเมล์*</p>
                        <input type="text" name="Email" placeholder="username@gmail.com" id="inputforEmail" required="" oninvalid="this.setCustomValidity('กรุณากรอกอีเมล์')" oninput="this.setCustomValidity('')" value="<?= set_value('Email'); ?>">
                        </asp:TextBox>

                </div>
                <button type="submit" class="btnLogin">ยืนยัน</button></a>
                <a href="/login"><button type="button" class="btnback">ย้อนกลับ</button></a>
                </form>
            </div>
            <div class="boxRight">
                <img src="/image/image1.png" alt="">
            </div>
        </div>
    </div>


</body>

</html>