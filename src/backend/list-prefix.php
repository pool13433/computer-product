<div class="panel panel-success">
    <div class="panel-heading clearfix">
        <h4 class="panel-title pull-left" style="padding-top: 7.5px;">
            <i class="glyphicon glyphicon-unchecked"></i> รายการ คำนำหน้าชื่อ
        </h4>
        <div class="btn-group pull-right">
            <a href="index.php?page=frm-prefix" class="btn btn-info">
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
                        <th>ชื่อ</th>
                        <th>วันที่แก้ไข</th>
                        <th>ผู้แก้ไข</th>
                        <th>แก้ไข</th>
                        <th>ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../config/connect.php';
                    $sql_prefix = "SELECT * FROM prefix c";
                    $sql_prefix .= " JOIN person p ON p.per_id = c.pre_updateby";
                    $sql_prefix .= " ORDER BY c.pre_id";
                    $query_prefix = mysql_query($sql_prefix) or die(mysql_error());
                    $row = 1;
                    while ($data = mysql_fetch_array($query_prefix)):
                        ?>
                        <tr>
                            <td><?= $row ?></td>
                            <td><?= $data['pre_name'] ?></td>                            
                            <td><?= format_date('d/m/Y', $data['pre_updatedate']) ?></td>
                            <td><?= $data['per_fname'] ?></td>
                            <td>
                                <a href="index.php?page=frm-prefix&id=<?= $data['pre_id'] ?>" class="btn btn-primary">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" onclick="delete_data(<?= $data['pre_id'] ?>, '../method/prefix.php?method=delete')">
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


