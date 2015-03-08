<!-- Modal -->
<div class="modal fade" id="modal-estimate<?= $data['rep_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">ประเมินการซ่อม</h4>
            </div>
            <div class="modal-body">
                <form name="frm-estimate<?= $data['rep_id'] ?>" id="frm-estimate<?= $data['rep_id'] ?>" class="form-horizontal">                                         
                    <div class="form-group">
                        <label for="combo-equipment" class="col-sm-3 control-label">การซ่อม-อะไหล่ที่ต้องเปลี่ยน</label>
                        <div class="col-sm-9">
                            <input type="hidden" name="input-id" id="input-id" value="<?= $data['rep_id'] ?>"/>
                            <select class="form-control" id="combo-equipment<?= $data['rep_id'] ?>" multiple                             
                                    data-validation-engine="validate[required]"
                                    data-errormessage-value-missing="กรุณาเลือก อะไหล่ที่ต้องเปลี่ยน"
                                    name="input-equipment" id="input-equipment">  
                                        <?php
                                        $sql_equipment = "SELECT * FROM equipment";
                                        $query_equipment = mysql_query($sql_equipment) or die(mysql_error());
                                        while ($data_equipment = mysql_fetch_array($query_equipment)):
                                            ?>
                                    <option value="<?= $data_equipment['equ_id'] ?>"><?= $data_equipment['equ_name'] ?></option>
                                <?php endwhile; ?>
                            </select>
                            <input type="hidden" name="hidden-equipment" id="hidden-equipment"/>
                        </div>                    
                    </div>
                    <div class="form-group">
                        <label for="input-idcard" class="col-sm-3 control-label">ราคาซ่อม</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" value="<?= $data['rep_estimate_price'] ?>"
                                   data-validation-engine="validate[required,custom[number]]"
                                   data-errormessage-value-missing="กรุณากรอก ราคาซ่อม"
                                   data-errormessage-custom-error="กรุณากรอก ตัวเลขเท่านั้น"
                                   name="input-price" id="input-price"/>
                        </div>
                    </div>
                    <?php 
                        if($data['rep_status'] == 2){
                            $radio_success = 'checked';
                            $radio_fail = '';
                        }else if($data['rep_status'] == 3){
                            $radio_fail = 'checked';
                            $radio_success = '';
                        }
                    ?>
                    <div class="form-group">
                        <label for="rep_status" class="col-sm-3 control-label">สถานะการประเมินซ่อม</label>
                        <div class="col-sm-9">
                            <div class="radio-inline">
                                <label class="control-label">
                                    <input type="radio" name="rep_status" value="2" <?=$radio_success?>/> ประเมินราคา เสร็จสิ้น
                                </label>
                            </div>
                            <div class="radio-inline">
                                <label class="control-label">
                                    <input type="radio" name="rep_status" value="3" <?=$radio_fail?>/> ประเมินราคา ไม่ผ่าน (ไม่สามารถซ่อมได้)
                                </label>
                            </div>                           
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input-problem_other" class="col-sm-3 control-label">สาเหตุ</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" 
                                      name="input-remark" id="input-remark"><?= $data['rep_repair_remark'] ?></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">                
                <button type="submit" class="btn btn-primary" onclick="javascript:$('#frm-estimate<?= $data['rep_id'] ?>').submit()">
                    <i class="glyphicon glyphicon-ok-circle"></i> ประเมินการซ่อมเครื่อง                        
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <i class="glyphicon glyphicon-remove-circle"></i> ปิด                   
                </button>    
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var selectEquipment = $('#combo-equipment<?= $data['rep_id'] ?>').select2();

        $('#btnLoadModalEstimate<?= $data['rep_id'] ?>').on('click', function() {
            onLoadSelect2(selectEquipment);
        });
        var valid = $('#frm-estimate<?= $data['rep_id'] ?>').validationEngine('attach', {
            promptPosition: "centerLeft:50",
            scroll: false,
            onValidationComplete: function(form, status) {
                if (status) {
                    post_form('frm-estimate<?= $data['rep_id'] ?>', '../method/repair.php?method=estimate');
                }
            }
        });
        valid.css({
            'box-shadow': '2px 2px 2px 2px #888888',
            'padding': '20px',
        });

        // ###########select 2 #####################        

        selectEquipment.select2({
            placeholder: "-- คลิกเลือก อะไหล่ที่ต้องเปลี่ยน --",
            allowClear: true,
            closeOnSelect: true,
            //tags: true,            
            width: '100%',
        }).on("select2-open", function() {
            $('#hidden-equipment').val(selectEquipment.select2('val'));
        }).on("select2-selecting", function(e) {
            //alert('value ' + select2.select2('val'));
            $('#hidden-equipment').val(e.val);
        }).on("change", function(e) {
            //alert('value ' + select2.select2('val'));
            $('#hidden-equipment').val(e.val);
        });
        // ###########select 2 #####################
    });
    function onLoadSelect2(selectEquipment) {
        // ################ load default data ######
        var edit_id = $('#input-id').val();
        console.log('edit_id ::==' + edit_id);
        if (edit_id != '') {
            $.post('../method/repair.php?method=get_default_select2',
                    {
                        id: edit_id,
                    }, function(defaultData) {

                selectEquipment.select2("data", defaultData.equipments);
                $('#hidden-equipment').val(selectEquipment.select2('val'));
            }, 'json');
        }
        // ################ load default data ######
    }
    function validateEquipment() {
        var problem = $('#hidden-equipment').val();
        if (problem == '') {
            return 'กรุณาเลือก อะไหล่ที่ต้องเปลี่ยน';
        }
    }
</script>