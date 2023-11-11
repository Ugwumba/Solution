<?php
class Admin {
    private $conn;
    private $table = 'admin';

    public $id, $username, $role;

    function __construct($db) {
        $this->conn = $db;
    }

    function treat($data) {
        $data = htmlspecialchars($data);
        return $data;
    }

    function treat_file($data) {
        $data = str_replace("/", "_", $data);
        return $data;
    }

    public function login() {
        if (isset($_POST["action"]) && $_POST["action"] == 2) {
            $error = $output = array();

            if (count(array_filter($_POST)) != count($_POST)) {
                $error['err'] = 'All fields are required';
            }

            if (empty($error)) {
                $username = $this->treat($_POST['username']);
                $password = $this->treat($_POST['password']);
                $password = md5(sha1($password));
                $sql = "SELECT * FROM $this->table WHERE `username` = ? AND `password` = ?";
                $query = $this->conn->prepare($sql);
                $query->execute([$username, $password]);

                if ($query->rowCount() > 0) {
                    $row = $query->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['role'] = $row['role'];
                    $this->role = $row['role'];
                    $output['message'] = 'Login Successful';
                } else {
                    $output['error'] = true;
                    $output['message'] = 'Oops, the entered data is incorrect.';
                }
            } else {
                $output['error'] = true;
                $output['message'] = $error['err'];
            }
        }
        return json_encode($output);
    }

    public function getRole() {
        return $this->role;
    }

    public function changepassword($id, $oldpassword, $newpassword, $cnewpassword) {
        $error = $output = array();

        // Validate old password
        if (!empty($oldpassword)) {
            $sql = "SELECT password FROM $this->table WHERE `id`=?";
            $query = $this->conn->prepare($sql);
            $query->execute([$id]);

            $row = $query->fetch(PDO::FETCH_ASSOC);

            if ($row && $row['password'] !== md5(sha1($oldpassword))) {
                $error['err'] = "Old password is Incorrect";
            } elseif ($row && $row['password'] == md5(sha1($oldpassword))){
                echo "Password Changed Sucessfully";
            }
        } else {
            $error['err'] = "Old password is Required";
        }

        // Validate new and confirm passwords
        if ($newpassword !== $cnewpassword) {
            $error['err'] = "New Password Mismatched";
        }

        if (empty($cnewpassword) || empty($newpassword)) {
            $error['err'] = "New Password and Confirm new Password are required";
        }

        if (empty($error)) {
            // Hash the new password
            $newpassword = md5(sha1($newpassword));

            // Update the password in the database
            $sql = "UPDATE $this->table SET `password` = ? WHERE id = ?";
            $query = $this->conn->prepare($sql);

            if ($query->execute([$newpassword, $id])) {
                $output['message'] = 'Password Changed successfully';
            } else {
                $output['error'] = true;
                $output['message'] = $this->conn->error;
            }
        } else {
            $output['error'] = true;
            $output['message'] = $error['err'];
        }

        return $output;
    }
   
}