
<?php
header('Content-Type: text/html; charset=utf-8');
include '../../MPDF57/mpdf.php';
include '../config/connect.php';

function format_date($format, $date) {
    if ($date == '00-00-0000') {
        return '';
    } else {
        $date_format = new DateTime($date);
        $new_date = $date_format->format($format);
        return $new_date;
    }
}

$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];
$option = $_GET['option'];
$status = $_GET['status'];

$sql = " SELECT rep_id,rep_code,";
$sql .= " CONCAT(per_fname,' ',per_lname) customer,";
$sql .= " DATE_FORMAT(`rep_repair_createdate`,'%d-%m-%Y') rep_repair_createdate,";
$sql .= " DATE_FORMAT(`rep_repair_getdate`,'%d-%m-%Y') rep_repair_getdate,";
$sql .= " DATE_FORMAT(`rep_actual_startdate`,'%d-%m-%Y') rep_actual_startdate,";
$sql .= " DATE_FORMAT(`rep_actual_enddate`,'%d-%m-%Y') rep_actual_enddate,";
$sql .= " DATEDIFF( `rep_actual_startdate` , `rep_actual_enddate` ) count_working,";
$sql .= " rep_estimate_price";
$sql .= " FROM repair r";
$sql .= " LEFT JOIN person p ON p.per_id = r.per_id";
$sql .= " WHERE 1=1 ";
if(!empty($status)){
    $sql .= " AND rep_status = $status";
}
if ($option == '1') {   //วันที่มาให้ร้านซ่อม
    $sql .= " AND (`rep_repair_createdate` BETWEEN";
    $sql .= " STR_TO_DATE('" . format_date('Y-m-d', $start_date) . "','%Y-%m-%d')";
    $sql .= " AND ";
    $sql .= " STR_TO_DATE('" . format_date('Y-m-d', $end_date) . "','%Y-%m-%d'))";
    $option = 'วันที่มาให้ร้านซ่อม';
} else if ($option == '2') {  // วันที่มารับของ
    $sql .= " AND (`rep_repair_getdate` BETWEEN";
    $sql .= " STR_TO_DATE('" . format_date('Y-m-d', $start_date) . "','%Y-%m-%d')";
    $sql .= " AND ";
    $sql .= " STR_TO_DATE('" . format_date('Y-m-d', $end_date) . "','%Y-%m-%d'))";
    $option = 'วันที่มารับของ';
} else if ($option == '3') {  // วันที่เริ่มซ่อม
    $sql .= " AND (`rep_actual_startdate` BETWEEN";
    $sql .= " STR_TO_DATE('" . format_date('Y-m-d', $start_date) . "','%Y-%m-%d')";
    $sql .= " AND ";
    $sql .= " STR_TO_DATE('" . format_date('Y-m-d', $end_date) . "','%Y-%m-%d'))";
    $option = 'วันที่เริ่มซ่อม';
} else if ($option == '4') {  // วันที่สิ้นสุดซ่อม
    $sql .= " AND (`rep_actual_enddate` BETWEEN";
    $sql .= " STR_TO_DATE('" . format_date('Y-m-d', $start_date) . "','%Y-%m-%d')";
    $sql .= " AND ";
    $sql .= " STR_TO_DATE('" . format_date('Y-m-d', $end_date) . "','%Y-%m-%d'))";
    $option = 'วันที่สิ้นสุดซ่อม';
}
$query = mysql_query($sql) or die(mysql_error());
ob_start();
echo '<link type="text/css" rel="stylesheet" href="../../css/report_style.css"/>';
?>
<h2 style="text-align: center">รายงานสรุปการซ่อม ประเภท <?= $option ?> ตั้งแต่วันที่ <?= $start_date ?> ถึง <?= $end_date ?></h2>
<table class="table table-bordered table-condensed">
    <thead>
        <tr>
            <th>ลำดับ</th>
            <th>รหัสการซ่อม</th>
            <th>ชื่อลูกค้า</th>
            <th>วันมาติดต่อซ่อม</th>
            <th>วันรับเครื่องคืน</th>
            <th>วันเริ่มซ่อม</th>
            <th>วันซ่อมเสร็จ</th>
            <th>ระยะเวลาการซ่อม</th>
            <th>ราคา</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php while ($data = mysql_fetch_array($query)) { ?>            
            <tr>
                <td style="text-align: center;width: 5%"><?= $i ?></td>
                <td style="text-align: left;width: 10%"><?= $data['rep_code'] ?></td>
                <td style="text-align: left;width: 15%"><?= $data['customer'] ?></td>
                <td style="text-align: center;width: 10%"><?= $data['rep_repair_createdate'] ?></td>
                <td style="text-align: center;width: 10%"><?= $data['rep_repair_getdate'] ?></td>
                <td style="text-align: center;width: 10%"><?= $data['rep_actual_startdate'] ?></td>
                <td style="text-align: center;width: 10%"><?= $data['rep_actual_enddate'] ?></td>
                <td style="text-align: center;width: 5%"><?= $data['count_working'] ?></td>
                <td style="text-align: center;width: 10%"><?= $data['rep_estimate_price'] ?></td>
            </tr>
            <?php
            $i++;
        }
        ?>
    </tbody>
</table>
<?php
$html = ob_get_contents();
ob_clean();
$mpdf = new mPDF("UTF-8");
$mpdf->SetAutoFont();
$mpdf->AddPage('L'); // P แนวตั้ง L แนวนอน
$mpdf->Write($stylesheet, 1);
$mpdf->WriteHTML($html);
$mpdf->Output('รายงานสรุปการซ่อม ' . $option . ' ตั้งแต่วันที่ ' . $start_date . ' ถึง  ' . $end_date . '.pdf', 'D');
?>


