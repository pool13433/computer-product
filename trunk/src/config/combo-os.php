<?php
$listdata = List_SystemOS();
?>
<select class="form-control" name="combo-support" multiple id="combo-support">
    <option value="">-- เลือก --</option>
    <?php foreach ($listdata as $key => $value): ?>
        <?php if ($support == $key): ?>
            <option value="<?= $key ?>" selected><?= $value ?></option>
        <?php else: ?>
            <option value="<?= $key ?>"><?= $value ?></option>
        <?php endif; ?>
    <?php endforeach; ?>
</select>
