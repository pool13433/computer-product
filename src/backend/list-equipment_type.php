<div class="panel panel-success">
    <div class="panel-heading clearfix">
        <h4 class="panel-title pull-left" style="padding-top: 7.5px;">
            <i class="glyphicon glyphicon-tasks"></i> รายการ ประเภทอุปกรณ์
        </h4>
        <div class="btn-group pull-right">
            <a href="index.php?page=frm-equipment_type" class="btn btn-info">
                <i class="glyphicon glyphicon-plus-sign"></i> สร้าง
            </a>
        </div>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered dataTable">
                <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th>ชื่อไทย</th>
                        <th>ชื่ออังกฤษ</th>
                        <th>วันที่แก้ไข</th>
                        <th>ผู้แก้ไข</th>
                        <th style="width: 8%">แก้ไข</th>
                        <th style="width: 8%">ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../config/connect.php';
                    $sql_equipment_type = "SELECT * FROM equipment_type b";
                    $sql_equipment_type .= " JOIN person p ON p.per_id = b.equtyp_updateby";
                    $sql_equipment_type .= " ORDER BY b.equtyp_id";
                    $query_equipment_type = mysql_query($sql_equipment_type) or die(mysql_error());
                    $row = 1;
                    while ($data = mysql_fetch_array($query_equipment_type)):
                        ?>
                        <tr>
                            <td><?= $row ?></td>
                            <td><?= $data['equtyp_name'] ?></td>
                            <td><?= $data['equtyp_desc'] ?></td>
                            <td><?= format_date('d/m/Y', $data['equtyp_updatedate']) ?></td>
                            <td><?= $data['per_fname'] ?></td>
                            <td>
                                <a href="index.php?page=frm-equipment_type&id=<?= $data['equtyp_id'] ?>" class="btn btn-primary">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" onclick="delete_data(<?= $data['equtyp_id'] ?>, '../method/equipment_type.php?method=delete')">
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


