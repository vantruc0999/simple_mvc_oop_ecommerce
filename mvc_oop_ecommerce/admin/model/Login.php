<?php
require_once "model/Connect.php";
require_once "model/UserObject.php";

class Login
{
    public function loginProcess($params)
    {
        // echo 1;
        $userObject = new UserObject($params);
        $email = $userObject->getEmail();
        $password = $userObject->getPassword();

        $sql = "Select * from user where Email = '$email'";
        $result = (new Connect())->select($sql);
        $account = mysqli_fetch_array($result);

        if ($account) {
            if (password_verify($password, $account['Password'])) {
                $_SESSION['userId'] = $account['UserId'];
                $_SESSION['username'] = $account['FirstName'] . ' ' . $account['LastName'];
                if ($account['is_admin'] == 1) {
                    $_SESSION['admin'] = 1;
                }
                echo 1;
            } else {
                echo 'Sai tài khoản hoặc password.';
            }
        } else
            echo "Sai tài khoản hoặc password";
    }
}
