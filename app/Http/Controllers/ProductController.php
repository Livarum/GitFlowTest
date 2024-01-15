<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

use App\Notifications\productNotification;
use App\Http\Controllers\NotificationsCotroller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return response()
            ->json([
                'success' => true,
                'message' => 'Products retrieved successfully.',
                'data'    => $products,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string',
            'description' => 'required|string',
            'price'       => 'required|numeric',
            // Add other validation rules as needed
        ]);

        $product = Product::create([
            'name'        => $request->input('name'),
            'description' => $request->input('description'),
            'price'       => $request->input('price'),
            // Add other fields as needed
        ]);

        return response()
            ->json([
                'success' => true,
                'message' => 'Product created successfully.',
                'data'    => $product,
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()
            ->json([
                'success' => true,
                'message' => 'Product retrieved successfully.',
                'data'    => $product,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'string',
            'description' => 'string',
            'price'       => 'numeric',
            // Add other validation rules as needed
        ]);

        $product->update($request->all());

        return response()
            ->json([
                'success' => true,
                'message' => 'Product updated successfully.',
                'data'    => $product,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()
            ->json([
                'success' => true,
                'message' => 'Product deleted successfully.',
                'data'    => '',
            ]);
    }

    

    public function testNotification()
    {
        // For simplicity, you can hardcode data for the new product
        $data = [
            'name'        => 'Test Product',
            'description' => 'This is a test product.',
            'price'       => 19.99,
            // Add other fields as needed
        ];

        // Create the product
        $product = Product::create($data);

        // Notify
        $notificacion = new NotificationsCotroller;
        $notificacion->notifyProductCreated($product);
        
        return response()
            ->json([
                'success' => true,
                'message' => 'Test notification sent successfully.',
                'data'    => $product,
            ]);
    }
}
