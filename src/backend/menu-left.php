<div class="list-group">
    <a href="#" class="list-group-item alert-info alert" style="text-align: center">
        <div class="label label-info">
            <?= ' ชื่อ :: ' . $per_fname ?><br/><?= ' นามสกุล :: ' . $per_lname ?>
        </div><br/>               
        <div class="label label-warning">
            <?= ' สถานะ :: ' . getDataList($per_status, List_PersonStatus()) ?>
        </div>    
    </a>
    <a href="#" class="list-group-item active"><i class="glyphicon glyphicon-list"></i> เมนู</a>
    <a href="index.php?page=list-person" class="list-group-item"><i class="glyphicon glyphicon-user"></i> รายการ ผู้ใช้งาน</a>
    <a href="#" class="list-group-item active"><i class="glyphicon glyphicon-sort-by-attributes"></i> เกี่ยวกับอุปกร์</a>
    <a href="index.php?page=list-brand" class="list-group-item"><i class="glyphicon glyphicon-th-large"></i> รายการ ยี้ห้อคอมพิวเตอร์</a>
    <a href="index.php?page=list-model" class="list-group-item"><i class="glyphicon glyphicon-th"></i> รายการ รุ่นคอมพิวเตอร์</a>
    <a href="index.php?page=list-equipment" class="list-group-item"><i class="glyphicon glyphicon-folder-close"></i> รายการ อุปกรณ์</a>
    <a href="index.php?page=list-equipment_type" class="list-group-item"><i class="glyphicon glyphicon-tasks"></i> รายการ ประเภทอุปกรณ์</a>
    <a href="index.php?page=list-color" class="list-group-item"><i class="glyphicon glyphicon-unchecked"></i> รายการ สี</a>
    <a href="#" class="list-group-item active"><i class="glyphicon glyphicon-sort-by-attributes"></i> เกี่ยวกับใบซ่อม</a>
    <a href="index.php?page=list-problem" class="list-group-item"><i class="glyphicon glyphicon-warning-sign"></i> รายการ ปัญหา/สาเหตุ</a>        
    <a href="index.php?page=list-accessory" class="list-group-item"><i class="glyphicon glyphicon-asterisk"></i> รายการ อุปกรณ์เสริมที่ติดเครื่องมา</a>        
    <a href="index.php?page=list-repair" class="list-group-item"><i class="glyphicon glyphicon-list-alt"></i> รายการ ใบซ่อม</a>        
    <a href="#" class="list-group-item active"><i class="glyphicon glyphicon-sort-by-attributes"></i> เกี่ยวกับรายงาน</a>
    <a href="index.php?page=report-1" class="list-group-item"><i class="glyphicon glyphicon-calendar"></i> รายงาน 1</a> 
    <a href="index.php?page=report-2" class="list-group-item"><i class="glyphicon glyphicon-calendar"></i> รายงาน 2</a> 
</div>