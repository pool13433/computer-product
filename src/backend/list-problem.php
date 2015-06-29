<div class="panel panel-success">
    <div class="panel-heading clearfix">
        <h4 class="panel-title pull-left" style="padding-top: 7.5px;">
            <i class="glyphicon glyphicon-th-large"></i> หน้าจอรายการอาการเสีย
        </h4>
        <div class="btn-group pull-right">
            <a href="index.php?page=frm-problem" class="btn btn-info">
                <i class="glyphicon glyphicon-plus-sign"></i> เพิ่ม
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
                    $sql_problem = "SELECT * FROM problem b";
                    $sql_problem .= " JOIN person p ON p.per_id = b.prob_updateby";
                    $sql_problem .= " ORDER BY b.prob_id";
                    $query_problem = mysql_query($sql_problem) or die(mysql_error());
                    $row = 1;
                    while ($data = mysql_fetch_array($query_problem)):
                        ?>
                        <tr>
                            <td><?= $row ?></td>
                            <td><?= $data['prob_name'] ?></td>
                            <td><?= $data['prob_desc'] ?></td>
                            <td><?= format_date('d/m/Y', $data['prob_updatedate']) ?></td>
                            <td><?= $data['per_fname'] ?></td>
                            <td>
                                <a href="index.php?page=frm-problem&id=<?= $data['prob_id'] ?>" class="btn btn-primary">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" onclick="delete_data(<?= $data['prob_id'] ?>, '../method/problem.php?method=delete')">
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


