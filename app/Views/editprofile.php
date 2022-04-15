<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel= "stylesheet" type= "text/css" href= "<?php echo base_url('./css/editprofile.css'); ?>" >
    <title>แก้ไขข้อมูลส่วนตัว</title>
</head>

<body>
    <?php $ID = $session->get('ID'); ?>
    <form action="<?= base_url('/User/editprofile/' . $ID) ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo  $user['ID']; ?>">
        <div class="areaBackground">
            <div class="areaBox">
                <div class="boxLeft">
                    <h1 class="profileText">แก้ไขข้อมูลส่วนตัว</h1>
                    <div class="tableName">
                        <h4 for="inputname">ชื่อ-นามสกุล</h4>
                        <input type="text" name="name" placeholder="กรุณาใส่ชื่อ-นามสกุล" id="inputforname" required=""oninvalid="this.setCustomValidity('กรุณาใส่ชื่อ-นามสกุล')" oninput="this.setCustomValidity('')" value="<?php echo $session->get('name'); ?>">
                        </asp:TextBox>
                        <h4 for="inputusername">ชื่อผู้ใช้</h4>
                        <input type="text" name="username" placeholder="กรุณาใส่ชื่อผู้ใช้" id="inputforusername" required=""oninvalid="this.setCustomValidity('กรุณาใส่ชื่อผู้ใช้')" oninput="this.setCustomValidity('')" value="<?php echo $session->get('username'); ?>">
                        </asp:TextBox>
                        <h4 for="inputphone">เบอร์โทรศัพท์</h4>
                        <input type="text" name="phone" placeholder="กรุณาใส่เบอร์โทรศัพท์" id="inputforphone" required=""oninvalid="this.setCustomValidity('กรุณาใส่เบอร์โทรศัพท์')" oninput="this.setCustomValidity('')" value="<?php echo $session->get('phone'); ?>">
                        </asp:TextBox>
                        <h4 for="inputEmail">อีเมล์</h4>
                        <input type="Email" name="Email" placeholder="กรุณาใส่อีเมล์" id="inputforEmail" required=""oninvalid="this.setCustomValidity('กรุณาใส่อีเมล์')" oninput="this.setCustomValidity('')" value="<?php echo $session->get('Email'); ?>">
                        </asp:TextBox>

                    </div>
                    <button type="submit" class="btnprofile">ยืนยันการแก้ไขข้อมูล</button>

                </div>

                <div class="boxRight">
                <img src="/img/<?php echo $session->get('image') ?>" id="profileDisplay" onclick="triggerClick()" value="" alt="">
                    <input type="file" name="image" onchange ="displayImage(this)" id="profileimage">
                    <input type="hidden" name="old_image" value="<?php echo  $session->get('image') ?>">
                    <a href="/profile"><button type="button" class="btnback">ย้อนกลับ</button></a>
                </div>
            </div>
        </div>
    </form>
    
</body>
</html>

<script>
    function triggerClick(){
    document.querySelector('#profileimage').click();
}

function displayImage(e){
    if(e.files[0]){
        var reader= new FileReader();

        reader.onload=function(e){
            document.querySelector('#profileDisplay').setAttribute('src',e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}
</script>