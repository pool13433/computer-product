<!DOCTYPE html>
<html>
    <head>
        <title>ระบบซ่อมคอมพิวเตอร์ออนไลน์</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../css/style.css">


        <link rel="stylesheet" type="text/css" href="../../lib/bootstrap-3.3.5/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="../../lib/bootstrap-3.3.5/css/bootstrap-theme.min.css"/>

        <!-- jquery -->
        <script type="text/javascript" src="../../js/jquery.js"></script>
        <!-- jquery -->

        <!-- bootstrap-->
        <script type="text/javascript" src="../../lib/bootstrap-3.3.5/js/bootstrap.min.js"></script>
        <!-- bootstrap-->

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

        <!-- DataTable Plugin-->
        <link rel="stylesheet" type="text/css" href="../../lib/datatables/dataTables.css"/>
        <script type="text/javascript" src="../../lib/datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../../lib/datatables/dataTables.bootstrap.js"></script>

        <!-- pnotify -->
        <!--<link rel="stylesheet" type="text/css" href="../../css/pnotify.custom.min.css">      
        <script language="JavaScript" src="../../js/pnotify.custom.min.js"></script>-->
        <link rel="stylesheet" href="../../lib/jAlert-master/jAlert-v2-min.css"/>
        <script type="text/javascript" src="../../lib/jAlert-master/jAlert-v2-min.js"></script>
        <!-- pnotify -->

        <!-- datepicker-->
        <link rel="stylesheet" type="text/css" href="../../lib/bootstrap-datepicker/css/datepicker.css"/>
        <script type="text/javascript" src="../../lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <!-- datepicker-->

        <!-- select 2-->
        <link rel="stylesheet" href="../../lib/select2-3.5.0/select2-bootstrap.css"/>
        <link rel="stylesheet" href="../../lib/select2-3.5.0/select2.css"/>
        <script src="../../lib/select2-3.5.0/select2.min.js" type="text/javascript"></script>
        <!-- select 2-->

        <!-- tempate-->        
        <link rel="stylesheet" href="../../css/offcanvas.css"/>
        <script type="text/javascript" src="../../js/offcanvas.js"></script>
        <!-- tempate-->
        <script type="text/javascript" src="../../js/script.js"></script>
    </head>
    <body>
        <?php
        include '../config/webapp.php';
        if (!isset($_SESSION)) {
            @ob_start();
            @session_start();
        }
        ?>
        <?php include './menu-top.php'; ?>
        <div class="container-fluid">            
            <div class="row row-offcanvas row-offcanvas-right">
                <div class="col-xs-6 col-sm-3 sidebar-offcanvas sidebar-offcanvas" id="sidebar">
                    <?php include './menu-left.php'; ?>
                </div>                
                <div class="col-xs-12 col-sm-9"> 
                    <?php
                    // ตรวจสอบ login 
                    if (empty($_SESSION)):  // login fail
                        header('Location: http://localhost/computer/src/');
                        exit();
                    else: // login OK                       
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
                    endif;
                    ?>
                </div>                
            </div>            
        </div>
    </body>
</html>
