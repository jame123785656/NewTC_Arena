<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('./css/employee.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('./css/report.css'); ?>">

    <title>สรุปยอด</title>
</head>

<body>

    <?php require('component/navbar_admin.php') ?>

    <div class="row-report">
    <div class="card-success">
            <h2>จำนวนการจองสำเร็จ</h2>
            <h3><?php echo $book_total; ?> รายการ</h3>
        </div>
        <div class="card-processing">
            <h2>กำลังรอดำเนินการ</h2>
            <h3><?php echo $books_wait; ?> รายการ</h3>
        </div>
        <div class="card-alluser">
            <h2>ผู้ใช้บริการทั้งหมด</h2>
            <h3><?php echo $count_id; ?> คน</h3>
        </div>
        <div class="card-income">
            <h2>รายได้เดือนปัจจุบัน</h2>
            <h3><?php echo $book_month; ?> บาท</h3>
        </div>
        <div class="card-allincome">
            <h2>รายได้ทั้งหมด</h2>
            <h3><?php echo $book_price; ?> บาท</h3>
        </div>
       

    </div>
    <a href="/report_all"><button>รายการทั้งหมด</button></a>
    <div class="table-style">
        <table id="student-list">
            <thead>
                <tr>
                    <td>วันที่จอง</td>
                    <td>ชื่อลูกค้า</td>
                    <td>สนามที่จอง</td>
                    <td>เวลา</td>
                    <td>จำนวนชั่วโมง</td>
                    <td>สถานะ</td>

                </tr>
            </thead>
            <?php if ($books) : ?>
                <?php foreach ($books as $books) : ?>
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
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#student-list').DataTable();
    });
</script>


</html>