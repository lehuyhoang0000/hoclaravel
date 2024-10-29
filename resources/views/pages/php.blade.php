@extends('layouts.master')

@section('NoiDung')

{{-- <h1>Php</h1>
{{$khoahoc}} --}}

{{-- @if( $khoahoc != "")
{{$khoahoc}}
@else
{{"Khong co khoa hoc"}}
@endif() --}}

{{ $khoahoc ?? "Khong co bien khoa hoc" }} 
{{-- $khoahoc ??     kiểm tra biến khoahoc có tồn tại hay không, nếu ko có sẽ trả lại "Khong co bien khoa hoc" --}} 
<br>

{{-- @for($i = 1; $i <= 10; $i++)
{{$i. " "}}
@endfor --}}


<?php $khoahoc = array("php", "ios", "ASP"); ?>

@forelse($khoahoc as $value)
	{{-- @continue($value == "php")  --}}
	{{-- @continue sẽ in ra ios và asp vì continue sẽ bỏ qua điều kiện đúng và sẽ tiếp tục in ra hoặc làm tiếp trường hợp tiếp theo --}}
	@break($value == "ios")
	{{-- @break sẽ in ra php vì break sẽ dừng lại vì điệu kiện trong break đã đúng, khi đúng sẽ dừng và thoát khỏi vòng lặp--}}
	{{$value}}
@empty
	{{"Mang rong"}}

@endforelse

@endsection





{{-- Cú pháp ?? trong PHP được gọi là toán tử null coalescing. Nó được sử dụng để kiểm tra xem 1 biến có giá trị hay không, mặc định là so sánh biến bên trái trước, nếu bên trái trả ra null, empty thì sẽ hiện ra biến bên phải  --}}