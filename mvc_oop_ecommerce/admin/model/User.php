<?php
require_once "model/Connect.php";
require_once "model/UserObject.php";

class User
{
    public function getAllUser()
    {
        $result = (new Connect())->select("SELECT * from user");
        $arr = [];

        foreach ($result as $row) {
            $userObject = (new UserObject($row));
            $arr[] = $userObject;
        }
        return $arr;
    }

    public function create($params)
    {
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
            echo 1;
        }
    }

    public function find($id)
    {
        $id = $_GET['id'];
        $result = (new Connect())->select("Select * from user where UserId = '$id'");
        $row = mysqli_fetch_array($result);
        return (new UserObject($row));
    }

    public function update($params)
    {
        $userObject = new UserObject($params);

        $userId = $userObject->getUserId();
        $firstName = $userObject->getFirstName();
        $lastName = $userObject->getLastName();
        $address = $userObject->getAddress();
        $phone = $userObject->getPhoneNumber();


        $sql = "Update user set 
        FirstName = '$firstName', 
        LastName = '$lastName', 
        Address = '$address', 
        PhoneNumber = '$phone' 
        where UserId = '$userId'
        ";

        (new Connect())->execute($sql);
        echo 1;
    }

    public function delete($id)
    {
        (new Connect())->execute("Delete from product where ProductId = '$id'");
    }
}
