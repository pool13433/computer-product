<?php
if(empty($conn)):
    include '../config/connect.php';
endif;
$sql_model = " SELECT * FROM model ORDER BY mod_nameeng";
$query_model = mysql_query($sql_model) or die(mysql_error());
?>
<select class="form-control" name="combo-model" 
        data-validation-engine="validate[required]"
        data-errormessage-value-missing="กรุณาเลือก ยี้ห้อ">
    <option value="">-- เลือก --</option>
    <?php while ($data_model = mysql_fetch_array($query_model)): ?>
        <?php if ($model == $data_model['mod_id']): ?>
            <option value="<?= $data_model['mod_id'] ?>" selected><?= $data_model['mod_nameth'] . '(' . $data_model['mod_nameeng'] . ')' ?></option>
        <?php else: ?>
            <option value="<?= $data_model['mod_id'] ?>"><?= $data_model['mod_nameth'] . '(' . $data_model['mod_nameeng'] . ')' ?></option>
        <?php endif; ?>
    <?php endwhile; ?>
</select>
