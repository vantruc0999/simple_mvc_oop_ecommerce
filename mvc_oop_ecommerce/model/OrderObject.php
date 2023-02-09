<?php

class OrderObject 
{
    private $orderId;
    private $address;
    private $email;
    private $nameReceiver;
    private $customerId;
    private $phoneReceiver;
    private $status;
    private $totalPrice;
    private $price;
    private $createdAt;
    private $firstName;
    private $lastName;
    private $productName;
    private $image;
    private $quantity;

    public function __construct($row)
    {
        $this->orderId = $row['OrderId'] ?? '';
        $this->address = $row['Address'] ?? '';
        $this->email = $row['Email'] ?? '';
        $this->nameReceiver = $row['NameReceiver'] ?? '';
        $this->customerId = $row['CustomerId'] ?? '';
        $this->phoneReceiver = $row['PhoneReceiver'] ?? '';
        $this->status = $row['Status'] ?? '';
        $this->price = $row['Price'] ?? '';
        $this->totalPrice = $row['TotalPrice'] ?? '';
        $this->createdAt = $row['CreatedAt'] ?? '';
        $this->firstName = $row['FirstName'] ?? '';
        $this->lastName = $row['LastName'] ?? '';
        $this->productName = $row['ProductName'] ?? '';
        $this->image = $row['Image'] ?? '';
        $this->quantity = $row['Quantity'] ?? '';
    }

    /**
     * Get the value of address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of nameReceiver
     */
    public function getNameReceiver()
    {
        return $this->nameReceiver;
    }

    /**
     * Set the value of nameReceiver
     *
     * @return  self
     */
    public function setNameReceiver($nameReceiver)
    {
        $this->nameReceiver = $nameReceiver;

        return $this;
    }

    /**
     * Get the value of customerId
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Set the value of customerId
     *
     * @return  self
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * Get the value of phoneReceiver
     */
    public function getPhoneReceiver()
    {
        return $this->phoneReceiver;
    }

    /**
     * Set the value of phoneReceiver
     *
     * @return  self
     */
    public function setPhoneReceiver($phoneReceiver)
    {
        $this->phoneReceiver = $phoneReceiver;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of totalPrice
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * Set the value of totalPrice
     *
     * @return  self
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    /**
     * Get the value of createdAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @return  self
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get the value of productName
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * Set the value of productName
     *
     * @return  self
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;

        return $this;
    }

    public function getFullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of orderId
     */ 
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Set the value of orderId
     *
     * @return  self
     */ 
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of quantity
     */ 
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }
}
