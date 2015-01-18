<div class="panel panel-success">
    <div class="panel-heading clearfix">
        <h4 class="panel-title pull-left" style="padding-top: 7.5px;">
            <i class="glyphicon glyphicon-user"></i> รายการ ผู้ใช้งานในระบบ
        </h4>
        <div class="btn-group pull-right">
            <a href="index.php?page=frm-person" class="btn btn-info">
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
                        <th>นามสกุล</th>
                        <th>สถานะ</th>
                        <th>วันที่แก้ไข</th>
                        <th>ผู้แก้ไข</th>
                        <th>แก้ไข</th>
                        <th>ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../config/connect.php';
                    $sql_brand = "SELECT * FROM person pp";                    
                    $sql_brand .= " ORDER BY pp.per_id";
                    $query_brand = mysql_query($sql_brand) or die(mysql_error());
                    $row = 1;
                    while ($data = mysql_fetch_array($query_brand)):
                        ?>
                        <tr>
                            <td><?= $row ?></td>
                            <td><?= $data['per_fname'] ?></td>
                            <td><?= $data['per_lname'] ?></td>
                            <td><?= Get_Person($data['per_status']) ?></td>
                            <td><?= format_date('d/m/Y', $data['per_updatedate']) ?></td>
                            <td><?= $data['per_fname'] ?></td>
                            <td>
                                <a href="index.php?page=frm-person&id=<?= $data['per_id'] ?>" class="btn btn-warning">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" onclick="delete_data(<?= $data['per_id'] ?>, '../method/person.php?method=delete')">
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

