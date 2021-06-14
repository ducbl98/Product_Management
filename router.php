<?php

use App\Controllers\ProductController;

$controller = new ProductController();
$page = $_REQUEST['page'] ?? null;
switch ($page) {
    case 'add':
        $controller->addProduct();
        break;
    case 'delete':
        $controller->deleteProduct();
        break;
    case 'edit':
        $controller->editProduct();
        break;
    case 'search':
        $controller->searchProduct();
        break;
    default:
        $controller->listProduct();
        break;
}