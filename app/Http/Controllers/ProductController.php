<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        // pakai view viewproduk.blade.php
        return view('viewproduk', [
            'product' => $product,
        ]);
    }
}
