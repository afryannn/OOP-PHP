<?php
include 'Controller.php';
$controller = new Controller();
$action = $_GET['action'];
switch ($action) {
    case "login":
        $username = $_GET['username'];
        $password = $_GET['password'];
        $controller->login($username, $password);
        break;
    case "register":
        $username = $_GET['username'];
        $password = $_GET['password'];
        $controller->register($username, $password);
        break;
    case "postupdate":
        $id = $_GET['id'];
        $nama = $_GET['nama'];
        $alamat = $_GET['alamat'];
        $salary = $_GET['salary'];
        $controller->post_update($nama, $alamat, $salary,$id);
        break;
    case "update":
        $id = $_GET['id'];
        $opt = 2;
        $controller->bind_item_id($id, $opt);
        break;
    case "readdatauser":
        $id = $_GET['id'];
        $opt = 1;
        $controller->bind_item_id($id, $opt);
        break;
    case "deleteitem":
        $id = $_GET['id'];
        $controller->delete_item($id);
        break;
    case "logout":
        $controller->logout();
        break;
    case "tambahdata":
        $nama = $_GET['nama'];
        $alamat = $_GET['alamat'];
        $salary = $_GET['salary'];
        $controller->add_new_data($nama, $alamat, $salary);
        break;
    case "resetpassword":
        $id = $_GET['id'];
        $password = $_GET['password'];
        $controller->reset_password($id, $password);
        break;
    default:
        Header("Location:./error/error.php");
}
