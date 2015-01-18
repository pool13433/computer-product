<!DOCTYPE html>
<html>
    <head>
        <title>ระบบซ่อมคอมพิวเตอร์ออนไลน์</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
        <link rel="stylesheet" href="../../lib/bootstrap-table-master/docs/assets/bootstrap/css/bootstrap.min.css"/>

        <!-- jquery -->
        <script type="text/javascript" src="../../js/jquery.js"></script>
        <!-- jquery -->

        <!-- datepicker-->
        <link rel="stylesheet" href="../../lib/bootstrap-datepicker/css/datepicker.css"/>
        <script type="text/javascript" src="../../lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <!-- datepicker-->

        <!-- notify -->
        <link rel="stylesheet" href="../../lib/bootstrap-notify-master/css/bootstrap-notify.css"/>
        <script type="text/javascript" src="../../lib/bootstrap-notify-master/js/bootstrap-notify.js"></script>
        <!-- notify -->

        <!-- validationEngine-->
        <link rel="stylesheet" href="../../lib/validationengine/css/validationEngine.jquery.css"/>
        <script type="text/javascript" src="../../lib/validationengine/js/jquery.validationEngine.js"></script>
        <script type="text/javascript" src="../../lib/validationengine/js/languages/jquery.validationEngine-en.js"></script>
        <!-- validationEngine-->

        <!-- dataatble -->
        <link rel="stylesheet" type="text/css" href="../../lib/bootstrap-table-master/docs/dist/bootstrap-table.min.css"/>
        <script type="text/javascript" src="../../lib/bootstrap-table-master/docs/dist/bootstrap-table.min.js"></script>
        <script type="text/javascript" src="../../lib/bootstrap-table-master/docs/dist/extensions/export/bootstrap-table-export.min.js"></script>
        <!-- dataatble -->

        <!-- pnotify -->
        <link rel="stylesheet" type="text/css" href="../../css/pnotify.custom.min.css">      
        <script language="JavaScript" src="../../js/pnotify.custom.min.js"></script>
        <!-- pnotify -->

        <!-- tempate-->        
        <link rel="stylesheet" href="../../css/offcanvas.css"/>
        <script type="text/javascript" src="../../js/offcanvas.js"></script>
        <!-- tempate-->
        <script type="text/javascript" src="../../js/script.js"></script>
    </head>
    <body>
        <?php include './menu-top.php'; ?>
        <div class="container">            
            <div class="row row-offcanvas row-offcanvas-right">
                <div class="col-xs-6 col-sm-3 sidebar-offcanvas sidebar-offcanvas" id="sidebar">
                    <?php include './menu-left.php';?>
                </div>                
                <div class="col-xs-12 col-sm-9"> 
                    <?php
                    include '../config/webapp.php';
                    // ตรวจสอบ ค่า ว่ามีการส่งค่ามาหรือเปล่า
                    if (!empty($_GET)) {  // มีค่า
                        $page = $_GET['page'] . '.php';
                        if (file_exists($page)) {
                            include $page;
                        } else {
                            echo msgBox('danger', 'ไม่พบหน้าที่เรียก 404 File not Found');
                        }
                    } else {
                        include MAINPAGE;
                    }
                    ?>
                </div>                
            </div>            
        </div>
    </body>
</html>
