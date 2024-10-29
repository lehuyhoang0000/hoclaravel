<form action="{{ route('postForm') }}" method="POST">
    @csrf
    <input type="text" name="HoTen" placeholder="Nhập họ tên">
    <input type="text" name="Tuoi">
    <button type="submit">Gửi</button>
</form>