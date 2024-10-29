<body>

<form action="{{route('postFile')}}" method="post" enctype="multipart/form-data">
	@csrf
	<input type="file" name="myFile">
	<input type="submit" name="">
</form>
	
<h1>Ảnh đã tải lên:</h1>

@if(!empty($filePaths))
    @foreach($filePaths as $filePath)
        <img src="{{ asset($filePath) }}" style="max-width: 100%; max-height: 100%;">
    @endforeach
@else
    <p>Chưa có ảnh để hiển thị.</p>
@endif
</body>