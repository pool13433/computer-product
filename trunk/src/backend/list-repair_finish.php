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
                        <th>วันมาเริ่มซ่อม</th>
                        <th>วันที่มารับสิ้นค้า</th>                        
                        <th>สถานะ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../config/connect.php';
                    $sql_repair = "SELECT *,";
                    $sql_repair .= " concat(p.per_fname,'    ',p.per_lname) as customer";                    
                    $sql_repair .= " FROM repair r";
                    $sql_repair .= " LEFT JOIN brand b ON b.bra_id = r.bra_id";
                    $sql_repair .= " LEFT JOIN model m ON m.mod_id = r.mod_id";
                    $sql_repair .= " LEFT JOIN person p ON p.per_id = r.per_id";
                    //$sql_repair .= " WHERE rep_status > ".PROCESSING;
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
                            <td><?= format_date('d/m/Y', $data['rep_repair_createdate']) ?></td>
                            <td><?= format_date('d/m/Y', $data['rep_repair_getdate']) ?></td>                                                        
                            <td>
                                <span class="label label-<?= getDataList($data['rep_status'], List_RepairStatusBG()) ?>"><?= getDataList($data['rep_status'], List_RepairStatus()) ?></span>
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