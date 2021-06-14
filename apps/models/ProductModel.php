<?php


namespace App\Models;


class ProductModel extends Models
{
    public function getAllData(): array
    {
        $sql = 'SELECT * FROM `Products`';
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function insertData(Product $product): bool
    {
        $sql = 'INSERT INTO `Products`(name,type,price,number,dateCreate,description) 
                VALUES (:name,:type ,:price,:number,:dateCreate,:description);';
        $stmt=$this->connection->prepare($sql);
        $stmt->bindParam(":name",$product->name);
        $stmt->bindParam(":type",$product->type);
        $stmt->bindParam(":price",$product->price);
        $stmt->bindParam(":number",$product->number);
        $stmt->bindParam(":dateCreate",$product->dateCreate);
        $stmt->bindParam(":description",$product->description);
        return $stmt->execute();
    }

    public function deleteData($id): bool
    {
        $sql = 'DELETE FROM `Products` WHERE id = :id;
                SET @autoid=0;
                UPDATE `Products` SET id=@autoid:=(@autoid +1 );
                ALTER TABLE `Products` AUTO_INCREMENT =1;';
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
    public function getDataById($id): array
    {
        $sql = 'SELECT * FROM `Products` WHERE id =:id';
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function findData($keyword): array
    {
        $sql = 'SELECT * FROM `Products` WHERE `name` LIKE :keyword';
        $stmt = $this->connection->prepare($sql);
        $findKey = '%' . $keyword . '%';
        $stmt->bindParam(":keyword", $findKey);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function updateData($id, Product $product): bool
    {
        $sql = 'UPDATE `Products` 
                  SET `name`=:name,
                      `type`=:type,
                      `price`=:price,
                      `number`=:number,
                      `dateCreate`=:dateCreate,
                      `description`=:description
                  WHERE `id`=:id';
        $stmt=$this->connection->prepare($sql);
        $stmt->bindParam(":name",$product->name);
        $stmt->bindParam(":id",$id);
        $stmt->bindParam(":type",$product->type);
        $stmt->bindParam(":price",$product->price);
        $stmt->bindParam(":number",$product->number);
        $stmt->bindParam(":dateCreate",$product->dateCreate);
        $stmt->bindParam(":description",$product->description);
        return $stmt->execute();
    }

    public function getAllTypeName(): array
    {
        $sql = 'SELECT `id`,`name` FROM `Types`';
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getTypeName($id): array
    {
        $sql = 'SELECT `id`,`name` FROM `Types` WHERE `id` =:id';
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam("id", $id);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}