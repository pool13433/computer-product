<?php
if (empty($_SESSION)) {
    ob_start();
    session_start();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ระบบซ่อมคอมพิวเตอร์ออนไลน์</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require '../resources/requiresCssJs.php';?>
    </head>
    <body>
        <?php
        include '../config/webapp.php';
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
