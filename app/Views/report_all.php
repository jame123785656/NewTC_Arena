<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('./css/employee.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('./css/report.css'); ?>">
    <title>รายการทั้งหมด</title>
</head>
<body>
<?php require('component/navbar_admin.php') ?>
<div class="big-card">
<div class = "text-header"><h2>รายการจองสำเร็จทั้งหมด</h2></div>
<div class="table-style1">
<br>
        <table id="student-list">
            <thead>
                <tr>
                    <td><font color="white"> วันที่จอง</font></td>
                    <td><font color="white">ชื่อลูกค้า</font></td>
                    <td><font color="white">สนามที่จอง</font></td>
                    <td><font color="white">เวลา</font></td>
                    <td><font color="white">จำนวนชั่วโมง</font></td>
                    <td><font color="white">สถานะ</font></td>

                </tr>
            </thead>
            <?php if ($booking) : ?>
                <?php foreach ($booking as $books) : ?>
                    <tr>
                        <td><?php echo $books['B_day'] ?></td>
                        <td><?php echo $books['username'] ?></td>
                        <td><?php echo $books['Name'] ?></td>
                        <td> <?php
                                $count = 0;
                                if ($detail) : ?>
                                <?php foreach ($detail as $details) : ?>
                                    <?php if ($details['d_id'] == $books['B_id']) {
                                            $count += 1;
                                            echo  $details['T_start']; ?>-<?php echo $details['T_end'] . '<br/>';
                                                            } ?>
                                <?php endforeach; ?>
                            <?php endif; ?></td>
                        <td><?php echo $count ?> ชั่วโมง</td>
                        <td><?php echo $books['S_name'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </center>
        </table>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#student-list').DataTable();
    });
</script>
</div>
</body>
</html>