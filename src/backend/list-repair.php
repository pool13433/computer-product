<div class="panel panel-success">
    <div class="panel-heading clearfix">
        <h4 class="panel-title pull-left" style="padding-top: 7.5px;">
            <i class="glyphicon glyphicon-list-alt"></i> หน้าจอรายการใบรับซ่อม    
        </h4>
        <div class="btn-group pull-right">
            <a href="index.php?page=frm-repair " class="btn btn-info">
                <i class="glyphicon glyphicon-plus-sign"></i> สร้างใบรับซ่อม
            </a>
        </div>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered dataTable">
                <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th>ชื่อรหัสใบซ่อม</th>
                        <th>ชื่อลูกค้า</th>
                        <th>วันรับซ่อม</th>
                        <th>วันรับของซ่อม</th>
                        <!--<th>วันที่แก้ไข</th>
                        <th>ผู้แก้ไข</th>-->
                        <th style="width: 8%">สถานะ</th>
                        <th style="width: 8%">#</th>
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
                    $sql_repair .= " LEFT JOIN person p ON p.per_id = r.rep_updateby";
                    $sql_repair .= " ORDER BY r.rep_id";
                    $query_repair = mysql_query($sql_repair) or die(mysql_error());
                    $row = 1;
                    while ($data = mysql_fetch_array($query_repair)):
                        ?>
                        <tr>
                            <td><?= $row ?></td>
                            <td><?= $data['rep_code'] ?></td>
                            <td><?= $data['customer'] ?></td>
                            <td><?= format_date('d/m/Y', $data['rep_repair_createdate']) ?></td>
                            <td><?= format_date('d/m/Y', $data['rep_repair_getdate']) ?></td>
                            <!--<td><?= format_date('d/m/Y', $data['rep_createdate']) ?></td>
                            <td><?= $data['employee'] ?></td>-->
                            <td>
                                <span class="label label-<?=  getDataList($data['rep_status'], List_RepairStatusBG())?>"><?=  getDataList($data['rep_status'], List_RepairStatus())?></span>
                            </td>
                            <td>
                                <div class="btn-group-vertical" role="group" aria-label="...">
                                    <a href="index.php?page=frm-repair&id=<?= $data['rep_id'] ?>" class="btn btn-primary">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger" onclick="delete_data(<?= $data['rep_id'] ?>, '../method/repair.php?method=delete')">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </button>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-repairman<?=$data['rep_id']?>">
                                        มอบหมายช่าง
                                    </button>
                                    <?php include '../modal/modal_repairman.php';?>
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


