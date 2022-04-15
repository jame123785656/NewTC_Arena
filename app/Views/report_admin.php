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
            <h3>150 คน</h3>
        </div>
        <div class="card-report">
            <h2>จำนวนการจอง</h2>
            <h3>256 ครั้ง</h3>
        </div>
    </div>

    


    <div class="form-time-report">
        <input type="date" id="birthday" name="birthday">
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



                    <tr>
                        <td>1/05/2565</td>
                        <td>10.00-11.00 <br>11.00-12.00 </td>
                        <td> เจรามี่ </td>
                        <td> A </td>
                        <td> 2 </td>
                        <td>ยืนยันเรียบร้อย</td>
                    </tr>

                    <tr>
                        <td>1/05/2565</td>
                        <td>12.00-13.00</td>
                        <td> โอน้อยออก </td>
                        <td> B </td>
                        <td> 1 </td>
                        <td>ยังไม่ได้รับการยืนยัน</td>
                    </tr>

                    <tr>
                        <td>1/05/2565</td>
                        <td>12.00-13.00 <br> 13.00-14.00</td>
                        <td> บิววี่ </td>
                        <td> D </td>
                        <td> 2 </td>
                        <td>ยังไม่ได้รับการยืนยัน</td>
                    </tr>

                    <tr>
                        <td>1/05/2565</td>
                        <td>12.00-13.00
                        <td> ติ๋ม </td>
                        <td> C </td>
                        <td> 1 </td>
                        <td>ยืนยันเรียบร้อย</td>
                    </tr>


            </table>

            
        </div>
        <style>
            .table-style {
                border-collapse: collapse;
                background-color: #dddd;
                border: 1px solid #DADBDB;
                width: 60%;
                border-radius: 2%;


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

</body>

</html>