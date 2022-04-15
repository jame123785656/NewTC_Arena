<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= "stylesheet" type= "text/css" href= "<?php echo base_url('./css/login.css'); ?>" >
    <title>เข้าสู่ระบบ</title>
</head>


<body>

    <div class="areaBackground">
        <div class="areaBox" style="background-image: url(/image/backgroundArena.png)" ;>
                <div class="boxLeft">
                    <div class="tableName">
                        
                        <h2 class="loginText">เข้าสู่ระบบ</h2>
                        <?php if (session()->getFlashdata('msg')) : ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('msg'); ?></div>
                        <?php endif; ?>

                        <form action="/login/auth" method="post">
                            <p for="Email">อีเมล์*</p>
                            <input type="text" name="Email" placeholder="username@gmail.com" id="inputforEmail" required=""oninvalid="this.setCustomValidity('กรุณากรอกอีเมล์')" oninput="this.setCustomValidity('')" value="<?= set_value('Email'); ?>">
                            </asp:TextBox>

                            <p for="inputpassword">รหัสผ่าน*</p>
                            <input type="password" name="password" placeholder="password" required=""oninvalid="this.setCustomValidity('กรุณากรอกรหัสผ่าน')" oninput="this.setCustomValidity('')" id="inputforpassword">
                            </asp:TextBox>
                    </div>
                    <button type="submit" class="btnLogin">เข้าสู่ระบบ</button></a>
                    <a href="/index"><button type="button" class="btnback">ย้อนกลับ</button></a>
                    </form>
                    <a href="/register" class="regis">
                        <p>สมัครสมาชิก?</p>
                    </a>
                </div>
                <div class="boxRight">
                    <img src="/image/image1.png" alt="">
                </div>
        </div>
    </div>
</body>

</html>