<?php

use App\Models\Category;
use App\Models\Penjualan;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// categories : menampilkan semua data kategori (GET)
Route::get('/categories', function () {
    $categories = Category::get();
    return response()->json(['data' => $categories]);
});

// categories : menambahkan kategori baru (POST)
Route::post('/categories', function (Request $request) {
    $category = Category::create($request->all());
    return response()->json(['data' => $category]);
});

// category/{id} : menampilkan 1 kategori (GET)
Route::get('/category/{id}', function ($id) {
    $category = Category::find($id);
    return response()->json(['data' => $category]);
});

// category/{id} : update kategori (PUT)
Route::put('/category/{id}', function (Request $request, $id) {
    $category = Category::find($id);
    $category->update($request->all());
    return response()->json(['data' => $category]);
});

// category/{id} : hapus kategori (DELETE)
Route::delete('/category/{id}', function ($id) {
    $category = Category::find($id);
    $category->delete();
    return response()->json(['message' => 'Category deleted']);
});

//----------------------------------------------------------------

// product/{id} : menampilkan 1 kategori (GET)
Route::get('/product/{id}', function ($id) {
    $product = Product::find($id);

    if (!$product) {
        return response()->json(['message' => 'Product not found'], 404);
    }

    return response()->json(['data' => $product]);
});

// products : menampilkan semua data kategori (GET)
Route::get('/products', function () {
    $products = Product::get();
    return response()->json(['data' => $products]);
});

// product/{id} : update kategori (PUT)
Route::put('/product/{id}', function (Request $request, $id) {
    $product = Product::find($id);
    $product->update($request->all());
    return response()->json(['data' => $product]);
});

// product/{id} : update sebagian data (PATCH)
Route::patch('/product/{id}', function (Request $request, $id) {
    $product = Product::find($id);
    $product->update($request->all());
    return response()->json(['data' => $product]);
});

// product/{id} : hapus kategori (DELETE)
Route::delete('/product/{id}', function ($id) {
    $product = Product::find($id);
    $product->delete();
    return response()->json(['message' => 'Product deleted']);
});

//-------------------------------------------------------------

// products : menambahkan kategori baru (POST)
Route::post('/products', function (Request $request) {
    $data = $request->all();

    if ($request->hasFile('foto')) {
        $data['foto'] = $request->file('foto')->store('products', 'public');
    }

    $product = Product::create($data);
    return response()->json(['data' => $product]);
});

//--------------------------------------------------

// penjualan : menampilkan semua data kategori (GET)
Route::get('/penjualans', function () {
    $penjualans = Penjualan::get();
    return response()->json(['data' => $penjualans]);
});

// penjualans : menambahkan kategori baru (POST)
Route::post('/penjualans', function (Request $request) {
    $penjualan = Penjualan::create($request->all());
    return response()->json(['data' => $penjualan]);
});

// penjualan/{id} : menampilkan 1 kategori (GET)
Route::get('/penjualan/{id}', function ($id) {
    $penjualan = Penjualan::find($id);
    return response()->json(['data' => $penjualan]);
});

// penjualan/{id} : update kategori (PUT)
Route::put('/penjualan/{id}', function (Request $request, $id) {
    $penjualan = Penjualan::find($id);
    $penjualan->update($request->all());
    return response()->json(['data' => $penjualan]);
});

// penjualan/{id} : hapus kategori (DELETE)
Route::delete('/penjualan/{id}', function ($id) {
    $penjualan = Penjualan::find($id);
    $penjualan->delete();
    return response()->json(['message' => 'Penjualan deleted']);
});