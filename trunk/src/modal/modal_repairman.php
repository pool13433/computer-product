<!-- Modal -->
<div class="modal fade" id="modal-repairman<?= $data['rep_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">มอบหมายงานให้ช่างรับผิดชอบ</h4>
            </div>
            <div class="modal-body">
                <form name="frm-repairman<?= $data['rep_id'] ?>" id="frm-repairman<?= $data['rep_id'] ?>" class="form-horizontal">
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label">ช่าง</label>
                        <div class="col-sm-6">
                            <input type="text" name="input-id" id="input-id" value="<?= $data['rep_id'] ?>"/>
                            <?php $repairman = $data['rep_repairers'] ?>
                            <?php include '../config/combo-repairman.php'; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input-createdate" class="col-sm-4 control-label">วันที่คาดหวังจะเริ่มซ่อม</label>
                        <div class="col-sm-4 input-append date">
                            <div class="input-group">
                                <?= format_date('d/m/Y', $data['rep_expect_startdate']) ?>
                                <input type="text" class="form-control validate[required]"                                       
                                       data-errormessage-value-missing="กรุณากรอก วันที่ซ่อม" value="<?= format_date('d/m/Y', $data['rep_expect_startdate']) ?>"
                                       data-date-format="dd/mm/yyyy" name="input-expect_startdate" id="datetext_1" readonly/>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" id="datebtn_1">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="input-createdate" class="col-sm-4 control-label">วันที่คาดหวังจะซ่อมเสร็จ</label>
                        <div class="col-sm-4 input-append date">
                            <div class="input-group">                                
                                <input type="text" class="form-control validate[required]"
                                       data-errormessage-value-missing="กรุณากรอก วันที่ซ่อม" value="<?= change_dateYMD_TO_DMY($data['rep_expect_enddate']) ?>"
                                       data-date-format="dd/mm/yyyy" name="input-expect_enddate" id="datetext_2" readonly/>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" id="datebtn_2">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div> 
                </form>
            </div>
            <div class="modal-footer">                
                <button type="submit" class="btn btn-primary" onclick="javascript:$('#frm-repairman<?= $data['rep_id'] ?>').submit()">
                    <i class="glyphicon glyphicon-ok-circle"></i> มอบหมายทันที                        
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <i class="glyphicon glyphicon-remove-circle"></i> ปิด                   
                </button>    
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var valid = $('#frm-repairman<?= $data['rep_id'] ?>').validationEngine('attach', {
            promptPosition: "centerRight",
            scroll: false,
            onValidationComplete: function(form, status) {
                if (status) {
                    post_form('frm-repairman<?= $data['rep_id'] ?>', '../method/repair.php?method=assign_repairman');
                }
            }
        });
        valid.css({
            'box-shadow': '2px 2px 2px 2px #888888',
            'padding': '20px',
        });    
    });
</script>