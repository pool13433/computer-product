<?php
if(empty($conn)):
    include '../config/connect.php';
endif;
$sql_brand = " SELECT * FROM brand ORDER BY bra_nameeng";
$query_brand = mysql_query($sql_brand) or die(mysql_error());
?>
<select class="form-control validate[required]" name="combo-brand" data-errormessage-value-missing="กรุณาเลือก ยี้ห้อ">
    <option value="">-- เลือก --</option>
    <?php while ($data_brand = mysql_fetch_array($query_brand)): ?>
        <?php if ($brand == $data_brand['bra_id']): ?>
            <option value="<?= $data_brand['bra_id'] ?>" selected><?= $data_brand['bra_nameth'] . '(' . $data_brand['bra_nameeng'] . ')' ?></option>
        <?php else: ?>
            <option value="<?= $data_brand['bra_id'] ?>"><?= $data_brand['bra_nameth'] . '(' . $data_brand['bra_nameeng'] . ')' ?></option>
        <?php endif; ?>
    <?php endwhile; ?>
</select>
