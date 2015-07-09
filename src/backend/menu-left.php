<div class="panel-group" id="accordion">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseZero">
                    <span class="glyphicon glyphicon-home">
                    </span> ข้อมูลส่วนตัว</a>
            </h4>
        </div>
        <div id="collapseZero" class="panel-collapse collapse in">
            <div class="panel-body">
                <div class="label label-info">
                    <?= ' ชื่อ :: ' . $per_fname . ' นามสกุล :: ' . $per_lname ?>
                </div><br/>
                <div class="label label-success">
                    <?= ' สถานะ :: ' . getDataList($per_status, List_PersonStatus()) ?>
                </div> 
            </div>
        </div>
    </div>
    <?php if ($per_status == EMPLOYEE) { ?>
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        <span class="glyphicon glyphicon-user">
                        </span> ผู้ใช้งาน</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse">
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td>
                                <a href="index.php?page=list-prefix" onclick="setAccordion(this)"><i class="glyphicon glyphicon-briefcase"></i> คำนำหน้าชื่อ</a>
                            </td>
                        </tr>     
                        <tr>
                            <td>
                                <a href="index.php?page=list-person" onclick="setAccordion(this)"><i class="glyphicon glyphicon-user"></i> จัดการผู้ใช้งานระบบ</a>
                            </td>
                        </tr>                    
                    </table>
                </div>
            </div>
        </div>
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        <span class="glyphicon glyphicon-wrench">
                        </span> เกี่ยวกับการตั้งค่า</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td>
                                <a href="index.php?page=list-brand" onclick="setAccordion(this)"><i class="glyphicon glyphicon-th-large"></i> รายการยี่ห้อ</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="index.php?page=list-model" onclick="setAccordion(this)"><i class="glyphicon glyphicon-th"></i> รายการรุ่น</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="index.php?page=list-problem" onclick="setAccordion(this)"><i class="glyphicon glyphicon-bold"></i> รายการอาการเสีย</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="index.php?page=list-equipment" onclick="setAccordion(this)"><i class="glyphicon glyphicon-folder-close"></i> รายการ อุปกรณ์</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="index.php?page=list-equipment_type" onclick="setAccordion(this)"><i class="glyphicon glyphicon-tasks"></i> รายการ ประเภทอุปกรณ์</a>
                            </td>
                        </tr>
                        <!--<tr>
                            <td>
                                <a href="index.php?page=list-color" onclick="setAccordion(this)"><i class="glyphicon glyphicon-unchecked"></i> รายการ สี</a>
                            </td>
                        </tr>-->
                        <tr>
                            <td>
                                <a href="index.php?page=list-accessory" onclick="setAccordion(this)"><i class="glyphicon glyphicon-list-alt"></i> รายการ อุปกรณ์ติดเครื่องมาด้วย</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        <span class="glyphicon glyphicon-book">
                        </span> ใบซ่อม</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td>
                                <a href="index.php?page=list-repair" onclick="setAccordion(this)"><i class="glyphicon glyphicon-list-alt"></i> รายการใบรับซ่อม</a>     
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="index.php?page=list-repairman" onclick="setAccordion(this)"><i class="glyphicon glyphicon-wrench"></i> รายการงานซ่อม</a>        
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="index.php?page=list-repair_finish" onclick="setAccordion(this)"><i class="glyphicon glyphicon-ok-circle"></i> รายการ ซ่อมเสร็จแล้ว</a>        
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                        <span class="glyphicon glyphicon-file">
                        </span>รายงาน</a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
                <div class="panel-body">
                    <table class="table" id="ok">
                        <tr>
                            <td>
                                <a href="index.php?page=report-1" onclick="setAccordion(this)"><i class="glyphicon glyphicon-calendar"></i> รายงาน 1</a> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="index.php?page=report-2" onclick="setAccordion(this)"><i class="glyphicon glyphicon-calendar"></i> รายงาน 2</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="index.php?page=report-3" onclick="setAccordion(this)"><i class="glyphicon glyphicon-calendar"></i> รายงาน 3</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    <?php } else if ($per_status == REPAIRNAME) { ?>
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                        <span class="glyphicon glyphicon-file">
                        </span>รายงาน</a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td>
                                <a href="index.php?page=report-1" onclick="setAccordion(this)"><i class="glyphicon glyphicon-calendar"></i> รายงาน 1</a> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="index.php?page=report-2" onclick="setAccordion(this)"><i class="glyphicon glyphicon-calendar"></i> รายงาน 2</a>
                            </td>
                        </tr>                        
                    </table>
                </div>
            </div>
        </div>
    <?php } else if ($per_status == CUSTOMER) { ?>
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                        <span class="glyphicon glyphicon-file">
                        </span>เมนูการใช้งานของลูกค้า</a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td>
                                <a href="index.php?page=list-repairman" onclick="setAccordion(this)"><i class="glyphicon glyphicon-wrench"></i> รายการ ใบซ่อมช่าง</a>                                   
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="index.php?page=list-repair_finish" onclick="setAccordion(this)"><i class="glyphicon glyphicon-ok-circle"></i> รายการ ซ่อมเสร็จแล้ว</a>        
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#' + getCookie('accordion')).prop('class', 'panel-collapse collapse in');
    });

</script>