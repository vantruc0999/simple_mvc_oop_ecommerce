<?php
require_once "model/Connect.php";
require_once "model/UserObject.php";

class Login
{
    public function doLogin($params)
    {
        $userObject = (new UserObject($params));
        $email = $userObject->getEmail();
        $password = $userObject->getPassword();

        $result = (new Connect())->select("Select * from user where Email = '$email'");
        $account = mysqli_fetch_array($result);

        if ($account) {
            if (password_verify($password, $account['Password'])) {
                $_SESSION['userId'] = $account['UserId'];
                $_SESSION['username'] = $account['FirstName'] . ' ' . $account['LastName'];
                $_SESSION['admin'] = $account['is_admin'];
                echo 1;
            } else {
                echo 'Sai mật khẩu hoặc tài khoản';
            }
        }
        else
            echo 'Sai mật khẩu hoặc tài khoản';
    }
}
