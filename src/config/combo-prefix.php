<?php
if(empty($conn)):
    include '../config/connect.php';
endif;
$sql_prefix = " SELECT * FROM prefix ORDER BY pre_name";
$query_prefix = mysql_query($sql_prefix) or die(mysql_error());
?>
<select class="form-control validate[required]" name="combo-prefix" data-errormessage-value-missing="กรุณาเลือก คำนำหน้าชื่อ">
    <option value="">-- เลือก --</option>
    <?php while ($data_prefix = mysql_fetch_array($query_prefix)): ?>
        <?php if ($prefix == $data_prefix['pre_id']): ?>
            <option value="<?= $data_prefix['pre_id'] ?>" selected><?= $data_prefix['pre_name'] ?></option>
        <?php else: ?>
            <option value="<?= $data_prefix['pre_id'] ?>"><?= $data_prefix['pre_name'] ?></option>
        <?php endif; ?>
    <?php endwhile; ?>
</select>
