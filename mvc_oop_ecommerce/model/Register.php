<?php
require_once "model/Connect.php";
require_once "model/UserObject.php";

class Register{
    public function doRegister($params){
        $userObject = new UserObject($params);

        $firstName = $userObject->getFirstName();
        $lastName = $userObject->getLastName();
        $email = $userObject->getEmail();
        $address = $userObject->getAddress();
        $password = password_hash($userObject->getPassword(), PASSWORD_DEFAULT);
        $phone = $userObject->getPhoneNumber();
        $isAdmin = 0;

        $conn = new Connect();

        $result = $conn->select("Select * from user where Email = '$email'");

        if (mysqli_fetch_array($result)) {
            echo "Email đã tồn tại";
        } else {    
            $sql = "Insert into user (FirstName, LastName, Email, PhoneNumber, Password, Address, is_admin)
            values ('$firstName', '$lastName', '$email', '$phone', '$password', '$address', '$isAdmin')
            ";
            $conn->execute($sql);
            
            $result = $conn->select("Select * from user where Email = '$email'");
            $account = mysqli_fetch_array($result);
            $_SESSION['userId'] = $account['UserId'];
            $_SESSION['username'] = $userObject->getFullName();
            $_SESSION['admin'] = $isAdmin;
            
            echo 1;
        }
    }
}