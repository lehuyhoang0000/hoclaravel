<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyControllers;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('KhoaHoc', function(){
    return "Xin chao ban tới Php MySQL";
});

Route::get('HoangLe/Laravel', function() {
    echo"<h1> Khoa Hoc - Laravel </h1>";
});

//Truyen tham so

Route::get('HoTen/{ten}', function($ten) {
    echo "Ten cua ban la:" .$ten;
});

Route::get('Laravel/{date}', function($date) {
    echo "Huy Hoang" .$date;
})->where(['date' => '[a-zA-Z-0-9]{4}']);
// a-zA-Z là truyền được kí tự từ chữ a đến z cả lớn và bé
// 0-9 là truyền số
// {4} đặt giới hạn là truyền đc bao nhiêu kí tự
// Muốn tìm hiểu thêm để đặt điều kiện thì có thể tìm hiểu từ khóa Regular Expression

// Truyen tham so

Route::get('Hovaten/{ten}', function($tenTuoi) {
    echo "Ten cua ban là: " .$tenTuoi;
});

Route::get('khoaHoc/{ngay}', function($ngay) {
    echo "Laravel: " .$ngay;
})->where(['ngay' => '([0-9]{3})-([a-zA-Z]{5})']);

// Dinh danh cho Route

Route::get('Route1', ['as'=>'MyRoute', function(){
    echo "xin chào các bạn1212";
}]);

Route::get('Route2', function() {
    echo "Đây là route 2";
})->name('MyRoute2');

Route::get('GoiTen', function() {
    return redirect() ->route('MyRoute2');
});

//Nhóm Route
//http://localhost:8080/MyLaravel/public/admin/admin2
Route::group(['prefix' => 'admin'], function() {
    Route::get('admin1', function() {
        echo "admin1";
    });
    Route::get('admin2', function() {
        echo "admin2";
    });
    Route::get('admin3', function() {
        echo "admin3";
    });
});


// Gọi Controller
// phải tự định nghĩa đường dẫn nếu không sẽ không thể truy cập vào đc controller - use App\Http\Controllers\MyControllers;
Route::get('goiController', [MyControllers::class, 'Xinchao']);

Route::get('ThamSo/{ten}', [MyControllers::class, 'Khoahoc1']);

// URL

Route::get('MyRequest', [MyControllers::class, 'GetURL']);

// Gửi nhận dữ liệu với Request

Route::get('getForm', function() {
    return view('postForm');
});

Route::post('postForm',[MyControllers::class, 'postForm'])->name('postForm'); // Muốn gọi route trong hệ thống phải gọi qua định danh của nó: ->name('postForm')

//Cookie

Route::get('setCookie', [MyControllers::class, 'setCookie']);
Route::get('getCookie', [MyControllers::class, 'getCookie']);

//Upload File
Route::get('uploadFile', function() {
    return view('postFile');
});

Route::post('postFile',[MyControllers::class, 'postFile'])->name('postFile');

// JSON

Route::get('getJson', [MyControllers::class, 'getJson']);

//View

Route::get('myView', [MyControllers::class, 'myView']);

// Truyền tham số qua view

Route::get('Time/{t}', [MyControllers::class, 'Time']);

view()->share('Khoahoc', 'Laravel');

// Blade template

Route::get('blade', function() {
    return view('pages.php');
});

Route::get('BladeTemplate/{str}', [MyControllers::class, 'blade']); //{str} là để khi người dùng truyền dữ liệu sau đuôi BladeTemplate/{php} thì sẽ đi qua route php hoặc bất kì 1 trang nào đó mà khách hàng nhập lên đường dẫn link