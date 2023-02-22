<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Exception;

class ProductController extends Controller
{
    public static $products = [
        ["id"=>"1", "name"=>"TV", "description"=>"Best TV", "price"=>1000],
        ["id"=>"2", "name"=>"iPhone", "description"=>"Best iPhone", "price"=>2000],
        ["id"=>"3", "name"=>"Chromecast", "description"=>"Best Chromecast", "price"=>500],
        ["id"=>"4", "name"=>"Glasses", "description"=>"Best Glasses", "price"=>10]
    ];

    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] =  "List of products";
        $viewData["products"] = ProductController::$products;
        return view('product.index')->with("viewData", $viewData);
    }

    public function show(string $id) : View | RedirectResponse
    {
        try {
            $viewData = [];
            $product = ProductController::$products[$id-1];
            $viewData["title"] = $product["name"]." - Online Store";
            $viewData["subtitle"] =  $product["name"]." - Product information";
            $viewData["product"] = $product;
            return view('product.show')->with("viewData", $viewData);
        } catch (Exception $e){
            return redirect()->route('home.index');
        }
    }
}
