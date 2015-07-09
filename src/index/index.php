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
        session_start();
        unset($_SESSION['person']);
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
            if (empty($_SESSION['person'])) {
                include MAINPAGE;
            } else {
                header("location: http://localhost/computer/backend/");
                exit(0);
            }
        }
        ?>
    </body>
</html>
