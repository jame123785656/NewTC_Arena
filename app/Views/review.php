<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel= "stylesheet" type= "text/css" href= "<?php echo base_url('./css/review.css'); ?>" >
    <link rel= "stylesheet" type= "text/css" href= "<?php echo base_url('./css/navbar.css'); ?>" >
    <title>รีวิว</title>
</head>
<body>

    <?php require('component/navbar.php') ?>

    <h3>รีวิวสนาม</h3>
        
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
            echo "<img src='/img/".$review['r_image']."'>";
            }
      ?>     
            <p>: <?php echo $review['r_name']; ?></p>
        </div>
    </div>
    <?php endforeach; ?>
        <?php endif; ?>
    
    

</body>
</html>