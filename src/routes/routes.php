<?php
include_once('../static/query.php');
include_once('../controller/database.php');
include_once('../controller/userController.php');

if (isset($_POST['type'])) {
    switch ($_POST['type']) {
        case 'login':
            $ctr = new userController();
            $result = $ctr->login($_POST['user'], $_POST['pass']);
            echo $result;
            break;
        case 'register':
            $ctr = new userController();
            echo $ctr->register();
            break;
        
        default:
            # code...
            break;
    }
}
?>
