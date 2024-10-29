<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

// use App\Http\Controllers\Controller;

class MyControllers extends Controller
{
    public function Xinchao() {
        echo "Xin chào Hoàng Lê";
    }

    public function Khoahoc1($ten) {
        echo "Khoa Hoc: " .$ten;
        return redirect() ->route('MyRoute'); // truyền dữ liệu vào cho route
    }

    public function GetURL(Request $request) {
        // return $request ->path(); // trả ra tên của route
        // return $request ->url(); // trả ra đường dẫn của trang
        // if($request->isMethod('post')) // kiểm tra phương thức truyền là gì
        //     echo "Đây là phương thức Post";
        // else
        //     echo "Không là phương thức Post";
        if ($request->is('My*')) { // kiểm tra URL có chứa chuỗi hay ('...*') hay không
            echo "Là My";
        } else {
            echo "Không có My";
        }
        
    }

    public function postForm (Request $request){
        echo "Ho va ten cua ban: ";
        echo $request->HoTen;
        // echo $request->Tuoi;
        // return response() ->json(['message' => 'gui form thanh cong']);
        // echo $request->input('HoTen'); // Nhận dữ liệu từ thẻ <input name='HoTen'>
        // echo $request->input('products.0.name');
        // echo $request->all('HoTen');
        // echo $request->only('age'); // Chỉ nhận tham số age
        // echo $request->except('age'); // Nhận mọi tham số ngoại trừ age

        // if($request->has('Tuoi')) // ktra xem có tuoi không
        //     echo "Co tham so";
        // else
        //     echo "Khong co tham so";
    }

    public function setCookie()
    {
        $response = new Response();
        $response->withCookie('Khoahoc', 'Laravel', 0.1);
        echo "Da set Cookie";
        return $response;
    }

    // để làm việc với request thì phải khai báo
    public function getCookie(Request $request)
    {
        echo "Cookie cua ban la:";
        return $request->cookie('Khoahoc');
    }

    public function postFile(Request $request) {
    if ($request->hasFile('myFile')) {
        $file = $request->file('myFile'); //lấy tất cả các file 

        // Kiểm tra định dạng file (chỉ cho phép jpg)
        if ($file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'JPG') {
            $filename = time() . '_' . $file->getClientOriginalName(); //đặt tên file 
            $file->move('img', $filename);  //di chuyển vào thư mục img và đặt tên mới 
            return view('postFile', ['filePaths' => ['img/' . $filename]]);
        } else {
            return "Chỉ chấp nhận file JPG.";
        }
    }
    return "Chưa có file.";
    }
    public function getJson() {
        $array = ['Laravel', 'Php', 'ASP .net', 'Khoahoc'=>'Laravel: Khoa hoc' ];
        return response()->Json($array); //response để xuất ra dữ liệu 
    }

    public function myView(){
        return view('view.hoangle'); // view.hoangle gọi thông qua folder view và sử dụng phương thức . để trỏ tiếp tới file hoangle
    }

    public function Time($t) {
        return view('myView', ['coupon'=>$t]); //$t ở đây là giá trị truyền sang, coupon chỉ là tên để gọi 
    }

    public function blade($str){ // blade được truyền từ phía route qua controller
        $khoahoc = "HoangLe - Laravel";

        if($str == "laravel") {
            return view('pages.laravel', ['khoahoc' => $khoahoc]);  // truyền tham số qua view sẽ sử dụng cặp ['tên', giá trị] vd:['khoahoc' => $khoahoc]
        }    
         elseif($str == "php") {
            return view('pages.php', ['khoahoc' => $khoahoc]);
        }
    }
}


// tạo controller mới bằng cách câu lệnh trong cmd: php artisan make:controller MyController
 