
<?php
header('Content-Type: text/html; charset=utf-8');
include '../../MPDF57/mpdf.php';
include '../config/connect.php';
$str_array = "";
$array = array();
$sql = " SELECT * FROM repair";
$query = mysql_query($sql) or die(mysql_error());
while ($data = mysql_fetch_array($query)) {
    if (empty($str_array)) {
        $str_array = $str_array . $data['rep_problem'];
    } else {
        $str_array = $str_array . ',' . $data['rep_problem'];
    }
}
$array = array_count_values(explode(',', $str_array));
$problemArrayObject = new ArrayObject($array);
$problemArrayObject->ksort();

function getProblemName($prob_id) {
    $sql = " SELECT * FROM problem WHERE prob_id = $prob_id";
    $query = mysql_query($sql) or die(mysql_error());
    $data = mysql_fetch_assoc($query);
    return $data['prob_name'];
}

ob_start();
echo '<link type="text/css" rel="stylesheet" href="../../css/report_style.css"/>';
?>
<h2 style="text-align: center">ปัญหาการซ่อมในระบบ เรียงจากปัญหาที่พบมากไปหาหน้อย</h2>
<table class="table table-bordered table-condensed">
    <thead>
        <tr>
            <th>ลำดับ</th>
            <th>ชื่อปัญหา</th>
            <th>จำนวน</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($problemArrayObject as $key => $val) { ?>            
            <tr>
                <td style="text-align: center;width: 10%"><?= $i ?></td>
                <td style="text-align: left;width: 75%"><?= getProblemName($key) ?></td>
                <td style="text-align: center;width: 15%"><?= $val ?></td>
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
$mpdf->AddPage('P');
$mpdf->Write($stylesheet, 1);
$mpdf->WriteHTML($html);
$mpdf->Output('ปัญหาการซ่อมในระบบ.pdf', 'D');
?>


