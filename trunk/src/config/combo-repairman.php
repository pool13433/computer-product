<?php
if (empty($conn)):
    include '../config/connect.php';
endif;
$sql_brand = " SELECT * FROM person ORDER BY per_status = ".REPAIRNAME;
$query_brand = mysql_query($sql_brand) or die(mysql_error());
?>
<select class="form-control" name="combo-repairman" 
        data-validation-engine="validate[required]"
        data-errormessage-value-missing="กรุณาเลือก ช่างซ่อม">
    <option value="">-- เลือก --</option>
    <?php while ($data_person = mysql_fetch_array($query_brand)): ?>
        <?php if ($repairman == $data_person['per_id']): ?>
            <option value="<?= $data_person['per_id'] ?>" selected><?= $data_person['per_fname'].'   '.$data_person['per_lname'] ?></option>
        <?php else: ?>
            <option value="<?= $data_person['per_id'] ?>"><?= $data_person['per_fname'].'   '.$data_person['per_lname'] ?></option>
        <?php endif; ?>
    <?php endwhile; ?>
</select>
