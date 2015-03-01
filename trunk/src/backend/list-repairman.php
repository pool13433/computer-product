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
                        <th>ชื่อรหัสใบซ่อม</th>
                        <th>ชื่อลูกค้า</th>
                        <th>วันที่คาดว่าจะเริ่มซ่อม</th>
                        <th>วันที่คาดว่าจะเสร็จซ่อม</th>
                        <th>ชือช่าง</th>                        
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../config/connect.php';
                    $sql_repair = "SELECT r.*,";
                    $sql_repair .= " concat(c.per_fname,'    ',c.per_lname) as customer,";
                    $sql_repair .= " concat(p.per_fname,'    ',p.per_lname) as employee";
                    $sql_repair .= " FROM repair r";
                    $sql_repair .= " LEFT JOIN person c ON c.per_id = r.per_id";
                    $sql_repair .= " LEFT JOIN person p ON p.per_id = r.rep_repairers";
                    $sql_repair .= " WHERE rep_status > 0";
                    $sql_repair .= " ORDER BY r.rep_id";
                    $query_repair = mysql_query($sql_repair) or die(mysql_error());
                    $row = 1;
                    while ($data = mysql_fetch_array($query_repair)):
                        ?>
                        <tr>
                            <td><?= $data['rep_code'] ?></td>
                            <td><?= $data['customer'] ?></td>
                            <td><?= format_date('d/m/Y', $data['rep_expect_startdate']) ?></td>
                            <td><?= format_date('d/m/Y', $data['rep_expect_enddate']) ?></td>                            
                            <td><?= $data['employee'] ?></td>
                            <td>
                                <div class="btn-group-vertical" role="group" aria-label="...">
                                    <a href="index.php?page=frm-repair&cmd=<?=REPAIRNAME?>&id=<?= $data['rep_id'] ?>" class="btn btn-primary">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-repairman<?= $data['rep_id'] ?>">
                                        มอบหมายช่าง
                                    </button>
                                    <?php include '../modal/modal_repairman.php'; ?>
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


