<?php

namespace App\Repository;

use App\Models\Product;

class ProductRepository implements IProductRepository
{
    public function getAllProducts()
    {
        return Product::all();
    }

    public function createProduct(array $data)
    {
        // Create a new product with the provided data
        $product = Product::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'price_normal' => $data['price_normal'],
            'price_gold' => $data['price_gold'],
            'price_silver' => $data['price_silver'],
            'is_active' => true,
        ]);

        // Return the created product
        return $product;
    }
    public function getProduct(array $data)
    {
        // get product 
        $product = Product::where('id', $data['id'])->first();
        return $product;
    }
    public function updateProduct(array $data)
    {
        $product = Product::where('id', $data['id'])->first();

        // Update the product attributes
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->price_normal = $data['price_normal'];
        $product->price_gold = $data['price_gold'];
        $product->price_silver = $data['price_silver'];

        // Save the changes to the product
        $product->save();

        // Return the updated product
        return $product;
    }
    public function deleteProduct(int $id)
    {
        // delete product
        $product = Product::where('id', $id)->first();
        $product->delete();
        return $product;
    }
    public function getPrice(array $data)
    {
        $product = Product::where('id', $data['id'])->first();

        // Determine the price based on the type
        if ($data['type'] == "normal") {
            $price = $product->price_normal;
        }
        if ($data['type'] == "gold") {
            $price = $product->price_gold;
        }
        if ($data['type'] == "silver") {
            $price = $product->price_silver;
        }

        // Return the calculated price
        return $price;
    }
}
