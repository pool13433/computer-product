
<!-- Modal -->
<div class="modal fade" id="modal_repair_detail<?= $data['rep_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">รายละเอียดใบซ่อม</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-2">รหัส</label>
                        <label class="col-md-4"><?= $data['rep_id'] ?></label>
                        <label class="col-md-2">รหัสโค๊ด</label>
                        <label class="col-md-4"><?= $data['rep_code'] ?></label>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2">ชื่อลูกค้า</label>
                        <label class="col-md-4"><?= $data['per_fname'] . '  ' . $data['per_lname'] ?></label>
                        <label class="col-md-2">โทรศัพท์</label>
                        <label class="col-md-4"><?= $data['per_mobile'] ?></label>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2">วันมาเริ่มซ่อม</label>
                        <label class="col-md-4"><?= format_date('d/m/Y', $data['rep_repair_createdate']) ?></label>
                        <label class="col-md-2">วันมารับของ</label>
                        <label class="col-md-4"><?= format_date('d/m/Y', $data['rep_repair_getdate']) ?></label>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2">ยี้ห้อ</label>
                        <label class="col-md-4"><?= $data['bra_nameth'] ?></label>
                        <label class="col-md-2">รุ่น</label>
                        <label class="col-md-4"><?= $data['mod_nameth'] ?></label>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2">เลขเครื่อง</label>
                        <label class="col-md-4"><?= $data['rep_serial_number'] ?></label>
                        <label class="col-md-2">อุปกรณ์</label>
                        <label class="col-md-4">
                            <?php
                            if (!empty($data['rep_equipment'])) {
                                $sql_equipment = " SELECT * FROM equipment WHERE equ_id in (" . $data['rep_equipment'] . ")";
                                $query_equipment = mysql_query($sql_equipment) or die(mysql_error());
                                while ($equipment = mysql_fetch_array($query_equipment)) {
                                    echo '<span class="label label-info">' . $equipment['equ_name'] . '</span>,';
                                }
                            }
                            ?>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2">ปัญหา</label>
                        <label class="col-md-4">
                            <?php
                            if (!empty($data['rep_equipment'])) {
                                $sql_problem = " SELECT * FROM problem WHERE prob_id in (" . $data['rep_problem'] . ")";
                                $query_problem = mysql_query($sql_problem) or die(mysql_error());
                                while ($problem = mysql_fetch_array($query_problem)) {
                                    echo '<span class="label label-warning">' . $problem['prob_name'] . '</span>,';
                                }
                            }
                            ?>
                        </label>
                        <label class="col-md-2">ปัญหา อื่น ๆ</label>
                        <label class="col-md-4"><?= $data['rep_problem_other'] ?></label>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2">วิธีการชำระเงิน</label>
                        <label class="col-md-4"><?= $data['rep_payment'] ?></label>
                        <label class="col-md-2">รหัสพนักงานซ่อม</label>
                        <label class="col-md-4"><?= $data['rep_repairers'] ?></label>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2">วันที่คาดหวังเริ่มซ่อม </label>
                        <label class="col-md-4"><?= format_date('d/m/Y', $data['rep_expect_startdate']) ?></label>
                        <label class="col-md-2">วันที่คาดหวัง ซ่อมเสร็จ </label>
                        <label class="col-md-4"><?= format_date('d/m/Y', $data['rep_expect_enddate']) ?></label>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2">ราคาที่ประเมิน </label>
                        <label class="col-md-4"><?= $data['rep_estimate_price'] ?></label>
                        <label class="col-md-2"></label>
                        <label class="col-md-4"></label>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2">วันเริ่มซ่อมจริง </label>
                        <label class="col-md-4"><?= format_date('d/m/Y', $data['rep_actual_startdate']) ?></label>
                        <label class="col-md-2">วันสิ้นสุดซ่อมจริง</label>
                        <label class="col-md-4"><?= format_date('d/m/Y', $data['rep_actual_enddate']) ?></label>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2">หมายเหตุ</label>
                        <label class="col-md-4"><?= $data['rep_repair_remark'] ?></label>
                        <label class="col-md-2">สถานะ</label>
                        <label class="col-md-4">
                            <span class="label label-<?= getDataList($data['rep_status'], List_RepairStatusBG()) ?>"><?= getDataList($data['rep_status'], List_RepairStatus()) ?></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2">วันแก้ไขข้อมูล</label>
                        <label class="col-md-4"><?= format_date('d/m/Y', $data['rep_updatedate']) ?></label>
                        <label class="col-md-2">ผู้แก้ไข</label>
                        <label class="col-md-4"><?= $data['rep_updateby'] ?></label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <i class="glyphicon glyphicon-remove-sign"></i> ปิด
                </button>
            </div>
        </div>
    </div>
</div>