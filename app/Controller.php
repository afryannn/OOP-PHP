<?php

class Controller
{
    public $koneksi = "";
    public function __construct()
    {
        require_once 'Database.php';
        $this->koneksi = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if ($this->koneksi) {
            // echo "MYSQL CONNECTED";
        } else {
            Header('Location:../login.php?NetworkErr');
        }
    }
    public function post_update($nama, $alamat, $salary,$id){
        $sql = "UPDATE employees SET name=?, address=?, salary=? WHERE id=?";
        if($stmt = mysqli_prepare($this->koneksi, $sql)){
            mysqli_stmt_bind_param($stmt, "sssi", $param_name, $param_address, $param_salary, $param_id);
            $param_name = $nama;
            $param_address = $alamat;
            $param_salary = $salary;
            $param_id = $id;
            if(mysqli_stmt_execute($stmt)){
                header("location: ../admin/index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
    }
    public function add_new_data($nama, $alamat, $salary)
    {
        $sql = "INSERT INTO employees (name, address, salary) VALUES (?, ?, ?)";
        if ($stmt = mysqli_prepare($this->koneksi, $sql)) {
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_address, $param_salary);
            $param_name = $nama;
            $param_address = $alamat;
            $param_salary = $salary;
            if (mysqli_stmt_execute($stmt)) {
                header("location:../admin/index.php");
                exit();
            } else {
                echo "Terjadi kesalahan. Mohon coba lagi.";
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($this->koneksi);
    }
    public function register($username, $password)
    {
        $sql = "SELECT id FROM users WHERE username = ?";
        if ($stmt = mysqli_prepare($this->koneksi, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    Header('Location:../register.php?err-uat');
                } else {
                    $insert = "INSERT INTO users (username, password ,role) VALUES (?, ?,'user')";
                    if ($stmt = mysqli_prepare($this->koneksi, $insert)) {
                        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
                        $param_username = $username;
                        $param_password = $password;
                        if (mysqli_stmt_execute($stmt)) {
                            header("location: ../login.php");
                        } else {
                            echo "Something went wrong. Please try again later.";
                        }
                        mysqli_stmt_close($stmt);
                    }
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    public function reset_password($id, $password)
    {
        $sql = "UPDATE users set password='$password' WHERE id='$id'";
        $query = mysqli_query($this->koneksi, $sql);
        if (!$query) {
            die("Fail  " . mysqli_error($this->koneksi));
        } else {
            Header('Location:../welcome.php');
        }
    }
    public function logout()
    {
        session_start();
        $_SESSION = array();
        session_destroy();
        header("location:../login.php");
        exit;
    }
    public function bind_item_id($id, $opt)
    {
        session_start();
        $_SESSION['bind_item_id'] = $id;
        switch ($opt) {
            case 1:
                header("location: ../admin/read.php");
                break;
            case 2:
                header("location: ../admin/update.php");
                break;
        }
    }
    public function update()
    {
        session_start();
        $id = $_SESSION['bind_item_id'];
        $sql = "SELECT * FROM employees WHERE id = $id";
        $data = mysqli_query($this->koneksi, $sql);
        if (mysqli_prepare($this->koneksi, $sql)) {
            if (mysqli_num_rows($data) == 0) {
                exit();
            } else {
                $row = mysqli_fetch_array($data, MYSQLI_ASSOC);
                $result['id'] = $id;
                $result['name'] = $row["name"];
                $result['address'] = $row["address"];
                $result['salary'] = $row["salary"];
                return $result;
            }
        } else {
            echo "Oops! Terjadi kesalahan. Silakan coba lagi.";
        }
    }
    public function delete_item($id)
    {
        $sql = "DELETE FROM employees WHERE id = $id";
        if ($stmt = mysqli_prepare($this->koneksi, $sql)) {
            if (mysqli_stmt_execute($stmt)) {
                $query = mysqli_query($this->koneksi, $sql);
                header("location: ../admin/index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    }
    public function read_data()
    {
        session_start();
        $id = $_SESSION['bind_item_id'];
        $sql = "SELECT * FROM employees WHERE id = $id";
        $data = mysqli_query($this->koneksi, $sql);
        if (mysqli_prepare($this->koneksi, $sql)) {
            if (mysqli_num_rows($data) == 0) {
                exit();
            } else {
                $row = mysqli_fetch_array($data, MYSQLI_ASSOC);
                $result['item_id'] = $row["id"];
                $result['name'] = $row["name"];
                $result['address'] = $row["address"];
                $result['salary'] = $row["salary"];
                return $result;
            }
        } else {
            echo "Oops! Terjadi kesalahan. Silakan coba lagi.";
        }
    }
    public function tampildata()
    {
        $data = mysqli_query($this->koneksi, "SELECT * from employees");
        if (mysqli_num_rows($data) == 0) {
            $result = "null";
            return $result;
        } else {
            while ($row = mysqli_fetch_array($data)) {
                $result[] = $row;
            }
            return $result;
        }
    }
    public function login($username, $password)
    {
        $sql = "SELECT * FROM users where username='$username'";
        $login = mysqli_query($this->koneksi, $sql);
        $data = mysqli_fetch_assoc($login);
        if ($username != $data['username']) {
            Header('Location:../login.php?Autherr1');
        } else {
            if ($password !== $data['password']) {
                Header('Location:../login.php?Autherr2');
            } else {
                if ($data['role'] == "user") {
                    session_start();
                    $_SESSION["id"] = $data['id'];
                    $_SESSION["loggedin"] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['role'] = "user";
                    header("location:../welcome.php");
                } else if ($data['role'] == "admin") {
                    session_start();
                    $_SESSION["id"] = $data['id'];
                    $_SESSION["loggedin"] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['role'] = "admin";
                    header("location:../admin/index.php");
                } else {
                    Header('Location:../login.php?err_not_found');
                    die;
                }
            }
        }
    }
}
$controller = new Controller();
