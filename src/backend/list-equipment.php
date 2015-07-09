<div class="panel panel-success">
    <div class="panel-heading clearfix">
        <h4 class="panel-title pull-left" style="padding-top: 7.5px;">
            <i class="glyphicon glyphicon-folder-close"></i> รายการ อุปกรณ์
        </h4>
        <div class="btn-group pull-right">
            <a href="index.php?page=frm-equipment" class="btn btn-info">
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
                        <th>ชื่อ</th>
                        <th>อธิบาย</th>
                        <th>วันที่แก้ไข</th>
                        <th>ผู้แก้ไข</th>
                        <th style="width: 8%">แก้ไข</th>
                        <th style="width: 8%">ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../config/connect.php';
                    $sql_equipment = "SELECT * FROM equipment e";
                    $sql_equipment .= " LEFT JOIN brand b ON b.bra_id = e.bra_id";
                    $sql_equipment .= " LEFT JOIN model m ON m.mod_id = e.mod_id";
                    $sql_equipment .= " LEFT JOIN color c ON c.col_id = e.col_id";
                    $sql_equipment .= " JOIN person p ON p.per_id = e.equ_updateby";
                    $sql_equipment .= " ORDER BY e.equ_id";
                    $query_equipment = mysql_query($sql_equipment) or die(mysql_error());
                    $row = 1;
                    while ($data = mysql_fetch_array($query_equipment)):
                        ?>
                        <tr>
                            <td><?= $row ?></td>
                            <td><?= $data['equ_name'] ?></td>
                            <td>
                                <textarea class="form-control"><?= 'ยี้ห้อ : ' . $data['bra_nameth'] . '  รุ่น : '.$data['mod_nameth'] ?></textarea>
                            </td>
                            <td><?= format_date('d/m/Y', $data['equ_updatedate']) ?></td>
                            <td><?= $data['per_fname'] ?></td>
                            <td>
                                <a href="index.php?page=frm-equipment&id=<?= $data['equ_id'] ?>" class="btn btn-primary">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" onclick="delete_data(<?= $data['equ_id'] ?>, '../method/equipment.php?method=delete')">
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


