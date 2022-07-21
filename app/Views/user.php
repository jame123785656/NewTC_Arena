<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel= "stylesheet" type= "text/css" href= "<?php echo base_url('./css/navbar_user.css'); ?>" >
  <link rel= "stylesheet" type= "text/css" href= "<?php echo base_url('./css/user.css'); ?>" >
  <title>TC Aren</title>
</head>
<body>

  <?php require('component/navbar_user.php') ?>

  <div class="bgmessi">
    <div class="section">
        <div class="section-title">
            <h5>TC Arena</h5>
            <p>* สนามฟุตบอลสำหรับผู้รักการเล่นฟุตบอลและฟุตซอลทุกท่านที่นี่ 
            คุณจะได้พบกับสุดยอดความมันส์ในการเล่นบอลภายใต้สถานที่ที่ถูกออกแบบเพื่อสนอง 
              ความต้องการของคนรักฟุตบอล คุณสามารถสนุกกับการเล่นบอลได้ทุกสภาพอากาศ 
            </p>
            <button>เวลาเปิด-ปิด 9:00 - 22:00 น.</button>
        </div>
        <div class="section-im">
            <img src="image/blackg.png" alt="">
        </div>
    </div>
  </div>  

  <div class="box-background">
        <div class="box-top">
            <div class="section-img">
                <img src="/image/imageF1.jpg">
            </div>
            <div class="section-text">
                <h5>เกี่ยวกับสนามฟุตซอล</h5>
                <p>
                สนามแข่งขันฟุตซอล สนามเเข่งขันต้องเป็นรูปสี่เหลี่ยมผืนผ้า ความยาวเส้นข้างต้องยาวกว่าความยาวเส้นประตู 
                โดยสนามมีความยาวต่ำสุด 25 เมตร สูงสุด 42 เมตร ความกว้างต่ำสุด 15 เมตร สูงสุด 25 เมตร ผู้เล่นฟุตซอล
                </p>
            </div>
        </div>

        <div class="box-bottom">
            <div class="text-service">
                <h5>เกี่ยวกับอัตราค่าบริการ</h5>
                <p>
                  อัตราค่าบริการ
                  เริ่มต้นที่ 400 บาท/ 1ชั่วโมง
                </p>
                <p>
                พิเศษ!! จอง 2ชั่วโมงขึ้นไป 
                รับทันทีน้ำดื่มขนาด 600ml. 1 แพ็ค ฟรี
                เปิดให้บริการทุกวัน เวลา 08.30 น. ถึง 23.00 น.
                </p>
                <h3>มีบริการที่จอดรถให้ฟรี</h3>
            </div>
            <div class="google-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3879.3002383832245!2d100.27636251465151!3d13.517157290499675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2b914ba1edf4b%3A0xdea000342b30e5ab!2sTC%20ARENA%20168!5e0!3m2!1sen!2sth!4v1642944126936!5m2!1sen!2sth"></iframe>
            </div>
        </div>
    </div>

 <?php require('component/footer.php') ?>

</html>