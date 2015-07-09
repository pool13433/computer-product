<!DOCTYPE html>
<html>
    <head>
        <title>ระบบซ่อมคอมพิวเตอร์ออนไลน์</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" href="../lib/bootstrap-table-master/docs/assets/bootstrap/css/bootstrap.min.css"/>

        <!-- jquery -->
        <script type="text/javascript" src="../js/jquery.js"></script>
        <!-- jquery -->
        
         <!-- Moment Calendar-->
        <script type="text/javascript" src="../js/moment.min.js"></script>

        <!-- bootstrap-->
        <script type="text/javascript" src="../lib/bootstrap-table-master/docs/assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- bootstrap-->

        <!-- datepicker-->
        <link rel="stylesheet" href="../lib/bootstrap-datepicker/css/datepicker.css"/>
        <script type="text/javascript" src="../lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <!-- datepicker-->



        <!-- validationEngine-->
        <link rel="stylesheet" href="../lib/validationengine/css/validationEngine.jquery.css"/>
        <script type="text/javascript" src="../lib/validationengine/js/jquery.validationEngine.js"></script>
        <script type="text/javascript" src="../lib/validationengine/js/languages/jquery.validationEngine-en.js"></script>
        <!-- validationEngine-->

        <!-- DataTable Plugin-->
        <link rel="stylesheet" type="text/css" href="../lib/datatables/dataTables.css"/>
        <script type="text/javascript" src="../lib/datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../lib/datatables/dataTables.bootstrap.js"></script>

        <!-- pnotify -->
        <!--<link rel="stylesheet" type="text/css" href="../css/pnotify.custom.min.css">      
        <script language="JavaScript" src="../js/pnotify.custom.min.js"></script>-->
        <link rel="stylesheet" href="../lib/jAlert-master/jAlert-v2-min.css"/>
        <script type="text/javascript" src="../lib/jAlert-master/jAlert-v2-min.js"></script>
        <!-- pnotify -->

        <!-- datepicker-->
        <link rel="stylesheet" type="text/css" href="../lib/bootstrap-datepicker/css/datepicker.css"/>
        <script type="text/javascript" src="../lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <!-- datepicker-->

        <!-- -->
        <script type="text/javascript" src="../js/script.js"></script>
    </head>
    <body>
        <?php
        session_start();
        unset($_SESSION['person']);
        include './config/webapp.php';
        // ตรวจสอบ ค่า ว่ามีการส่งค่ามาหรือเปล่า
        if (!empty($_GET)) {  // มีค่า
            $page = $_GET['page'] . '.php';
            if (file_exists($page)) {
                include $page;
            } else {
                echo msgBox('danger', 'ไม่พบหน้าที่เรียก 404 File not Found');
            }
        } else {
            if (empty($_SESSION['person'])) {
                include MAINPAGE;
            } else {
                header("location: http://localhost/computer/src/backend/");
                exit(0);
            }
        }
        ?>
    </body>
</html>
