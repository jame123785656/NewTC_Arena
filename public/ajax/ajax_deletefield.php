<?php

  require ('database.php');
  
  if (isset($_POST['f_id'])) {
    $f_id = $_POST['f_id'];
    $sql = "DELETE FROM field WHERE F_ID = $f_id";
    $query = mysqli_query($connect, $sql);
  }

?>