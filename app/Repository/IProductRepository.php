<?php
namespace App\Repository;

interface IProductRepository 
{
    public function getAllProducts();

    public function getProductById($id);
}
?>