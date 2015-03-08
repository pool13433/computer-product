<div class="panel panel-success">
    <div class="panel-heading clearfix">
        <h4 class="panel-title pull-left" style="padding-top: 7.5px;">
            <i class="glyphicon glyphicon-list-alt"></i> รายการ ใบซ่อมเข้า    
        </h4>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered dataTable">
                <thead>
                    <tr>
                        <th>ดู</th>
                        <th>ชื่อรหัสใบซ่อม</th>                        
                        <th>วันที่คาดว่าจะเริ่มซ่อม</th>
                        <th>วันที่คาดว่าจะเสร็จซ่อม</th>                        
                        <th>สถานะ</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../config/connect.php';
                    $sql_repair = "SELECT *";
                    //$sql_repair .= " concat(c.per_fname,'    ',c.per_lname) as customer,";
                    //$sql_repair .= " concat(p.per_fname,'    ',p.per_lname) as employee";
                    $sql_repair .= " FROM repair r";
                    $sql_repair .= " LEFT JOIN brand b ON b.bra_id = r.bra_id";
                    $sql_repair .= " LEFT JOIN model m ON m.mod_id = r.mod_id";
                    $sql_repair .= " LEFT JOIN person p ON p.per_id = r.per_id";
                    //$sql_repair .= " LEFT JOIN person p ON p.per_id = r.rep_repairers";
                    $sql_repair .= " WHERE rep_status > 0";
                    $sql_repair .= " ORDER BY r.rep_id";
                    $query_repair = mysql_query($sql_repair) or die(mysql_error());
                    $row = 1;
                    while ($data = mysql_fetch_array($query_repair)):
                        ?>
                        <tr>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" 
                                        data-target="#modal_repair_detail<?= $data['rep_id'] ?>">
                                    <i class="glyphicon glyphicon-eye-open"></i>
                                </button> 
                                <?php include '../modal/modal_repair_detail.php'; ?>
                            </td>
                            <td><?= $data['rep_code'] ?></td>                            
                            <td><?= format_date('d/m/Y', $data['rep_expect_startdate']) ?></td>
                            <td><?= format_date('d/m/Y', $data['rep_expect_enddate']) ?></td>                                                        
                            <td>
                                <span class="label label-<?= getDataList($data['rep_status'], List_RepairStatusBG()) ?>"><?= getDataList($data['rep_status'], List_RepairStatus()) ?></span>
                            </td>
                            <td>                                
                                <div class="btn-group-vertical" role="group" aria-label="...">
                                    <!-- Button trigger modal -->
                                    <?php if ($_SESSION['person']['per_status'] == REPAIRNAME) { ?>
                                        <?php if ($data['rep_status'] == WAIT_ESTIMATE) { ?>
                                            <?= $data['rep_status'] ?>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-success" data-toggle="modal" 
                                                    data-target="#modal-estimate<?= $data['rep_id'] ?>" id="btnLoadModalEstimate<?= $data['rep_id'] ?>">
                                                ประเมินการซ่อมเครื่อง
                                            </button>
                                            <?php include '../modal/modal_estimate.php'; ?>
                                        <?php } ?>
                                    <?php } else if ($_SESSION['person']['per_status'] == CUSTOMER) { ?>
                                        <?php if ($data['rep_status'] != APPROVE || $data['rep_status'] == NON_APPROVE) { ?>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-success" onclick="change_approve(<?= $data['rep_id'] ?>,<?= APPROVE ?>)">
                                                อนุมัติ
                                            </button>
                                            <button type="button" class="btn btn-danger" onclick="change_approve(<?= $data['rep_id'] ?>,<?= NON_APPROVE ?>)">
                                                ไม่อนุมัติ
                                            </button>
                                        <?php } ?>
                                    <?php } ?>
                                </div>                                
                            </td>
                        </tr>             
                        <?php
                        $row++;
                    endwhile;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    function change_approve(rep_id, status) {
        var conf = confirm('ยืนยันการอนุมัติการซ่อม ใช่[OK] || ไม่ใช่[Cancel]');
        if (conf) {
            $.post('../method/repair.php?method=approve', {
                status: status,
                rep_id: rep_id,
            }, function(data) {
                showJAlert(data.title, data.msg, data.status)
                if (data.status == 'success') {
                    reloadDelay(1);
                }
            }, 'json');
            return true;
        }
        return false;
    }
</script>

