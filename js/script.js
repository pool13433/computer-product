/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var DATATABLE_LANGUAGE = {
    "lengthMenu": "เลือกแสดง _MENU_ แถวต่อหน้า",
    "info": "กำลังแสดงข้อมูล หน้า <label class='label label-info'>_PAGE_</label> จากทั้งหมด <label class='label label-info'>_PAGES_</label> หน้า",
    "infoEmpty": "-- แสดง 0 รายการ --",
    "infoFiltered": "(กรองจาก _MAX_ แถวทั้งหมด)",
    "emptyTable": "ไม่มีข้อมูลในตาราง",
    "infoPostFix": "",
    "infoThousands": ".",
    "loadingRecords": "กำลังโหลด ...",
    "processing": "กำลังประมวลผล...",
    "search": "ค้นหา...",
    "paginate": {
        "first": "หน้าแรก",
        "previous": "ก่อนหน้า",
        "next": "ต่อไป",
        "last": "หน้าสุดท้าย"
    },
    "aria": {
        "sortAscending": ": เปิดใช้งานในการจัดเรียงจากน้อยไปมากคอลัมน์",
        "sortDescending": ": เปิดใช้งานจะเรียงลำดับจากมากไปน้อยคอลัมน์"
    }
};
var DATEPICKER_LOCAL = {
    applyLabel: 'เลือก',
    cancelLabel: 'ยกเลิก',
    fromLabel: 'จาก',
    toLabel: 'ถึง',
    customRangeLabel: 'Custom',
    daysOfWeek: ['อา.', 'จ.', 'อ.', 'พ.', 'พฤ.', 'ศ.', 'ส.'],
    monthNames: ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"],
    firstDay: 1
};

$(document).ready(function () {
    // http://wenzhixin.net.cn/p/bootstrap-table/docs/index.html
    /*
     * DataTable Plugin
     */
    $('.dataTable').dataTable({
        "dom": "<'row'<'col-xs-6'l><'col-xs-6'f>r><'row'<'col-xs-12'P>>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
        "language": DATATABLE_LANGUAGE,
    });
    $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'ค้นหาข้อมูล...');
    $('.dataTables_length select').addClass('form-control');

    /*
     * DataTable Plugin
     */


    // ################### date properties ###########
    var objToday = new Date(),
            weekday = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'),
            dayOfWeek = weekday[objToday.getDay()],
            domEnder = new Array('th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th'),
            dayOfMonth = today + (objToday.getDate() < 10) ? '0' + objToday.getDate() + domEnder[objToday.getDate()] : objToday.getDate() + domEnder[parseFloat(("" + objToday.getDate()).substr(("" + objToday.getDate()).length - 1))],
            months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
            curMonth = months[objToday.getMonth()],
            curYear = objToday.getFullYear(),
            curHour = objToday.getHours() > 12 ? objToday.getHours() - 12 : (objToday.getHours() < 10 ? "0" + objToday.getHours() : objToday.getHours()),
            curMinute = objToday.getMinutes() < 10 ? "0" + objToday.getMinutes() : objToday.getMinutes(),
            curSeconds = objToday.getSeconds() < 10 ? "0" + objToday.getSeconds() : objToday.getSeconds(),
            curMeridiem = objToday.getHours() > 12 ? "PM" : "AM";
    var today = curHour + ":" + curMinute + "." + curSeconds + curMeridiem + " " + dayOfWeek + " " + dayOfMonth + " of " + curMonth + ", " + curYear;
    // ################### date properties ###########

    // ########### datepicker ##########
    var default_date1 = $('#datetext_1');
    if (default_date1.val() != '') {
        default_date1.datepicker("setDate", default_date1.val());
    } else {
        $.fn.datepicker.defaults.format = "dd-mm-yyyy";
    }
    //var current = new Date().toLocaleFormat('DD-MM-YYYY');
    var current = moment().format("DD-MM-YYYY");
    var datepicke_1 = default_date1.datepicker("setDate", current);


    datepicke_1.on('changeDate', function (ev) {
        $(this).datepicker('hide');
    });
    datepicke_1.off('focus');
    $('#datebtn_1').click(function () {
        datepicke_1.datepicker('show');
    });

    var datepicker_2 = $('#datetext_2').datepicker("setDate", current);
    datepicker_2.on('changeDate', function (ev) {
        $(this).datepicker('hide');
    });
    datepicker_2.off('focus');
    $('#datebtn_2').click(function () {
        datepicker_2.datepicker('show');
    });
    // ########### datepicker ##########
});



function notify(type, msg, delay) {
    /* var messages = [
     ['bottom-right', 'info', 'Gah this is awesome.'],
     ['top-right', 'success', 'I love Nijiko, he is my creator.'],
     ['bottom-left', 'warning', 'Soda is bad.'],
     ['top-right', 'danger', "I'm sorry dave, I'm afraid I can't let you do that."],
     ['bottom-right', 'info', "There are only three rules."],
     ['top-right', 'inverse', 'Do you hear me now?'],
     ['bottom-left', 'blackgloss', 'You should fork this!']
     ];*/
    $('.top-left').notify({
        message: {text: msg}
    }).show();
}
function showNotification(nType, nTitle, nText, nDelay) {
    /*
     * https://github.com/sciactive/pnotify
     * 
     * Configuration Defaults / Options
     title: false - The notice's title.
     title_escape: false - Whether to escape the content of the title. (Not allow HTML.)
     text: false - The notice's text.
     text_escape: false - Whether to escape the content of the text. (Not allow HTML.)
     styling: "bootstrap3" - What styling classes to use. (Can be either jqueryui, bootstrap2, bootstrap3, fontawesome, or a custom style object. See the source for the properties in a style object.)
     addclass: "" - Additional classes to be added to the notice. (For custom styling.)
     cornerclass: "" - Class to be added to the notice for corner styling.
     auto_display: true - Display the notice when it is created. Turn this off to add notifications to the history without displaying them.
     width: "300px" - Width of the notice.
     min_height: "16px" - Minimum height of the notice. It will expand to fit content.
     type: "notice" - Type of the notice. "notice", "info", "success", or "error".
     icon: true - Set icon to true to use the default icon for the selected style/type, false for no icon, or a string for your own icon class.
     animation: "fade" - The animation to use when displaying and hiding the notice. "none", "show", "fade", and "slide" are built in to jQuery. Others require jQuery UI. Use an object with effect_in and effect_out to use different effects.
     animate_speed: "slow" - Speed at which the notice animates in and out. "slow", "def" or "normal", "fast" or number of milliseconds.
     position_animate_speed: 500 - Specify a specific duration of position animation.
     opacity: 1 - Opacity of the notice.
     shadow: true - Display a drop shadow.
     hide: true - After a delay, remove the notice.
     delay: 8000 - Delay in milliseconds before the notice is removed.
     mouse_reset: true - Reset the hide timer if the mouse moves over the notice.
     remove: true - Remove the notice's elements from the DOM after it is removed.
     insert_brs: true - Change new lines to br tags.
     stack: {"dir1": "down", "dir2": "left", "push": "bottom", "spacing1": 25, "spacing2": 25, context: $("body")} - The stack on which the notices will be placed. Also controls the direction the notices stack.
     */
    var opts = {
        styling: "bootstrap3",
        delay: 1000 * nDelay,
        history: true,
        type: nType,
        title: nTitle,
        text: nText,
        shadow: true,
        icon: 'glyphicon glyphicon-bell', //'<i class="glyphicon glyphicon-trash"></i>',
        animation: 'slide',
        animate_speed: 'fast',
        addclass: "stack-topright",
        desktop: {
            //desktop: true
        },
        nonblock: {
            //nonblock: true,
            //nonblock_opacity: .2,
        },
        buttons: {
            closer: true, //- Provide a button for the user to manually close the notice.
            closer_hover: true, //- Only show the closer button on hover.
            sticker: true, //- Provide a button for the user to manually stick the notice.
            sticker_hover: true, //- Only show the sticker button on hover.
            labels: {close: "Close", stick: "Stick"}, //- Lets you change the displayed text, facilitating internationalization.
        },
        confirm: {
            confirm: false,
        }
    };
    new PNotify(opts);
}
function redirectDelay(url, timer) {
    setTimeout(function () {
        window.location.href = url; //will redirect to your blog page (an ex: blog.html)
    }, (timer * 1000)); //will call the function after 2 secs.
}
function reloadDelay(timer) {
    setTimeout(function () {
        window.location.reload();//will redirect to your blog page (an ex: blog.html)
    }, (timer * 1000)); //will call the function after 2 secs.
}
function goUrl(url) {
    window.location.href = url; //will redirect to your blog page (an ex: blog.html)
}
function print_properties_in_object(object) {
    var output = '';
    for (var property in object) {
        output += property + ': ' + object[property] + '; ';
    }
    return output;
}

function logout() {
    var conf = confirm('ยืนยันการออกจากระบบ ใช่ [OK] || ไม่ใช่ [Cancle]');
    if (conf) {
        $.post('../method/person.php?method=logout', {}, function (data) {
            if (data.status == 'success') {
                redirectDelay('../index/index.php', 1);
            }
        }, 'json');
        return true;
    }
    return false;
}
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}
function checkCookie() {
    var user = getCookie("username");
    if (user != "") {
        alert("Welcome again " + user);
    } else {
        user = prompt("Please enter your name:", "");
        if (user != "" && user != null) {
            setCookie("username", user, 365);
        }
    }
}
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ')
            c = c.substring(1);
        if (c.indexOf(name) == 0)
            return c.substring(name.length, c.length);
    }
    return "";
}
function post_form(formid, url) {
    $.ajax({
        url: url,
        data: $('#' + formid).serialize(),
        type: 'post',
        dataType: 'json',
        success: function (data, textStatus, jqXHR) {
            showJAlert(data.title, data.msg, data.status)
            if (data.status == 'success') {
                redirectDelay(data.url, 1);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('jqXHR : ' + jqXHR + ' \ntextStatus : ' + textStatus + ' \nerrorThrown : ' + errorThrown);
            if (jqXHR.status === 0) {
                showJAlert('error', 'Not connect.\n Verify Network.', 'error');
            } else if (jqXHR.status == 404) {
                showJAlert('error', 'Requested page not found. [404]', 'error');
            } else if (jqXHR.status == 500) {
                showJAlert('error', 'Internal Server Error [500].', 'error');
            } else if (exception === 'parsererror') {
                showJAlert('error', 'Requested JSON parse failed.', 'error');
            } else if (exception === 'timeout') {
                showJAlert('error', 'Time out error.', 'error');
            } else if (exception === 'abort') {
                showJAlert('error', 'Ajax request aborted.', 'error');
            } else {
                showJAlert('error', 'Uncaught Error.\n' + jqXHR.responseText, 'error');
            }
        }
    });
}
function delete_data(id, url) {
    var conf = confirm('ยืนยันการลบข้อมูล รหัส ' + id + 'ใช่[OK] || ไม่ใช่[CANCLE]');
    if (conf) {
        $.ajax({
            url: url,
            data: {id: id},
            type: 'post',
            dataType: 'json',
            success: function (data) {
                showJAlert(data.title, data.msg, data.status);
                if (data.status == 'success') {
                    reloadDelay(1);
                }
            }
        });
        return true;
    }
    return false;
}

function showJAlert(title, msg, theme) {
    $.fn.jAlert({
        'title': title,
        'message': msg,
        'theme': theme, // info,error,success,dark,...
    });
}
function find_model(element) {
    var brand_id = element.value;
    $.post('../method/model.php?method=find_model', {brand: brand_id}, function (data) {
        var model = $('select[name=combo-model]');
        model.children().remove();
        $.each(data, function (index, value) {
            model.append('<option value=' + value.mod_id + '>' + value.mod_nameth + '</option>');
        });
    }, 'json');
}
function setAccordion(element) { // element = this
    var tagA = $(element).parents('div.panel-collapse');
    var tagId = $(tagA).attr('id');
    setCookie('accordion', tagId, 365);
}



