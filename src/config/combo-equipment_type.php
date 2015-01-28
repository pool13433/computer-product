<?php
if (empty($conn)):
    include '../config/connect.php';
endif;
$sql_equipment_type = " SELECT * FROM equipment_type ORDER BY equtyp_name";
$query_equipment_type = mysql_query($sql_equipment_type) or die(mysql_error());
?>
<select class="form-control validate[required]" name="combo-equipment_type" data-errormessage-value-missing="กรุณาเลือก ประเภท อุปกรณ์">
    <option value="">-- เลือก --</option>
    <?php while ($data_equipment_type = mysql_fetch_array($query_equipment_type)): ?>
        <?php if ($equipment_type == $data_equipment_type['equtyp_id']): ?>
            <option value="<?= $data_equipment_type['equtyp_id'] ?>" selected><?= $data_equipment_type['equtyp_name'] ?></option>
        <?php else: ?>
            <option value="<?= $data_equipment_type['equtyp_id'] ?>"><?= $data_equipment_type['equtyp_name'] ?></option>
        <?php endif; ?>
    <?php endwhile; ?>
</select>
