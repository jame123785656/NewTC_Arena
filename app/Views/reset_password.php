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
    <title>ตั้งรหัสผ่านใหม่</title>
</head>

<body>

    <div class="areaBackground">
        <div class="areaBox" style="background-image: url(/image/backgroundArena.png)" ;>
            <div class="boxLeft">
                <div class="tableName">


                    <h2 class="loginText">ตั้งรหัสผ่านใหม่</h2>
                    <?php if (isset($validation)) : ?>
                        <div class="alert alert-danger"><?= $validation->listErrors(); ?></div>
                    <?php endif; ?>

                    <form action="/Forgotpassword/update_password" method="post">
                        <input type="hidden" name="id" value="<?php echo  $user_id ?>">
                        <p for="inputpassword">รหัสผ่าน*</p>
                        <input type="password" name="password" placeholder="กรุณาใส่รหัสผ่าน" required="" oninvalid="this.setCustomValidity('กรุณาใส่รหัสผ่าน')" oninput="this.setCustomValidity('')" id="inputforpassword">
                        </asp:TextBox>


                        <p for="inputagainpassword">ยืนยันรหัสผ่าน*</p>
                        <input type="password" name="againpassword" placeholder="ยืนยันรหัสผ่าน" required="" oninvalid="this.setCustomValidity('กรุณายืนยันรหัสผ่าน')" oninput="this.setCustomValidity('')" id="inputforagainpassword">
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
</body>

</html>