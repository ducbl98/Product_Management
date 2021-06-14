<?php


namespace App\Services;


use App\Models\Product;
use App\Models\ProductModel;

class ProductService
{
    protected ProductModel $productModel;


    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function convertData(): array
    {
        $data = $this->productModel->getAllData();
        $products = [];
        foreach ($data as $item) {
            $product = new Product($item);
            $product->setId($item['id']);
            array_push($products, $product);
        }
        return $products;
    }

    public function validateForm(): array
    {
        $errors = [];
        $fields = ['name', 'type', 'price', 'number', 'dateCreate'];

        foreach ($fields as $field) {
            if (empty($_POST[$field])) {
                $errors[$field] = 'Can\'t be empty';
            }
        }
        return $errors;
    }
    public function addData($data)
    {
        $product = new Product($data);
        $product->setDateCreate(date("Y-m-d H:i:s"));
        $this->productModel->insertData($product);
    }

    public function deleteData($id)
    {
        $this->productModel->deleteData($id);
    }
    public function searchData($keyword): array
    {
        $data = $this->productModel->findData($keyword);
        $products = [];

        foreach ($data as $item) {
            $product = new Product($item);
            $product->setId($item['id']);
            array_push($products, $product);

        }
        return $products;
    }
    public function getDataById($id): Product
    {
        $data = $this->productModel->getDataById($id);
        $product = new Product($data[0]);
        $product->setId($data[0]['id']);
        $typeName = $this->productModel->getTypeName($product->type);
        $product->setType($typeName[0]['id']);
        return $product;
    }

    public function updateData($id, $data)
    {
        $product = new Product($data);
        $this->productModel->updateData($id, $product);
    }

    public function getAllType(): array
    {
        return $this->productModel->getAllTypeName();
    }

}