<div class="panel panel-success">
    <div class="panel-heading clearfix">
        <h4 class="panel-title pull-left" style="padding-top: 7.5px;">
            <i class="glyphicon glyphicon-th-large"></i> รายการ อุปกรณ์ที่เป็นอะไหล่เครื่อง
        </h4>
        <div class="btn-group pull-right">
        </div>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" action="pdf-3.php" method="get" target="_blank">                        
            <div class="form-group">
                <label for="input-createdate" class="col-sm-2 control-label">กลุ่มของอะไหล่ซ่อม</label>
                <div class="col-sm-4">
                    <?php include '../config/connect.php'; ?>
                    <?php $sql = "SELECT * FROM equipment_type"; ?>
                    <?php $query = mysql_query($sql) or die(mysql_error()); ?>
                    <select class="form-control" name="equipment_type">
                        <option value="">-- เลือก --</option>
                        <?php while ($data = mysql_fetch_array($query)) { ?>
                            <option value="<?= $data['equtyp_id'] ?>"><?= $data['equtyp_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2"></label>
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary">
                        <i class="glyphicon glyphicon-export"></i> ออกรายงาน
                    </button>                    
                </div>
            </div>
        </form>
    </div>
</div>


