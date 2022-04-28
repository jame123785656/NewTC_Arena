<?php
    require ('database.php');

    if (isset($_POST['date']) && $_POST['date'] != null) {
        $date = $_POST['date'];
        $sql = "SELECT * FROM booking INNER JOIN detail ON booking.B_id = detail.d_id JOIN time ON detail.t_id = time.T_id WHERE b_status = 3 AND b_day = \"$date\"";
        $query = mysqli_query($connect, $sql);
        $num_row = mysqli_num_rows($query);
        if ($num_row >= 1) {
            foreach ($query as $val) {
                $T_id = $val['T_id'];
            }
            $sql_ = "SELECT * FROM time WHERE T_id != $T_id";
            $query_ = mysqli_query($connect, $sql_);
            foreach ($query_ as $value) {
                echo '<div>';
                echo '<input type="checkbox" id="time" name="time'.$value['T_id'].'" value="'.$value['T_id'].'"';
                echo '<label for="time">'.$value['T_start'].' - '.$value['T_end'].'</label>';
                echo '</div>';
            }
        } else {
            $sql_ = "SELECT * FROM time ORDER BY ASC";
            $query_ = mysqli_query($connect, $sql_);
            foreach ($query_ as $value) {
                echo '<div>';
                echo '<input type="checkbox" id="time" name="time'.$value['T_id'].'" value="'.$value['T_id'].'"';
                echo '<label for="time">'.$value['T_start'].' - '.$value['T_end'].'</label>';
                echo '</div>';
            }
        }
    }
?>