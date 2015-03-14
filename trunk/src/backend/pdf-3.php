
<?php
header('Content-Type: text/html; charset=utf-8');
include '../../MPDF57/mpdf.php';
include '../config/connect.php';


$equipment_type = $_GET['equipment_type'];

$sql = " SELECT *";
$sql .= " FROM equipment e";
$sql .= " LEFT JOIN brand b ON b.bra_id = e.bra_id";
$sql .= " LEFT JOIN color c ON c.col_id = e.col_id";
$sql .= " LEFT JOIN model m ON m.mod_id = e.mod_id";
$sql .= " LEFT JOIN equipment_type et ON et.equtyp_id = e.equtyp_id";
if (!empty($equipment_type)) {
    $sql .= " WHERE e.equtyp_id = $equipment_type";
}
$sql .= " ORDER BY e.equtyp_id ASC";
$query = mysql_query($sql) or die(mysql_error());
ob_start();
echo '<link type="text/css" rel="stylesheet" href="../../css/report_style.css"/>';
?>
<h2 style="text-align: center">รายงานอุปกรณ์อะไหล่ซ่อม</h2>
<table class="table table-bordered table-condensed">
    <thead>
        <tr>
            <th>ลำดับ</th>
            <th>ชื่อ</th>
            <th>อธิบาย</th>
            <th>ยี้ห้อ</th>
            <th>รุ่น</th>
            <th>สี</th>
            <th>ประเภท</th>
            <th>ราคา</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php while ($data = mysql_fetch_array($query)) { ?>            
            <tr>
                <td style="text-align: center;width: 5%"><?= $i ?></td>
                <td style="text-align: left;width: 10%"><?= $data['equ_name'] ?></td>
                <td style="text-align: left;width: 15%"><?= $data['equ_desc'] ?></td>
                <td style="text-align: center;width: 10%"><?= $data['bra_name'] ?></td>
                <td style="text-align: center;width: 10%"><?= $data['mod_name'] ?></td>
                <td style="text-align: center;width: 10%"><?= $data['col_name'] ?></td>
                <td style="text-align: center;width: 10%"><?= $data['equtyp_name'] ?></td>
                <td style="text-align: center;width: 5%"><?= $data['equ_price'] ?></td>
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
$mpdf->Output('รายงานอุปกรณ์อะไหล่ซ่อม.pdf', 'D');
?>


