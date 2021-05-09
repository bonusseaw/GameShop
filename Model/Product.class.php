<?php

class Product{
    private $id;
    private $name;
    private $code;
    private $image;
    private $price;
    
    private const TABLE = "product";

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
   
    public function getName():string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
   
    public function getCode():string
    {
        return $this->code;
    }
    public function setCode(string $code)
    {
        $this->code = $code;
    }
    public function getImage():string
    {
        return $this->image;
    }
    public function setImage(string $image)
    {
        $this->image = $image;
    }
    public function getPrice():double
    {
        return $this->price;
    }
    public function setPrice(double $price)
    {
        $this->price = $price;
    }

    public static function findAll(): array {
        $con = Db::getInstance();
        $query = "SELECT * FROM ".self::TABLE;
        $stmt = $con->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $productList  = array();
        while ($pro = $stmt->fetch())
        {
            $productList[] = $pro;
        }
        return $productList;
    }
   
}