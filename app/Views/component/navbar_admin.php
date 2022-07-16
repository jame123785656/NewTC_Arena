<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Athiti">
    
</head>

<body>

    <!-- navbar -->
    <div class="navbar">
        <!-- <div class="logo">
            <img src="/image/image1.png" alt="">
        </div> -->
        <div class="menu-section">
            <a href="/report_admin">
                <p>Dashboard</p>
            </a>
            <a href="/index_admin">
                <p>จัดการสนาม</p>
            </a>
            <a href="/promotion_admin">
                <p>จัดการโปรโมชั่น</p>
            </a>
            <a href="/manageuser">
                <p>จัดการข้อมูลผู้ใช้</p>
            </a>
            <a href="/pay_admin">
                <p>ตรวจสอบการชำระเงิน</p>
            </a>
        </div>
        <div class="showuser">
            <a href="#" class="imguser"><img src="/img/<?php echo $session->get('image') ?>" alt=""></a>
            <p><?php echo  $session->get('username'); ?> / </p>
            <a href="/logout"  class="logout">
                <p>ออกจากระบบ</p>
            </a>
        </div>
    </div>
    <!-- End navbar      -->

    
</body>
</html>