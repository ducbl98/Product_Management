<?php


namespace App\Models;


class Product
{
    public int $id;
    public string $name;
    public int $type;
    public float $price;
    public int $number;
    public string $dateCreate;
    public string $description;


    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->type = $data['type'];
        $this->price = $data['price'];
        $this->number = $data['number'];
        $this->dateCreate = $data['dateCreate'];
        $this->description = $data['description'];
    }


    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setType($type): void
    {
        $this->type = $type;

    }
    public function setDateCreate( $dateCreate): void
    {
        $this->dateCreate = $dateCreate;
    }


}