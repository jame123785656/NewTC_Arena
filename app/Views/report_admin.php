<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('./css/employee.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('./css/report.css'); ?>">

    <title>Dashboard</title>
</head>

<body>

    <?php require('component/navbar_admin.php') ?>
    <div class="big-card">
        <div class="row-report">
            <div class="card-processing">
                    <a href="/payadmin_all"><h2>กำลังรอดำเนินการ <img src="/image/clock.png" alt="" width="30px" height="30px"></h2>
                    <h3><?php echo $books_wait; ?> รายการ</h3></a>

            </div>
            <div class="card-success">
                    <h2>จำนวนการจองสำเร็จ <img src="/image/checked.png" alt="" width="30px" height="30px"></h2>
                    <h3><?php echo $book_total; ?> รายการ</h3>
            </div>
            <div class="card-income">
                    <h2>รายได้เดือนปัจจุบัน <img src="/image/money.png" alt="" width="30px" height="30px"></h2>
                    <h3><?php echo $book_month; ?> บาท</h3>
            </div>
            <div class="card-allincome">
                    <h2>รายได้ทั้งหมดต่อปี <img src="/image/money-bag.png" alt="" width="30px" height="30px"></h2>
                    <h3><?php echo $book_price; ?> บาท</h3>
            </div>
        </div>

    <div class="table-style">
        <table id="student-list">
        <div class ="text-today">
            <h3>รายการจองสำเร็จวันนี้</h3> 
            <div class="text-right">
                <a href="/report_all"><button class="btn-all-transaction" type="button" ><p>รายการทั้งหมด</p></button></a>
            </div>
        </div>
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
</div>

</html>