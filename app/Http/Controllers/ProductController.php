<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class ProductController extends Controller
{
    public function index()
    {
        if (Auth::user() && Auth::user()->role === 'admin') {
            $products = Product::all();
        } else {
            $products = Auth::user() ? Auth::user()->products : collect();
        }
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);
        Auth::user()->products()->create($validated);
        return redirect()->route('products.index')->with('success', 'Product created successfully');
        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    public function show(Product $product)
    {
        if (Auth::check() && (Auth::user()->role === 'admin' || $product->user_id === Auth::id())) {
            return view('products.show', compact('product'));
        }
        abort(403, 'Unauthorized');
    }

    public function edit(Product $product)
    {
        if (Auth::user()->role === 'admin' || $product->user_id === Auth::id()) {
            return view('products.edit', compact('product'));
        }
        abort(403, 'Unauthorized');
    }

    public function update(Request $request, Product $product)
    {
        if (Auth::user()->role !== 'admin' && $product->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        $product->update($validated);
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        if (Auth::user()->role !== 'admin' && $product->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}