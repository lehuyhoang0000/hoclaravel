{{-- đường dẫn sang trang view master --}}
@extends('layouts.master') 

@section('NoiDung')
{{--  mở nội dung và tất cả nội dung trong section sẽ được truyền sang bên yield ở bên phần trang master --}}
<h2>Laravel</h2>
{{$khoahoc}} 

{!!$khoahoc!!}
@endsection 


{{-- 

{{$khoahoc}} sẽ không in cặp thẻ html nếu đưa vào 

{!!$khoahoc!!} sẽ hiện đc cặp thẻ html, ví dụ khi sử dụng cặp này, bôi đậm đoạn mã bằng cách đưa vào thẻ b hoặc h thì sẽ được thay đổi theo thẻ b hoặc h

 --}}