<?php

namespace App\Http\Controllers\Product;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Category;

class ProductCategoryController extends ApiController
{
    public function __construct()
    {
        $this->middleware('client.credentials:')->only(['index']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $categories = $product->categories;

        return $this->showAll($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, Category $category)
    {
        //attach, sync, syncWithoutDetaching
        $product->categories()->syncWithoutDetaching([$category->id]);
        
        return $this->showAll($product->categories);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product,  Category $category)
    {
        if (!$product->categories()->find($category->id)) {
            return $this->errorResponse('The specified category is not category of product', 404);
        }
        
        $product->categories()->detach($category->id);
        
        return $this->showAll($product->categories);
    }
}
