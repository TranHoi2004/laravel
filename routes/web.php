<?php

use Illuminate\Support\Facades\Route;

//trangchu
Route::get('/', function () {
    return view('home');
});

//group
Route::prefix('product')->group(function () {

    // /product
    Route::get('/', function () {
        $products = [
            ['id' => 1, 'name' => 'Sản phẩm A', 'price' => 100],
            ['id' => 2, 'name' => 'Sản phẩm B', 'price' => 200],
            ['id' => 3, 'name' => 'Sản phẩm C', 'price' => 300],
        ];
        return view('product.index', compact('products'));
    })->name('product.index');

    // /product/add
    Route::get('/add', function () {
        return view('product.add');
    })->name('product.add');

    // /product/{id}
    Route::get('/{id?}', function ($id = '123') {
        return "ID sản phẩm: " . $id;
    })->where('id', '[A-Za-z0-9]+');
});

//svien
Route::get('/sinhvien/{name?}/{mssv?}', function (
    $name = 'Luong Xuan Hieu',
    $mssv = '123456'
) {
    return "
        <h2>Thông tin sinh viên</h2>
        <p>Họ tên: $name</p>
        <p>MSSV: $mssv</p>
    ";
});

//banco
Route::get('/banco/{n}', function ($n) {
    return view('banco', compact('n'));
});

//404
Route::fallback(function () {
    return view('error.404');
});
