<?php
    require ('database.php');

    if (isset($_POST['date']) && $_POST['date'] != null) {
        $date = $_POST['date'];
        $fid = $_POST['F_ID'];
        $sql = "SELECT * FROM booking INNER JOIN detail ON booking.B_id = detail.d_id JOIN field ON booking.B_idFeld = field.F_ID JOIN time ON detail.t_id = time.T_id WHERE B_status IN (2,3) AND b_day = \"$date\" AND B_idFeld = $fid";
        $query = mysqli_query($connect, $sql);
        $num_row = mysqli_num_rows($query);
        if ($num_row >= 1) {
            $test = "";
            foreach ($query as $val) {
                $T_id = $val['T_id'];
                $test .= $T_id.' ';
            }
            $sql_ = "SELECT * FROM time WHERE T_id NOT IN (".rtrim(str_replace(' ',',',$test),',').")";
            // echo $sql_;
            $query_ = mysqli_query($connect, $sql_);
            foreach ($query_ as $value) {
                echo '<div>';
                echo '<input type="checkbox" id="time" name="time'.$value['T_id'].'" value="'.$value['T_id'].'"';
                echo '<label for="time">'.$value['T_start'].' - '.$value['T_end'].'</label>';
                echo '</div>';
            }
        } else {
            $sql_ = "SELECT * FROM time ORDER BY t_id Asc";
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