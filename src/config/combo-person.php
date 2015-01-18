<?php $list_person = List_PersonStatus(); ?>
<select class="form-control validate[required]" name="combo-person" data-errormessage-value-missing="กรุณาเลือก สถานะผู้ใช้งาน">
    <option value="">-- เลือก --</option>
    <?php foreach ($list_person as $key => $data): ?>
        <?php if ($perstatus == $key): ?>
            <option value="<?= $key ?>" selected><?= $data ?></option>
        <?php else: ?>
            <option value="<?= $key ?>"><?= $data ?></option>
        <?php endif; ?>
    <?php endforeach; ?>
</select>
