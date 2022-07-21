<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel= "stylesheet" type= "text/css" href= "<?php echo base_url('./css/user_review.css'); ?>" >
    <link rel= "stylesheet" type= "text/css" href= "<?php echo base_url('./css/navbar_user.css'); ?>" >
    <title>รีวิว</title>
</head>
<body>

    <?php require('component/navbar_user.php') ?>
    
    <h3>รีวิวสนาม</h3>
    <div class="box-review">
        <div class="showBtn">
            <button type="button" onclick="openForm()">เขียนรีวิว</button>
        </div>
    </div>
    <?php if ($review) : ?>
        <?php foreach ($review as $review) : ?>
    <div class="box-text">
    
        <div class="section-left">
            <p><?php echo $review['username']; ?></p>
        </div>
        <div class="section-right">
            <h5><?php echo $review['name']; ?></h5>
            
            <?php if(!$review['r_image']){
               echo '';
            }else{      
            echo "<img  src='/img/".$review['r_image']."'>";
            }
      ?>     
            <p><?php echo $review['r_name']; ?></p>
            
        </div>
    </div>
    <?php endforeach; ?>
        <?php endif; ?>
        <br>
    
     <!-- Popup -->
     <div class="form-popup" id="myForm">
    <form method="post" action="<?php echo base_url('user_review/insert');?>" enctype="multipart/form-data">
    <input type="hidden" name="ID"  disabled class="form-control" id="inputforID"  value="<?php echo  $session->get('ID'); ?>">

            <div class="form-field">
                <p>เขียนข้อความรีวิว</p>
                <input type="file" name="r_image" class="form-control" >
                <br><br>
                <input type="text" name="r_name"  id="inputforr_name" placeholder="กรุณาเขียนข้อความ" value="<?= set_value('r_name'); ?>">
            </div>
            <div class="form-btn">
                <button class="btnCf" type="submit">ยืนยัน</button>
               <button onclick="closeForm()" class="btnCancel" type="button">ยกเลิก</button>
            </div>
        </form>
    </div>

    <!-- Editform -->



    <script>
            function openForm(){
                document.getElementById("myForm").style.display = "block";
            }
            function closeForm(){
                document.getElementById("myForm").style.display = "none";
            }
        </script>

</body>
</html>