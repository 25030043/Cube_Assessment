<?php

namespace App\Http\Controllers;

use App\Models\ProductsInCategories;
use Illuminate\Http\Request;

class ProductsInCategoriesController extends Controller
{
    /**
     * Display the specified product in category.
     *
     * @param  \App\Models\ProductsInCategories  $productsInCategories
     * @return \Illuminate\Http\Response
     */
    public function show(ProductsInCategories $productsInCategories)
    {
        return view('productsincategories.show', compact('productsInCategories'));
    }
}
