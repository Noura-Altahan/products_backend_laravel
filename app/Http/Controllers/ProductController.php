<?php

namespace App\Http\Controllers;

use App\Repository\ProductRepository;
use App\Repository\IProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use \App\ReturnResult;

class ProductController extends Controller
{
    public $product;
    public function __construct(IProductRepository $product)
    {
        $this->product = $product;
    }
    // Create a new product
    public function createProduct(Request $request)
    {
        $result = new ReturnResult();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'price_normal' => 'required',
            'price_gold' => 'required',
            'price_silver' => 'required',
        ]);
        if ($validator->fails()) {
            $result->setError403('Please Check all Required Fields');
            return response()->json($result, 403);
        }

        $data = $request->all();
        $result = new ReturnResult();
        $result->data = $this->product->createProduct($data);
        return response()->json($result);
    }
    // Get all products
    public function getProductsList(Request $request)
    {
        $result = new ReturnResult();
        $result->data = $this->product->getAllProducts();
        return response()->json($result);
    }
    // Get a specific product
    public function getProduct(Request $request)
    {
        $result = new ReturnResult();
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);
        if ($validator->fails()) {
            $result->setError403('Please Check all Required Fields');
            return response()->json($result, 403);
        }
        $data = $request->all();
        $result->data = $this->product->getProduct($data);
        return response()->json($result);
    }
    // Update a product
    public function updateProduct(Request $request)
    {
        $result = new ReturnResult();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'price_normal' => 'required',
            'price_gold' => 'required',
            'price_silver' => 'required',
            'id' => 'required',
        ]);
        if ($validator->fails()) {
            $result->setError403('Please Check all Required Fields');
            return response()->json($result, 403);
        }

        $data = $request->all();
        $result = new ReturnResult();
        $result->data = $this->product->updateProduct($data);
        return response()->json($result);
    }
    //Get the price for each type of user
    public function getPrice(Request $request)
    {
        $result = new ReturnResult();
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'id' => 'required',
        ]);
        if ($validator->fails()) {
            $result->setError403('Please Check all Required Fields');
            return response()->json($result, 403);
        }
        $data = $request->all();
        $result->data = $this->product->getPrice($data);
        return response()->json($result);
    }
}
