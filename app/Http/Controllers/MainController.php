<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DevProjectData;
use App\Models\ProductVariant;
use App\Models\ProductsInCategories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Retrieve all categories from the database
        $categories = Category::all();
        
        // Return a view with the categories data
        return view('categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        // Return the create category form view
        return view('categories.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required',
            'meta_files' => 'nullable',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
        ]);
        
        // Create a new category using the validated data
        $category = Category::create($validatedData);
        
        // Redirect to the category's show page
        return redirect()->route('categories.show', ['category' => $category]);
    }

    public function show(Category $category)
    {
        // Return a view with the specific category data
        return view('categories.show', ['category' => $category]);
    }

    public function edit(Category $category)
    {
        // Return the edit category form view
        return view('categories.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required',
            'meta_files' => 'nullable',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
        ]);
        
        // Update the category using the validated data
        $category->update($validatedData);
        
        // Redirect to the category's show page
        return redirect()->route('categories.show', ['category' => $category]);
    }

    public function destroy(Category $category)
    {
        // Delete the category
        $category->delete();
        
        // Redirect to the categories index page
        return redirect()->route('categories.index');
    }
}

class ProductController extends Controller
{
    public function index()
    {
        // Retrieve all products from the database
        $products = DevProjectData::all();
        
        // Return a view with the products data
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        // Return the create product form view
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
        
        // Create a new product using the validated data
        $product = DevProjectData::create($validatedData);
        
        // Redirect to the product's show page
        return redirect()->route('products.show', ['product' => $product]);
    }

    public function show(DevProjectData $product)
    {
        // Return a view with the specific product data
        return view('products.show', ['product' => $product]);
    }

    public function edit(DevProjectData $product)
    {
        // Return the edit product form view
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, DevProjectData $product)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
        
        // Update the product using the validated data
        $product->update($validatedData);
        
        // Redirect to the product's show page
        return redirect()->route('products.show', ['product' => $product]);
    }

    public function destroy(DevProjectData $product)
    {
        // Delete the product
        $product->delete();
        
        // Redirect to the products index page
        return redirect()->route('products.index');
    }
}

class VariantController extends Controller
{
    public function index()
    {
        // Retrieve all variants from the database
        $variants = ProductVariant::all();
        
        // Return a view with the variants data
        return view('variants.index', ['variants' => $variants]);
    }

    public function create()
    {
        // Return the create variant form view
        return view('variants.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'product_id' => 'required',
            'sap_product_code' => 'required',
            'web_product_code' => 'required',
            'name' => 'required',
        ]);
        
        // Create a new variant using the validated data
        $variant = ProductVariant::create($validatedData);
        
        // Redirect to the variants index page
        return redirect()->route('variants.index');
    }

    public function edit(ProductVariant $variant)
    {
        // Return the edit variant form view
        return view('variants.edit', ['variant' => $variant]);
    }

    public function update(Request $request, ProductVariant $variant)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'product_id' => 'required',
            'sap_product_code' => 'required',
            'web_product_code' => 'required',
            'name' => 'required',
        ]);
        
        // Update the variant using the validated data
        $variant->update($validatedData);
        
        // Redirect to the variants index page
        return redirect()->route('variants.index');
    }

    public function destroy(ProductVariant $variant)
    {
        // Delete the variant
        $variant->delete();
        
        // Redirect to the variants index page
        return redirect()->route('variants.index');
    }
}

class ProductInCategoryController extends Controller
{
    public function index(Category $category)
    {
        // Retrieve all products in the specified category from the database
        $products = ProductsInCategories::where('category_id', $category->id)->get();
        
        // Return a view with the products data
        return view('productsInCategory.index', ['category' => $category, 'products' => $products]);
    }

    public function create(Category $category)
    {
        // Return the create product in category form view
        return view('productsInCategory.create', ['category' => $category]);
    }

    public function store(Request $request, Category $category)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'product_id' => 'required',
        ]);
        
        // Create a new product in category using the validated data
        ProductsInCategories::create([
            'category_id' => $category->id,
            'product_id' => $validatedData['product_id'],
        ]);
        
        // Redirect to the products in category index page
        return redirect()->route('productsInCategory.index', ['category' => $category]);
    }

    public function show(Category $category, DevProjectData $product)
    {
        // Retrieve the product in the specified category from the database
        $productInCategory = ProductsInCategories::where('category_id', $category->id)
            ->where('product_id', $product->id)
            ->first();
        
        // Return a view with the specific product in category data
        return view('productsInCategory.show', ['category' => $category, 'product' => $productInCategory]);
    }

    public function edit(Category $category, DevProjectData $product)
    {
        // Retrieve the product in the specified category from the database
        $productInCategory = ProductsInCategories::where('category_id', $category->id)
            ->where('product_id', $product->id)
            ->first();
        
        // Return the edit product in category form view
        return view('productsInCategory.edit', ['category' => $category, 'product' => $productInCategory]);
    }

    public function update(Request $request, Category $category, DevProjectData $product)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'product_id' => 'required',
        ]);
        
        // Update the product in category using the validated data
        ProductsInCategories::where('category_id', $category->id)
            ->where('product_id', $product->id)
            ->update(['product_id' => $validatedData['product_id']]);
        
        // Redirect to the products in category index page
        return redirect()->route('productsInCategory.index', ['category' => $category]);
    }

    public function destroy(Category $category, DevProjectData $product)
    {
        // Delete the product in category
        ProductsInCategories::where('category_id', $category->id)
            ->where('product_id', $product->id)
            ->delete();
        
        // Redirect to the products in category index page
        return redirect()->route('productsInCategory.index', ['category' => $category]);
    }
}
