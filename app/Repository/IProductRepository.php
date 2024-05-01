<?php

namespace App\Repository;

interface IProductRepository
{
    public function getAllProducts();
    public function createProduct(array $data);
    public function getProduct(array $data);
    public function updateProduct(array $data);
    public function deleteProduct(int $id);
    // get price for each type user
    public function getPrice(array $data);
}
