<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Laraact\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laraact\Product;

/**
 * Class ProductsController
 * @package Laraact\Http\Controllers
 * @code php artisan make:controller ProductsController
 */
class ProductsController extends Controller
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * @param Product $product
     * @return Product
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:products|max:255',
            'description' => 'required',
            'price' => 'integer',
            'availability' => 'boolean',
        ]);

        /** @var Model|Product $product */
        $product = Product::create($request->all());

        return response()->json($product, Response::HTTP_CREATED);
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return response()->json($product, 200);
    }

    /**
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Product $product)
    {
        $product->delete();

        return response()->json(null, 204);
    }
}
