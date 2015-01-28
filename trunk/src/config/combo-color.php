<?php
if(empty($conn)):
    include '../config/connect.php';
endif;
$sql_color = " SELECT * FROM color ORDER BY col_name";
$query_color = mysql_query($sql_color) or die(mysql_error());
?>
<select class="form-control validate[required]" name="combo-color" data-errormessage-value-missing="กรุณาเลือก ยี้ห้อ">
    <option value="">-- เลือก --</option>
    <?php while ($data_color = mysql_fetch_array($query_color)): ?>
        <?php if ($color == $data_color['col_id']): ?>
            <option value="<?= $data_color['col_id'] ?>" selected><?= $data_color['col_name'] . '(' . $data_color['col_name'] . ')' ?></option>
        <?php else: ?>
            <option value="<?= $data_color['col_id'] ?>"><?= $data_color['col_name'] . '(' . $data_color['col_name'] . ')' ?></option>
        <?php endif; ?>
    <?php endwhile; ?>
</select>
