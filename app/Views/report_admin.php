<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('./css/navbar_Admin.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('./css/employee.css'); ?>">

    <title>สรุปยอด</title>
</head>

<body>

    <?php require('component/navbar_admin.php') ?>

    <div class="row-report">
        <div class="card-report">
            <h2>จำนวนผู้ใช้บริการ</h2>
            <h3><?php echo $count_id; ?> คน</h3>
        </div>
        <div class="card-report">
            <h2>จำนวนการจอง</h2>
            <h3><?php echo $book_total; ?> ครั้ง</h3>
        </div>
    </div>


    <div class="form-time-report">
        <input class="input" type="text" id="myInput"  onkeyup="myFunction()" placeholder="ค้นหาวันที่จอง" title="Type in a name">
        <button class="btn"  type="submit">ค้นหา</button>
    </div>
    <div class="table-style">
        <table style="width:100%">

            <center>
                <tr>
                    <td>วันที่จอง</td>
                    <td>เวลา</td>
                    <td>ชื่อลูกค้า</td>
                    <td>สนามที่จอง</td>
                    <td>จำนวนชั่วโมง</td>
                    <td>สถานะ</td>

                </tr>

                <?php if($books): ?>
                <?php foreach($books as $books): ?>
                <tr id="myUL">
                    <td><?php echo $books['B_day']?></td>
                    <td><?php echo $books['username']?></td>
                    <td><?php echo $books['Name']?></td>
                    <td> <?php  
                $count = 0;
                        if ($detail) : ?>
                        <?php foreach ($detail as $details) : ?>
                            <?php if($details['d_id'] == $books['B_id']){
                                $count += 1;
                                echo  $details['T_start']; ?>-<?php echo $details['T_end'] .'<br/>' ;
                            }?>
                         <?php endforeach; ?>
                    <?php endif; ?></td> 
                <td><?php echo $count ?> ชั่วโมง</td>
                <td><?php echo $books['S_name']?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </center>
        </table>

    </div>

    <style>
    .table-style {
        border-collapse: collapse;
        background-color: #dddd;
        border: 1px solid #DADBDB;
        width: 60%;
        border-radius: 2px;
        margin-left: 20%;
        margin-top: 4%;
    }

    .form-time-report {
        position: fixed;
        left: 47%;
    }

    .form {
        border: 2px solid black;
        border-radius: 12px;
        padding: 8px;
    }

    .input {
        border: 1px solid black;
        border-radius: 12px;
        padding: 5px;
    }

    td {
        border-bottom: 2px solid #cfcbcb;
        text-align: center;
        padding: 8px;
    }

    th {
        background-color: #70635f;
        border: 1px solid #f7f2f2;
        text-align: center;
        padding: 8px;

    }

    .search {
        border-radius: 25px;
        margin-left: 68%;
        margin-bottom: 10px;
        display: flex;

    }

    .red {
        color: red;
    }

    .Green {
        color: #25E327;
    }
    </style>

    <script>
    function myFunction() {
        var input, filter, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        tr = document.getElementById("myUL");
        td = tr.getElementsByTagName("td");
        for (i = 0; i < td.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                td[i].style.display = "";
            } else {
                td[i].style.display = "none";
            }
        }
    }
    </script>
</body>

</html>