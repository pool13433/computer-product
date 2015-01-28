<div class="panel panel-success">
    <div class="panel-heading clearfix">
        <h4 class="panel-title pull-left" style="padding-top: 7.5px;">
            <i class="glyphicon glyphicon-list-alt"></i> รายการ ใบซ่อมเข้า    
        </h4>
        <div class="btn-group pull-right">
            <a href="index.php?page=frm-repair_in   " class="btn btn-info">
                <i class="glyphicon glyphicon-plus-sign"></i> สร้าง
            </a>
        </div>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered dataTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ชื่อไทย</th>
                        <th>ชื่ออังกฤษ</th>
                        <th>วันที่แก้ไข</th>
                        <th>ผู้แก้ไข</th>
                        <th>แก้ไข</th>
                        <th>ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../config/connect.php';
                    $sql_repair_in = "SELECT * FROM repair_in ri";
                    $sql_repair_in .= " JOIN person p ON p.per_id = ri.repin_updateby";
                    $sql_repair_in .= " ORDER BY ri.repin_id";
                    $query_repair_in = mysql_query($sql_repair_in) or die(mysql_error());
                    $row = 1;
                    while ($data = mysql_fetch_array($query_repair_in)):
                        ?>
                        <tr>
                            <td><?= $row ?></td>
                            <td><?= $data['repin_nameth'] ?></td>
                            <td><?= $data['repin_nameeng'] ?></td>
                            <td><?= format_date('d/m/Y', $data['repin_updatedate']) ?></td>
                            <td><?= $data['per_fname'] ?></td>
                            <td>
                                <a href="index.php?page=frm-repair_in&id=<?= $data['repin_id'] ?>" class="btn btn-primary">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" onclick="delete_data(<?= $data['repin_id'] ?>, '../method/repair_in.php?method=delete')">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </button>
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


